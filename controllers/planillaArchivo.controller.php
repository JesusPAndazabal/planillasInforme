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
                        $asignacionFam = str_replace(',', '', $row['J']); 
                        $asignacionFam = intval($asignacionFam);
                        // Extraer el sueldo básico de la fila, asumiendo que está en la columna K
                        $sueldoBasico = str_replace(',', '', $row['K']); 
                        $sueldoBasico = intval($sueldoBasico); 
                        $reintegro = intval($row['L']);
                        $aguinaldo = intval($row['M']);
                        $montoInasistencia = intval($row['N']);
                        $montoRemuneracion = str_replace(',', '', $row['O']); 
                        $montoRemuneracion = intval($montoRemuneracion);
                        $onpAfp = $row['P'];
                        $obliOnp = intval($row['Q']);
                        $nombreAfp = $row['R'];
                        $afpOblig = intval($row['S']);
                        $comisionFlujo = intval($row['T']);
                        $primaSeguro = intval($row['U']);
                        $ssalud = intval($row['V']);
                        $totalDescuento = intval($row['W']);
                        $netoPagar = str_replace(',', '', $row['X']);
                        $netoPagar = intval($netoPagar);
                        $totalAportes = intval($row['Z']);

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
                        if (empty($cargo)) {
                            echo json_encode(["success" => false, "message" => "Cargo o sueldo básico están vacíos para la fila $key."]);
                            continue;
                        }

                        // Insertar en la tabla Cargos
                        $stmt = $mysqli->prepare("INSERT INTO cargos (descripcion) VALUES (?)");
                        $stmt->bind_param("s", $cargo); 
                        $stmt->execute();
                        $idCargo = $stmt->insert_id;

                        //Insertar la tabla comisiones
                        $stmt = $mysqli->prepare("INSERT INTO comisiones (tipo, nombre) VALUES (?, ?)");
                        $stmt->bind_param("ss", $onpAfp, $nombreAfp); // Usar "ss" para indicar que ambos parámetros son cadenas (strings)
                        $stmt->execute();
                        $idComision = $stmt->insert_id;

                        //Insertar en la tabla de detalle de planillas
                        $stmt = $mysqli->prepare("INSERT INTO planillasDetalles (idusuario , idpersona , idcargo , identidad, idcomision , idplanilla , numRegistro , cussp , numCuenta,
                        fechaIngreso , sueldoBasico , asignacionFamiliar , reintegros , montoInasistencia , onpAfp , obliOnp , afpOblig , comisionFlujo , ssalud , montoRem , netoPagar , 
                        montoAguinaldo , montoprimaSeguro , montototalAporte , totalDescuento) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

                        // Definir valores
                        $idUsuario = 1; // Cambiar por el ID real del usuario que esté realizando la acción
                        $idEntidad = 1; // Cambiar por el ID real de la entidad correspondiente

                        $stmt->bind_param(
                            "iiiiiiisssiiiiisiiiiiiiii",
                            $idUsuario, $idPersona, $idCargo, $idEntidad, $idComision, $idPlanilla, $orden, $cussp, $numCuenta,
                            $fechaIngreso, $sueldoBasico, $asignacionFam, $reintegro, $montoInasistencia, $onpAfp, $obliOnp,
                            $afpOblig, $comisionFlujo, $ssalud, $montoRemuneracion, $netoPagar, $aguinaldo, $primaSeguro, 
                            $totalAportes, $totalDescuento
                        );

                        // Ejecutar la inserción
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
