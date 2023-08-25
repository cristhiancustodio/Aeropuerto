<?php
include("modelo.php");
include("modelo_base.php");
class LakeLouis extends Model implements IModel
{
    protected $tabla = "psicologia";
    protected $idtabla = "idpsicologia";

    public function __construct(?int $id_valor)
    {
        $this->valor_id_tabla = $id_valor;
    }
    public function getDataGeneral()
    {

        $campos_seleccionar = [
            "idcomprobante, idpaciente, lake1, lake2 , lake3 as comandante, date_format(fecha, '%H:%i %p') as fecha_actualizado, custodio , principe"
        ];

        return $this->select($campos_seleccionar);
    }
    public function insertarDatos($campos)
    {

        $campos = [
            "idcomprobante" => 3839,
            "idpaciente" => 33,
            "apellidos" => "Cristhian",
            "nombres" => "Custodio",
        ];

        return $this->insert($campos);
    }
    public function actualizarDatos(array $campos)
    {

        $campos = [
            "idcomprobante" => 3839,
            "idpaciente" => 33,
            "apellidos" => "Cristhian",
            "nombres" => "Custodio",
        ];
        return $this->update($campos);
    }
    public function eliminarLakeLouis()
    {
        return $this->eliminar();
    }
    public function consultaPersonalizada()
    {
    }
}

$idformato = 50;
$campos = $_POST;
$accion = "listar";
$lake_louise = new LakeLouis($idformato);
if ($accion === "grabar") {

    $data = $lake_louise->insertarDatos($campos);
    var_dump($data);
} else if ($accion === "editar") {

    $data = $lake_louise->actualizarDatos($campos);
    var_dump($data);
} elseif ($accion === "eliminar") {
    $data = $lake_louise->eliminarLakeLouis();
    var_dump($data);
} elseif ($accion === "listar") {
    $idcomprobante = 123;
    $campos = [
        "idpaciente", "idcomprobante",
    ];
    $data = $lake_louise->datosPersonalizados($campos, $idcomprobante);

    //$data = $lake_louise->getDataGeneral();
    var_dump($data);
}
