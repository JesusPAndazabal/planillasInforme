<?php

session_start();

require_once '../models/Planilla.php';
require_once '../models/Serverside.php';
require_once '../models/PlanillaDetalle.php';

if(isset($_GET['op'])){

    $planilla= new Planilla();
    $detallePlanilla = new DetallePlanilla();

    function listarDetallePlanillas($data){
        if(count($data) <= 0){
            echo "<td>No hay datos en esta tabla</td>";
        }else{
            
            foreach($data as $row){
                echo "
                    <tr>
                        <td>{$row['numRegistro']}</td>
                        <td>{$row['anio']}</td>
                        <td>{$row['mes']}</td>
                        <td>{$row['cussp']}</td>
                        <td>{$row['numCuenta']}</td>
                        <td>{$row['nombresApellidos']}</td>
                        <td>{$row['numeroDoc']}</td>
                        <td>{$row['descripcion']}</td>
                        <td class='text-center reporte' data-idplanillaDetalle='{$row['idplanillaDetalle']}'>  
                            <button type='button'><i class='fas fa-print'></i></button>
                        </td>
                    </tr>
                
                ";
            }
        }
    }

    function listarPlanillasVista($data){
        if(count($data) <= 0){
            echo "<td>No hay datos en esta tabla</td>";
        }else{
            foreach($data as $row){
                echo "
                    <tr>
                        <td>{$row->idplanilla}</td>
                        <td>{$row->anio}</td>
                        <td>{$row->mes}</td>
                    </tr>
                ";
            }
        }
    }


    /* if($_GET['op'] == 'listarPlanillas'){
        $data = $serverSide->get("vs_planillas", "idplanilla", array("idplanilla", "anio", "mes"));
    } */
    
    if($_GET['op'] == 'listarDetallePlanillas'){
    
        $data;

        $data = $planilla->obtenerPlanilla(["idplanilla" => $_GET['idplanilla']]);

        listarDetallePlanillas($data);
    }

    if($_GET['op'] == 'listarPlanillas'){
    
        $data;

        $data = $planilla->listarPlanillas();

        listarPlanillasVista($data);
    }

    // Nuevo caso para buscar detalle planilla por número de documento o nombres
    if ($_GET['op'] == 'buscarDetallePlanilla') {
        $params = [
            'numeroDoc' => $_GET['numeroDoc'] ?? null,
            'nombresApellidos' => $_GET['nombresApellidos'] ?? null
        ];

        $data = $detallePlanilla->buscarplanillaDetalle($params);
        listarDetallePlanillas($data);
    }

}

?>