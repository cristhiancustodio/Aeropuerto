<?php 
namespace Aeropuertones\Controller\ConsultaController;
require_once '../model/ConsultaModel.php';


use Aeropuerto\Model\ConsultaModel\ConsultaModel;

class ConsultaController{
    public function __construct(){
      
    }

    public function getDni(?string $dni){
        $consulta = new ConsultaModel();
        $data = $consulta->select($dni);
        if(!empty($data)){
            return $data;
        }else{
            $error = ["error"=>"no se encontro"];
            return $error;
        }
    }
    public function getDniApi($dni2){
        $url = "https://www.amcsolutionstec.com/produccion/api/api/getDni/".$dni2;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 3);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}


$consulta = new ConsultaController();
if($_SERVER["REQUEST_METHOD"] === "GET"){
    if(isset($_GET["dni"])){
        $dni = $_GET["dni"];
        $respuesta = $consulta->getDni($dni);
        echo json_encode($respuesta);
    }
    if(isset($_GET["dni2"])){
        $dni2 = $_GET["dni2"];
        $respuesta = $consulta->getDniApi($dni2);
        echo ($respuesta);
    }
}

?>