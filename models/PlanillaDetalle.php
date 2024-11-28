<?php

require_once '../core/model.master.php';

class DetallePlanilla extends ModelMaster{

    public function obtenerDetalle(array $data){
        try{
            return parent::execProcedure($data, "spu_obtener_detalle" , true);
        }catch(Exception $error){
            die($error->getMessage());
        }
    }

    public function buscarplanillaDetalle(array $data){
        try{
            return parent::execProcedure($data , "spu_buscar_planilla" , true);
        }catch(Exception $error){
            die($error->getMessage());
        }
    }

    public function buscarplanillaDni(array $data){
        try{
            return parent::execProcedure($data , "spu_buscarDniPlanilla",true);

        }catch(Exception $error){
            die($error->getMessage());
        }
    }

}

?>