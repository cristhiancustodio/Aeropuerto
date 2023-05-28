<?php
namespace Aeropuerto\Model\Vuelo;

require_once("conexion.php");
use Aeropuerto\Model\Conexion;
use Aeropuerto\Model\Conexion\Connect;
class VueloModel extends Connect{

    public function __construct(){
        parent::__construct("aeropuerto"); // coloco el nombre de la base de datos de mi conexion
    }
    public function select() : array{
        $sql = "SELECT lugar_partida,lugar_llegada,precio,transporte,numero_escalas from vuelos order by id_vuelo desc";
        return self::sentencia($sql);
    }
    public function insert( array $campos) : bool {
        $sql = "INSERT INTO vuelos( lugar_partida,lugar_llegada,precio, transporte, numero_escalas) values(?,?,?,?,?)";
        return self::ejecutar($sql,$campos);
    }
    public function update(array $campos) : bool{
        $sql = "UPDATE vuelos set ";
        return self::ejecutar($sql,$campos);
    }
}

?>