<?php

require_once '../core/model.master.php';

class Cargo extends ModelMaster{


    //Listar entidades
    /* public function listarCargos(){
        try{
            return parent::getRows("spu_listar_entidades");
        }catch(Exception $error){
            die($error->getMessage());
        }
    } */

    public function registrarCargo(array $data){
        try{
            return parent::execProcedure($data ,"spu_registrar_cargos", true);
        }catch(Exception $error){
            die($error->getMessage());
        }
    }


}

?>