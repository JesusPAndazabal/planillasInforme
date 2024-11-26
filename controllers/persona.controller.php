<?php

session_start();

require_once '../models/Persona.php';
require_once '../models/Serverside.php';

if(isset($_GET['op'])){

    $persona= new Persona();

    if($_GET['op'] == 'listarPersonas'){
        $data = $serverSide->get("vs_personas", "idpersona", array("idpersona", "tipoDoc", "numeroDoc" , "nombresApellidos"));
    } 

}



   



?>