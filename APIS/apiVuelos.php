<?php
namespace Aeropuerto\ApiPaises;
require_once '../model/VueloModel.php';

use Aeropuerto\Model\Vuelo\VueloModel;
class ApiPaises {
    public function __construct(){
       
    }
    public static function getVuelos(){
        $vuelo = new VueloModel();
        $data = $vuelo->select();
        return json_encode($data,true);
    }
}

echo ApiPaises::getVuelos();




?>