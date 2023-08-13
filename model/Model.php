<?php
namespace Aeropuerto\Model;
require_once("conexion.php");

use Aeropuerto\Model\Conexion\Conexion;
use Aeropuerto\Model\ModelInterface;
class Model extends Conexion{

    
    protected $tablename;

    public function __construct() { 
        parent::__construct();
    }
    public function select(string $sql) : ?array{
        $sql = "SELECT ". $sql." FROM ".$this->tablename;
        return $this->getResultAll($sql);
    }
    public function insert(array $campos) : bool{
        $lista = array_values($campos);
        $sql = "INSERT INTO ".$this->tablename." (".$this->soloColumnas($campos).") values(".$this->cantidadColumnas($campos).")";
        return $this->prepare($sql,$lista);
    }
    public function update(array $campos) : bool{
        
        $sql = "UPDATE ".$this->tablename . "SET";
        return $this->prepare($sql,$campos);
    }
    public function delete(string $campo,string|int $condicion) : bool{
        $sql = "DELETE FROM `".$this->tablename ."` WHERE `" .$campo."`=".$condicion;
        //var_dump($sql);exit;
        return $this->prepare($sql);
    }
    public function where(string $campo, string|int $identificador)
    {
        return " ".$campo."=".$identificador;
    }
    private function soloColumnas(array $campos) : string{
        $solo_columnas = array_keys($campos);
        return implode(",",$solo_columnas);
    }
    private function cantidadColumnas(array $campos) : string{
        $cantidad = count($campos);
        $interrogantes=[];
        for($i=0;$i<=($cantidad-1); $i++){
            $interrogantes[] = "?";
        }
        //var_dump($interrogantes);exit;
        return implode(",",$interrogantes);
    }
    private function soloValores(array $campos) : string{
        $solo_valores = [];
        foreach($campos as $key=>$val){
            if(!empty($val) && is_string($val)){
                $solo_valores[] = "'".$val."'";
            }else if(!empty($val) && is_integer($val)){
                $solo_valores[] = "".$val."";
            }else{
                $solo_valores[] = "''";
            }
        }
        return implode(",",$solo_valores);
    }

    
}

?>