<?php
namespace Aeropuerto\Model\Transporte;

require_once("conexion.php");
use Aeropuerto\Model\Conexion;
use Aeropuerto\Model\Conexion\Connect;
class TransporteModel extends Connect{

    public function __construct(){
        parent::__construct("aeropuerto"); // coloco el nombre de la base de datos de mi conexion
    }
    public function select(){
        $sql = "SELECT * from transporte";
        return self::sentencia($sql);
    }

}

?>