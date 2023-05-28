<?php
namespace Aeropuerto\Model\Usuario;

require_once("conexion.php");

use Aeropuerto\Model\Conexion\Connect;

class Usuario extends Connect{
    public function __construct(){}

    public function getUsuario() : ?array{
        $sql = "SELECT * FROM usuarios";
        return self::sentencia($sql);
    }
}

//$da = new Usuario();
//$dato = $da->getUsuario();
//var_dump($dato);
?>