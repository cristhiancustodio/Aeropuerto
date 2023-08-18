<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  </head>
  <body>
    <style>
        
    </style>
    <div>
        <table align="center" width="685" border="1" style="border: 1px solid black;border-collapse: collapse;">
            <tr align="center">
                <td>Cristhian</td>
                <td>Cristhian</td>
                <td>Cristhian</td>
            </tr>
            <tr align="center">
                <td>Custodio</td>
                <td>Custodio</td>
                <td>Custodio</td>
            </tr>
        </table>

        <table align="center" width="685" border="1" style="margin-top: 4px; border: 1px solid black;border-collapse: collapse;">
            <tr>
                <td height="50">nombre</td>
                <td>nombre</td>
                <td>nombre</td>
            </tr>
            <tr>
                <td colspan="6">custodio</td>
            </tr>
            <tr>
                <td height="50"> hinostroza</td>
                <td height="50"> hinostroza</td>
                <td height="50"> hinostroza</td>
                <td height="50"> hinostroza</td>
                <td height="50"> hinostroza</td>
                <td height="50"> hinostroza</td>
            </tr>
        </table>
        <table align="center" width="685" border="1" style="margin-top: 4px; border: 1px solid black;border-collapse: collapse;">
            <tr>
                <td height="50">nombre</td>
                <td>nombre</td>
                <td>nombre</td>
            </tr>
            <tr>
                <td colspan="6">custodio</td>
            </tr>
            <tr>
                <td height="50"> hinostroza</td>
                <td height="50"> hinostroza</td>
                <td height="50"> hinostroza</td>
                <td height="50"> hinostroza</td>
                <td height="50"> hinostroza</td>
                <td height="50"> hinostroza</td>
            </tr>
        </table>
        <table align="center" width="685" border="1" style="border: 1px solid black;border-collapse: collapse;">
        <?php for($i=0; $i<18;$i++){ ?>
            <tr align="center" class="datos">
                <td height="35">Cristhian</td>
                <td>Cristhian</td>
                <td>Cristhian</td>
            </tr>
            <?php } ?>
        </table>

        
        <table align="center" width="685" border="1" style="margin-top: 4px; border: 1px solid black;border-collapse: collapse;">
            <tr>
                <td height="50">nombre</td>
                <td>nombre</td>
                <td>nombre</td>
            </tr>
            <tr>
                <td colspan="6">custodio</td>
            </tr>
            <tr>
                <td height="50"> hinostroza</td>
                <td height="50"> hinostroza</td>
                <td height="50"> hinostroza</td>
                <td height="50"> hinostroza</td>
                <td height="50"> hinostroza</td>
                <td height="50"> hinostroza</td>
            </tr>
        </table>
        <table align="center" width="685" border="1" style="border: 1px solid black;border-collapse: collapse;">
            <tr align="center">
                <td>Cristhian</td>
                <td>Cristhian</td>
                <td>Cristhian</td>
            </tr>
            <tr align="center">
                <td>Custodio</td>
                <td>Custodio</td>
                <td>Custodio</td>
            </tr>
        </table>
        <table align="center" width="685" border="1" style="margin-top: 4px; border: 1px solid black;border-collapse: collapse;">
            <tr>
                <td height="50">nombre</td>
                <td>nombre</td>
                <td>nombre</td>
            </tr>
            <tr>
                <td colspan="6">custodio</td>
            </tr>
            <tr>
                <td height="50"> hinostroza</td>
                <td height="50"> hinostroza</td>
                <td height="50"> hinostroza</td>
                <td height="50"> hinostroza</td>
                <td height="50"> hinostroza</td>
                <td height="50"> hinostroza</td>
            </tr>
        </table>
        <table align="center" width="685" border="1" style="border: 1px solid black;border-collapse: collapse;">
            <tr align="center">
                <td>Cristhian</td>
                <td>Cristhian</td>
                <td>Cristhian</td>
            </tr>
            <tr align="center">
                <td>Custodio</td>
                <td>Custodio</td>
                <td>Custodio</td>
            </tr>
        </table>
        <table align="center" width="685" border="1" style="border: 1px solid black;border-collapse: collapse;">
            <tr align="center">
                <td>Cristhian</td>
                <td>Cristhian</td>
                <td>Cristhian</td>
            </tr>
            <tr align="center">
                <td>Custodio</td>
                <td>Custodio</td>
                <td>Custodio</td>
            </tr>
        </table>

    </div>
    
    <div class="pagina-final">
    </div>

  </body>
  <script>

        function crearNuevaHoja(){
            let tabla = "<div style='page-break-after:always;border:1px solid red' class='nueva_hoja'></div>";
            $(".pagina-final").append(tabla);
        }


        function crearTabla() {
            let tabla = '<table align="center" width="685" border="1" style="border: 1px solid black;border-collapse: collapse;" class="datos-tabla"></table>';
            $(".nueva_hoja:last").append(tabla);
        }


        crearNuevaHoja();

        function ordenar(){

            const datos =document.querySelectorAll(".datos");
            
            if(datos.length>1){
                crearTabla();
            }
            
            datos.forEach(el=>{
                
                let altura_tabla = $(".datos-tabla").height() ;
                let altura_hoja =  $(el).height() ;
                
                console.log(altura_tabla);
                let altura_total = parseInt(altura_tabla) + parseInt(altura_tabla);
                if(altura_total>600){
                    crearNuevaHoja();
                    crearTabla();  
                }
                $(el).remove();
                $(".datos-tabla:last").append(el);
            });
            
        }
        ordenar();
        </script>
</html>
