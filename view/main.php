<?php
require_once("APIS/apiPaises.php");
require_once("model/TransporteModel.php");
    use Aeropuerto\ApiPaises\ApiPaises;
    use Aeropuerto\Model\Transporte\TransporteModel;
    $paises = new ApiPaises();
    $data = $paises->getPaises();
    $pais = json_decode($data,true);

    $transporte = new TransporteModel();
    $transporte = $transporte->select();
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</head>
<style>
    .contenedor{
        width: 600px;
        height: 600px;
    }
    .tabla{
        width: 90%;
    }
</style>
<body>
    <h1>ADMINISTRACION DE VUELOS</h1>
    <div class="container contenedor">
        <form id="form">
            <label class="form-label" for="lugar_partida">Lugar partida</label>

            <select name="lugar_partida" id="lugar_partida" class="form-control">
                <option value="">[SELECCIONE]</option>
                <?php
                    foreach($pais as $key => $value){  ?>
                        <option value="<?php echo $value["NACC_Descripcion"]?>"><?php echo ($value["NACC_Descripcion"]);?></option>
                    <?php } ?>
            </select>
            <label class="form-label" for="lugar_llegada">Lugar llegada</label>

            <select name="lugar_llegada" id="lugar_llegada" class="form-control">
                <option value="">[SELECCIONE]</option>
                <?php
                    foreach($pais as $key => $value){  ?>
                        <option value="<?php echo $value["NACC_Descripcion"]?>"><?php echo ($value["NACC_Descripcion"]);?></option>
                    <?php } ?>
            </select>
            <label class="form-label" for="precio_vuelo">Precio</label>
            <input type="text" name="precio_vuelo" id="precio_vuelo" value="" class="form-control">

            <label class="form-label" for="transporte">Transporte</label>
            <select name="transporte" id="transporte" class="form-control">
                <option value="">[SELECCIONE]</option>
                <?php
                    foreach($transporte as $key => $value){ ?>
                <option value="<?php echo $value->empresa?>"><?php echo $value->empresa?></option>
                <?php
                    } 
                ?>
            </select>
            <label class="form-label" for="duracion_vuelo">Duración de vuelo</label>
            <input type="time" name="duracion_vuelo" id="duracion_vuelo"  class="form-control">
            <label for="escalas">Numero de escalas</label>
            <input class="form-control" type="text" name="numero_escalas" id="numero_escalas" value="">
            <label for="fecha_llegada">Fecha de llegada</label>
            <input type="date" name="fecha_llegada" id="fecha_llegada" value="" class="form-control">
            <label for="fecha_llegada">Fecha de llegada</label>
            <input type="date" name="fecha_llegada" id="fecha_llegada" value="" class="form-control">
            <div class="col-12 mt-3">
                <button class="btn btn-primary" type="submit">Registrar</button>
              </div>

        </form>
       
    </div>
    <div class="container ">

    <table id="myTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th id="transporte">Transporte</th>
                <th>Pais Salida</th>
                <th>Pais Llegada</th>
                <th>Numero escalas</th>
                <th>Precio</th>
            </tr>
        </thead>
    </table>
    
    </div>
    <script>
        $(document).ready(function() {
            listar_tabla();
    }); // fin ready 
        function listar_tabla(){

            $("#myTable").DataTable({
                ajax : {
                url :"controller/VueloController.php?obt=1",
                type:"GET",
                dataType:"json",
                dataSrc: '',
                error: function(xhr, textStatus, errorThrown) {
                    console.error('Error al cargar los datos:', errorThrown);
                }
            },
            columns: [
                {data:'transporte'},
                {data:'lugar_partida'},
                {data:'lugar_llegada'},
                {data:'numero_escalas'},
                {data:'precio'},
            ],
            
            
            });
        }
        

        $("#form").submit(function(event) {
            event.preventDefault();
            var dataForm = $("#form").serialize();
        $.ajax({
            url: "controller/VueloController.php",
            type: "POST",
            data: dataForm,
            beforeSend: function(event) {
                console.log("enviando")
            },
            success: function(data) {
                datos = JSON.parse(data);
                let mensaje = datos.mensaje;
                let success = datos.succes;
                console.log(mensaje);
                if(success === true) {
                    $("#myTable").DataTable().ajax.reload();
                }
            },
            error: function() {
                console.log("Error al enviar");
            }
        });
    });
        

    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</html>