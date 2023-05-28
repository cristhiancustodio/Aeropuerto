<?php

namespace Aeropuerto\Model\Conexion;

use PDO;
use PDOException;
class Connect{
    private $bd;
    private $host='localhost:3307';
    private $usuario='root';
    private $password='luisnunura123456';
    public function __construct($bd){
        $this->bd = $bd;
    }
    private function conectar(){
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Manejo de excepciones
            PDO::ATTR_EMULATE_PREPARES => false, // Desactivar emulación de preparación de consultas
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, // Modo de obtención de resultados como array asociativo
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci" // Configuración de la codificación de caracteres
        ];
        try {
            $conexion= new PDO("mysql:host=$this->host;dbname=$this->bd",$this->usuario,$this->password, $options);
            if($conexion){
                return $conexion;
            }
            else{
                return null;
            }
        } catch (PDOException $e) {
            echo "Error".$e;
        }
    }
    public function sentenciaSimple(?string $sql) : ?array {
        $con = $this->conectar();
        $stmt=$con->query($sql);
        $row=$stmt->fetch(PDO::FETCH_OBJ);
        return $row;  
    }
    public function sentencia(?string $sql) : ?array{
        $con=$this->conectar();
        $stmt=$con->query($sql);
        $row=$stmt->fetchAll(PDO::FETCH_OBJ);
        return $row;  
    }
    public function ejecutar(?string $sql,?array $lista=null) : bool{
        $con = $this->conectar();
        $stmt=$con->prepare($sql);
        return $stmt->execute($lista);  
    }
}

?>