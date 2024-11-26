<?php

session_start();

require '../vendor/autoload.php'; // PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\IOFactory;

// Conexión a la base de datos
$mysqli = new mysqli("localhost", "root", "", "planillaSub");
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['op'])) {
    $op = $_POST['op'];

    switch ($op) {
        case 'importarPlanilla':
            if (isset($_FILES['archivoExcel'])) {
                $archivo = $_FILES['archivoExcel']['tmp_name'];

                try {
                    // Cargar el archivo Excel
                    $spreadsheet = IOFactory::load($archivo);
                    $sheet = $spreadsheet->getActiveSheet();
                    $rows = $sheet->toArray(null, true, true, true);

                    foreach ($rows as $key => $row) {
                        if ($key == 1) continue;

                        // Extraer los datos de cada columna
                        $orden = $row['A'];
                        $anio = intval($row['C']);
                        $mes = intval($row['B']);
                        $dni = $row['D'];
                        $cussp = $row['E'];
                        $numCuenta = intval($row['F']);
                        $nombresApellidos = $row['G'];
                        $fechaIngreso = date('Y-m-d H:i:s', strtotime($row['H']));
                        $cargo = $row['I'];
                        $onpAfp = $row['P'];

                        //Asignacion Familiar
                        $asignacionFam = str_replace(',', '', $row['J']); 
                        $asignacionFam = floatval($asignacionFam);

                        //Sueldo Basico
                        $sueldoBasico = str_replace(',', '', $row['K']); 
                        $sueldoBasico = floatval($sueldoBasico);
                        
                        //Reintegro
                        $reintegro = !empty($row['L']) ? floatval(str_replace(',', '', $row['L'])) : null;

                        //Aguinaldo
                        $aguinaldo = !empty($row['M']) ? floatval(str_replace(',', '', $row['M'])) : null;

                        //MontoInasistencia
                        $montoInasistencia = !empty($row['N']) ? floatval(str_replace(',', '', $row['N'])) : null;

                        //MontoRemuneracion
                        $montoRemuneracion = str_replace(',', '', $row['O']); 
                        $montoRemuneracion = floatval($montoRemuneracion);

                        //Obligatorio Onp
                        $obliOnp = !empty($row['Q']) ? floatval(str_replace(',', '', $row['Q'])) : null;

                        
                        $nombreAfp = $row['R'];

                        //Afp Obligatorio
                        $afpOblig = !empty($row['S']) ? floatval(str_replace(',', '', $row['S'])) : null;

                        //Comsion sobre RA
                        $comisionFlujo = !empty($row['T']) ? floatval(str_replace(',', '', $row['T'])) : null;

                        //Prima Seguro
                        $primaSeguro = !empty($row['U']) ? floatval(str_replace(',', '', $row['U'])) : null;

                        //Salud Vida
                        $essaludVida = !empty($row['V']) ? floatval(str_replace(',', '', $row['V'])) : null;

                        //Total Descuento
                        $totalDescuento = !empty($row['W']) ? floatval(str_replace(',', '', $row['W'])) : null;

                        //Remuneracion Neta
                        $netoPagar = !empty($row['X']) ? floatval(str_replace(',', '', $row['X'])) : null;
          
                        //SSalud
                        $ssalud = !empty($row['Y']) ? floatval(str_replace(',', '', $row['Y'])) : null;

                        //Total Aportes
                        $totalAportes = !empty($row['Z']) ? floatval(str_replace(',', '', $row['Z'])) : null;

                        // Insertar en la tabla `personas`
                        $stmt = $mysqli->prepare("INSERT INTO personas (tipoDoc, numeroDoc, nombresApellidos) VALUES (?, ?, ?)");
                        $tipoDoc = "D"; // Supongamos que es DNI
                        $stmt->bind_param("sss", $tipoDoc, $dni, $nombresApellidos);
                        $stmt->execute();
                        $idPersona = $stmt->insert_id;

                        // Insertar en la tabla `planillas`
                        // Comprobar si ya existe una planilla para el año y mes dados
                        $stmt = $mysqli->prepare("SELECT idplanilla FROM planillas WHERE anio = ? AND mes = ?");
                        $stmt->bind_param("ii", $anio, $mes);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            // Si ya existe, obtener el ID de la planilla
                            $row = $result->fetch_assoc();
                            $idPlanilla = $row['idplanilla'];
                        } else {
                            // Si no existe, insertar un nuevo registro en planillas
                            $stmt = $mysqli->prepare("INSERT INTO planillas (anio, mes) VALUES (?, ?)");
                            $stmt->bind_param("ii", $anio, $mes);
                            $stmt->execute();

                            if ($stmt->error) {
                                echo json_encode(["success" => false, "message" => "Error al insertar planilla: " . $stmt->error]);
                                continue;
                            }

                            // Obtener el ID del nuevo registro
                            $idPlanilla = $stmt->insert_id;
                        }

                        //Insertar en la tabla Cargos
                       //Insertar en la tabla Cargos
                       if (!empty($cargo)) {
                        $stmt = $mysqli->prepare("SELECT idcargo FROM cargos WHERE descripcion = ?");
                        $stmt->bind_param("s", $cargo);
                        $stmt->execute();
                        $result = $stmt->get_result();
                    
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $idCargo = $row['idcargo'];
                        } else {
                            $stmt = $mysqli->prepare("INSERT INTO cargos (descripcion) VALUES (?)");
                            $stmt->bind_param("s", $cargo);
                            $stmt->execute();
                            $idCargo = $stmt->insert_id;
                        }
                        } else {
                            $idCargo = null;  // Si el cargo está vacío, asignar null o un valor por defecto
                        }


                        //Insertar la tabla comisiones
                        // Verificar si el nombreAfp está vacío y no intentar insertar una comisión si está vacío
                        if (!empty($onpAfp) && !empty($nombreAfp)) {
                            // Insertar en la tabla comisiones si no está vacío
                            $stmt = $mysqli->prepare("SELECT idcomision FROM comisiones WHERE tipo = ? AND nombre = ?");
                            $stmt->bind_param("ss", $onpAfp, $nombreAfp);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $idComision = $row['idcomision'];
                            } else {
                                $stmt = $mysqli->prepare("INSERT INTO comisiones (tipo, nombre) VALUES (?, ?)");
                                $stmt->bind_param("ss", $onpAfp, $nombreAfp);
                                $stmt->execute();
                                $idComision = $stmt->insert_id;
                            }
                        } else {
                            // Si está vacío, asignamos un valor nulo o no asignado
                            $idComision = null;  // O usa un valor predeterminado si prefieres
                        }

                        // Verificar si el nombreAfp está vacío
                        if (empty($nombreAfp)) {
                            // Si el nombreAfp está vacío, asignar un valor 'vacío' o null
                            $nombreAfp = null; // O puedes asignar algún valor por defecto si prefieres
                        }

                        // Insertar en la tabla `planillasDetalles` (esta parte no depende de la existencia en `comisiones`)
                        $stmt = $mysqli->prepare("INSERT INTO planillasDetalles (idusuario, idpersona, idcargo, identidad, idcomision, idplanilla, numRegistro, cussp, numCuenta, 
                        fechaIngreso, asignacionFamiliar, sueldoBasico, reintegros, montoAguinaldo, montoInasistencia, montoRem, obliOnp, afpOblig, comisionFlujo, montoprimaSeguro, 
                        essaludVida, totalDescuento, netoPagar, ssalud, montototalAporte) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                        
                        $idUsuario = 1; // Cambiar por el ID real del usuario que esté realizando la acción
                        $idEntidad = 1; // Cambiar por el ID real de la entidad correspondiente

                        $stmt->bind_param(
                            "iiiiiiisssddddddddddddddd",
                            $idUsuario, $idPersona, $idCargo, $idEntidad, $idComision, $idPlanilla, $orden, $cussp, $numCuenta,
                            $fechaIngreso, $asignacionFam, $sueldoBasico, $reintegro, $aguinaldo, $montoInasistencia, $montoRemuneracion, $obliOnp,
                            $afpOblig, $comisionFlujo, $primaSeguro, $essaludVida, $totalDescuento, $netoPagar, $ssalud, $totalAportes
                        );
                        
                        // Ejecuta la inserción
                        $stmt->execute();
                        if ($stmt->error) {
                            echo json_encode(["success" => false, "message" => "Error al insertar detalle de planilla: " . $stmt->error]);
                            continue;
                        }

                    }

                    echo json_encode(["success" => true, "message" => "Archivo importado correctamente."]);
                } catch (Exception $e) {
                    echo json_encode(["success" => false, "message" => "Error al procesar el archivo: " . $e->getMessage()]);
                }
            } else {
                echo json_encode(["success" => false, "message" => "No se recibió ningún archivo."]);
            }
            break;

        default:
            echo json_encode(["success" => false, "message" => "Operación no válida."]);
            break;
    }
}
?>
