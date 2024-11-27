<?php

require_once '../core/model.master.php';

class Persona extends ModelMaster{

    //Buscar dni del persona
    public function buscarPersona(array $data){
        try{
            return parent::execProcedure($data , "spu_buscardniPersona",true);

        }catch(Exception $error){
            die($error->getMessage());
        }
    }

}

?>