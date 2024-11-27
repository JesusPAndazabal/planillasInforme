<?php

session_start();

require_once '../models/Persona.php';
require_once '../models/Serverside.php';

if(isset($_GET['op'])){

    $persona= new Persona();

    if($_GET['op'] == 'listarPersonas'){
        $data = $serverSide->get("vs_personas", "idpersona", array("idpersona", "tipoDoc", "numeroDoc" , "nombresApellidos"));
    } 

    if($_GET['op'] == 'buscarPersona'){
        $data = $persona->buscarPersona(["numeroDoc" => $_GET["numeroDoc"]]);

        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(["error" => "No se encontraron resultados"]);
        }
    }

}



   



?>