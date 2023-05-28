<?php
namespace Aeropuerto\ApiPaises;
require_once 'model/conexion.php';
use Aeropuerto\Model\Conexion\Connect;
class ApiPaises extends Connect{
    public function __construct(){
        parent::__construct("amarillas_bd"); //base de datos
    }

    public function getPaises(){
        $sql = "SELECT NACP_Codigo, NACC_Descripcion FROM cji_nacionalidad";
        $result = self::sentencia($sql);
        return json_encode($result,true);
    }
}



?>