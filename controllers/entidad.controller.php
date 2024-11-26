<?php

require_once '../models/Entidad.php';
require_once '../models/Serverside.php';

if (isset ($_GET['op'])){

    $entidad = new Entidad();

    if($_GET['op'] == 'listarEntidades'){
        $data = $serverSide->get("vs_entidades", "identidad", array("identidad", "descripcion", "direccion" , "ruc" ,"numEjecutora","region", "provincia"));
    }
}

?>