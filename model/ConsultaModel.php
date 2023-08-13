<?php 

namespace Aeropuerto\Model\ConsultaModel;
require_once("Model.php");


use Aeropuerto\Model\Model;


class ConsultaModel extends Model{

    protected $tablename = "carrera";

    public function selectConsulta()
    {
        $data = $this->select("CARnombre");
        return var_dump($data);
    }
    public function insertConsulta(){
        $campos = [
            "CARnombre"=>"Programador super",
        ];
        $this->insert($campos);
    }
    public function eliminarConsulta(){
        $this->delete("CARid",31);
    }

}

$consulta = new ConsultaModel();
$consulta->eliminarConsulta();
?>