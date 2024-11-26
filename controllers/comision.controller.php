<?php

session_start();

require_once '../models/Comision.php';
require_once '../models/Serverside.php';

if(isset($_GET['op'])){

    $comision= new Comision();

    if($_GET['op'] == 'listarComisiones'){
        $data = $serverSide->get("vs_comisiones", "idcomision", array("idcomision", "tipo", "nombre"));
    } 

}



   



?>