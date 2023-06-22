<?php 

namespace Aeropuerto\Model\ConsultaModel;

require_once("conexion.php");
use Aeropuerto\Model\Conexion\Connect;

class ConsultaModel extends Connect{
    public function __construct(){
        parent::__construct("api_senati"); // coloco el nombre de la base de datos de mi conexion
    }
    public function select($dni) : ?array {
        $sql = "SELECT * from personas where dni='$dni'";
        return self::sentencia($sql);
    }
}

?>