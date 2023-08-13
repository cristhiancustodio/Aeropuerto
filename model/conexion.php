<?php

namespace Aeropuerto\Model\Conexion;

use PDO;
use PDOException;
class Conexion{
   
    private $bd;
    private $base_datos = "reclutamiento";
    private string $host='127.0.0.1:3307';
    private string $usuario='root';
    private string $password='luisnunura123456';

    public function __construct(){
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Manejo de excepciones
            PDO::ATTR_EMULATE_PREPARES => false, // Desactivar emulación de preparación de consultas
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, // Modo de obtención de resultados como array asociativo
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci" // Configuración de la codificación de caracteres
        ];
        try {
            $this->bd = new PDO("mysql:host=$this->host;dbname=$this->base_datos",$this->usuario,$this->password, $options);

        } catch (PDOException $e) {
            echo "Error ".$e->getMessage();
        }
    }
    protected function setBaseDatos(string $base_datos){
        $this->base_datos = $base_datos;
    }
    public function getConnection(){
        return $this->bd;
    }
    protected function getResult(string $sql){
        return $this->bd->query($sql)->fetch(PDO::FETCH_OBJ);
    }
    protected function getResultAll(string $sql){
        return $this->bd->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }
    protected function prepare(string $sql, ?array $campos=null) : bool{
        return $this->bd->prepare($sql)->execute($campos);
    }
    /*public function sentenciaSimple(?string $sql) : ?array {
        $con = $this->conectar();
        $stmt = $con->query($sql);
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;  
    }
    public function sentencia(?string $sql) : ?array{
        $con=$this->conectar();
        $stmt = $con->query($sql);
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $row;  
    }
    public function ejecutar(?string $sql, ?array $lista=null) : bool{
        $con = $this->conectar();
        $stmt = $con->prepare($sql);
        return $stmt->execute($lista);  
    }*/
}

?>