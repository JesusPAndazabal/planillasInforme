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

}

?>