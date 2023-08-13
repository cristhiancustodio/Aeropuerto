<?php 

namespace Aeropuerto;

use Aeropuerto\Model\Conexion\Conexion;

abstract class BaseModel extends Conexion{

    abstract protected function selectData();
    abstract protected function updateData();
    abstract protected function insertData();
    abstract protected function deleteData();

    protected function conexion(){
        return Conexion::getInstance()->getConnection();
    }
    protected function objeto(){
    }
}

?>