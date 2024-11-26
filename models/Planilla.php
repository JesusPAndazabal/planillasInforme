<?php

require_once '../core/model.master.php';

class Planilla extends ModelMaster{

    public function obtenerPlanilla(array $data){
        try{
            return parent::execProcedure($data, "spu_obtener_planilla" , true);
        }catch(Exception $error){
            die($error->getMessage());
        }
    }

    public function listarPlanillas(){
        try{
           return parent::getRows("spu_listar_planillas");
        }catch(Exception $error){
            die($error->getMessage());
        }
    }

}

?>