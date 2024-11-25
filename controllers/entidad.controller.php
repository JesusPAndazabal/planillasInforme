<?php

require_once '../models/Entidad.php';
require_once '../models/Serverside.php';

if (isset ($_GET['op'])){

    $entidad = new Entidad();

    if($_GET['op'] == 'listarEntidades'){
        $data = $serverSide->get("vs_entidades", "identidad", array("identidad", "descripcion", "direccion" , "ruc" ,"numEjecutora","region", "provincia"));
    }

    if($_GET['op'] == 'registrarEntidad'){

        $datosEnviar = [
            "descripcion"       => $_GET["descripcion"],
            "direccion"         => $_GET["direccion"],
            "ruc"               => $_GET["ruc"],
            "numEjecutora"      => $_GET["numEjecutora"],
            "region"            => $_GET["region"],
            "provincia"         => $_GET["provincia"]
        ];

        $entidad->registrarEntidad($datosEnviar);
    }   

}

?>