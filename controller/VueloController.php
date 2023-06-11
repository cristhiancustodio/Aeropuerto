<?php
    
namespace Aeropuertones\Controller\VueloController;
require_once '../model/VueloModel.php';
use Aeropuerto\Model\Vuelo\VueloModel;
class Vuelo {

    public function __construct(){
      
    }

    public function insertarVuelos(array $lis){
        $vuelo = new VueloModel();
        $lis = (object)$lis;
        $campos = [
            $lis->lugar_partida,
            $lis->lugar_llegada,
            $lis->precio_vuelo,
            $lis->transporte,
            (int)$lis->numero_escalas,
        ];
        if($vuelo->insert($campos)){
            return true;
        }
        
    }
    
}
$vuelo = new Vuelo();
$vuelo_model = new VueloModel();


if($_SERVER['REQUEST_METHOD']=="POST"){
    $valido = $vuelo->insertarVuelos($_POST);
    if($valido){
        $result = ["succes"=>true,"mensaje"=>"Registro guardado"];
        echo json_encode($result);
    }

}
if($_SERVER["REQUEST_METHOD"]=="GET"){
    if(isset($_GET["obt"]) && $_GET["obt"]==='1'){
    
    $data = $vuelo_model->select();
    echo json_encode($data,true);
    
}

}

?>