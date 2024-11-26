<?php

session_start();

require_once '../models/Planilla.php';
require_once '../models/Serverside.php';

if(isset($_GET['op'])){

    $planilla= new Planilla();

    if($_GET['op'] == 'listarPlanillas'){
        $data = $serverSide->get("vs_planillas", "idplanilla", array("idplanilla", "anio", "mes"));
    } 

}



   



?>