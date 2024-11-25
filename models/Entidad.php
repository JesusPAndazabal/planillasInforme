<?php

require_once '../core/model.master.php';

class Entidad extends ModelMaster{


    //Listar entidades
    public function listarEntidades(){
        try{
            return parent::getRows("spu_listar_entidades");
        }catch(Exception $error){
            die($error->getMessage());
        }
    }

    public function registrarEntidad(array $data){
        try{
            return parent::execProcedure($data ,"spu_registrar_entidad", true);
        }catch(Exception $error){
            die($error->getMessage());
        }
    }


}

?>