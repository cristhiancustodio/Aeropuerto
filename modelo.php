<?php

class Model
{
    protected $tabla;
    protected $idtabla;
    protected $valor_id_tabla;
    protected function insert(array $campos)
    {
        $columnas = implode(", ", array_keys($campos));
        $valores = implode(
            ", ",
            array_map(function ($valores) {
                return "'" . $valores . "'";
            }, $campos)
        );
        return $sql = "INSERT INTO " . $this->tabla . "(" . $columnas . ") values (" . $valores . ")";
    }

    protected function update(array $campos)
    {
        $campos_update = [];
        foreach ($campos as $key => $item) {
            $campos_update[] = $key . "='$item'";
        }
        $campos_update = implode(", ", $campos_update);
        return $sql = "UPDATE $this->tabla SET $campos_update WHERE $this->idtabla='" . $this->valor_id_tabla . "' and estado=1";
    }
    protected function eliminar()
    {
        $sql = "UPDATE $this->tabla set estado=0 where $this->idtabla='" . $this->valor_id_tabla . "' and estado=1";
        return $sql;
    }
    protected function select(array $campos_seleccion): string
    {
        $campos_seleccion = implode(", ", array_map(function ($value) {
            return $value;
        }, $campos_seleccion));
        $sql = "SELECT $campos_seleccion FROM $this->tabla where $this->idtabla='" . $this->valor_id_tabla . "' and estado=1";
        return $sql;
        //return $this->selectAll($sql);
    }
    protected function selectAll(string $sql): array
    {
        $result = mysqli_query($GLOBALS["conn"], $sql) or die(mysqli_error($GLOBALS["conn"]));
        $numero = mysqli_num_rows($result);

        $data = [];
        if ($numero == 1) {
            return $row = mysqli_fetch_assoc($result);
        } elseif ($numero > 1) {

            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function datosPersonalizados(?array $campos_elegir, ?int $idcomprobante)
    {
        $this->idtabla = "idcomprobante";
        $this->valor_id_tabla = $idcomprobante;
        return $this->select($campos_elegir);
    }
}
