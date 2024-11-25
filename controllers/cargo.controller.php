<?php

require_once '../models/Cargo.php';
require_once '../models/Serverside.php';
require_once '../models/ProgramPresupuestal.php';
require_once '../models/Metas.php';

if (isset ($_GET['op'])){

    $cargo = new Cargo();
    $programa = new ProgramPresupuestal();
    $meta = new Meta();

    if($_GET['op'] == 'listarCargos'){
        $data = $serverSide->get("vs_cargos", "idcargo", array("idcargo", "numMeta", "descripcion" , "remuneracion"));
    }

    if($_GET['op'] == 'registrarCargo'){

        $datosEnviar = [
            "idmeta"                => $_GET["idmeta"],
            "descripcion"           => $_GET["descripcion"],
            "remuneracion"          => $_GET["remuneracion"],
            
        ];

        $cargo->registrarCargo($datosEnviar);
    }

    if($_GET['op'] == 'busquedaProgramas'){
  
        echo json_encode ($programa->busquedaPrograma(["search" => $_GET['search']]));
      
          
    }

    if($_GET['op'] == 'busquedaMeta'){
  
        echo json_encode ($meta->busquedaMeta(["search" => $_GET['search']]));
      
          
    }

}

?>