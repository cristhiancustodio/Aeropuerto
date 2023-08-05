<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta DNI</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
</head>

<body>
    <div id="dialog" title="Basic dialog">
        <p id="nombre_modal"></p>
    </div>
   <!-- <div class="container">
        <h1>Esta es la pagina para realizar consulta dni</h1>
        <div class="input-group mb-3">

            <form id="form">
                <div class="col-auto">
                    <input type="text" name="dni" id="dni" class="form-control">
                    <div>

                        <h2 id="nombre"></h2>
                        <h2 id="apellido"></h2>
                        <h2 id="dni_text"></h2>
                        <button id="enviar" type="submit" class="btn btn-primary mb-3">Enviar</button>
            </form>

            <input type="text" id="dni2" name="dni2" class="form-control">
            <button type="button" onclick="getDniApi()" class="btn btn-primary">DNI API</button>
        </div>
    </div>-->
    <div class="container" >
    <form id="form">
  <!-- Email input -->

    <h1 style="text-align: center;">Busqueda de datos con DNI</h1>
    <p style="text-align: center;">Busqueda de datos desde una base Mysql en Azure</p>
  <div class="form-outline mb-4 col-3" >
    <input style="margin-left: 400px;" type="text" name="dni" id="dni" class="form-control" />
    <button style="margin-left: 400px;" id="enviar" type="submit" class="btn btn-primary mb-3">Enviar</button>
  </div>
  <p style="text-align: center;">Busqueda de datos desde una API</p>
  <!-- Password input -->
  <div class="form-outline mb-6 col-3">
    <input style="margin-left: 400px;" type="text" id="dni2" name="dni2" class="form-control" />

</div>
    <button style="margin-left: 400px;"  type="button" onclick="getDniApi()" class="btn btn-primary mb-3">DNI API</button>

</form>
</div>
</body>

<script>
    $("#form").submit(function(event) {
        event.preventDefault();
        var dataForm = $("#form").serialize();
        let dni = $("#dni").val();
        console.log(dni);
        $.ajax({
            type: "GET",
            url: "controller/ConsultaController.php?dni=" + dni,
            dataType: "json",
            success: function(response) {
                console.log(response);
                let data = response;
                console.log(data[0].nombre);
                $("#nombre").text(data[0].nombre);
                $("#apellido").text(data[0].apellido);
                $("#dni_text").text(data[0].dni);
                nombre_completo = `${data[0].nombre} ${data[0].apellido} ${data[0].dni}`;
                $("#nombre_modal").text(nombre_completo);
                $("#dialog").dialog();
            }
        });

    });
    async function getDniApi() {
        let dni2 = document.getElementById("dni2").value;
        let nombre_completo = "";
        await fetch("controller/ConsultaController.php?dni2=" + dni2)
            .then((response) => response.json())
            .then((response) => {

                nombre_completo = `${response.result.nombres} ${response.result.apellido_paterno} ${response.result.apellido_materno}`;
            })
            .catch(() => {

            });
        $("#nombre_modal").text(nombre_completo);
        $("#dialog").dialog();
    }
</script>

</html>