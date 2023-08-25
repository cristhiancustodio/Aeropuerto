<?php 

$host = "127.0.0.1:3307";          // Dirección del servidor MySQL
$username = "root";     // Nombre de usuario para acceder a la base de datos
$password = "luisnunura123456";  // Contraseña para el usuario
$dbname = "reclutamiento";// Nombre de la base de datos a la que quieres conectarte

// Crear conexión
$conn = mysqli_connect($host, $username, $password, $dbname);


// Verificar conexión
if($conn){
    echo "conexion exitosa";
}
else{
    echo "error";
}

function select(string $sql) : array{
    $result = mysqli_query($GLOBALS["conn"], $sql) or die(mysqli_error($GLOBALS["conn"]));
    echo $numero = mysqli_num_rows($result);

    $data = [];
    if($numero==1){
        
        return $row = mysqli_fetch_assoc($result);

    }elseif($numero>1){

        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
    }
    return $data;
}

$sql = "SELECT * FROM carrera";
$data = select($sql);

var_dump($data);


?>