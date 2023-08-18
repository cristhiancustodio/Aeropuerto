<?php 

class Persona 
{
    private string $nombre;
    private int $edad; 
    private int $dni;
    private string $sexo = "Hombre";

    public function __construct(string $nombre, int $edad, string $sexo = null)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->sexo = $sexo;
        $this->dni = $this->generarDNI();
    }
    
    public function calcularIMC()
    {
        # code...
    }
    public function esMayorEdad() : bool
    {
        if($this->edad>18){
            return true;
        }
        else{
            return false;
        }
    }
    public function comprobarSexo(string $sexo) : bool{
        if($sexo === $this->sexo){
            return true;
        }
        return false;
    }

    public function __toString(){
        return "como estas";
    }
    public function generarDNI() : int{
        return rand(10000000,99999999);
    }
    public function getDni() : int {
        return $this->dni;
    }


}
$person = new Persona("cristhian", "19", "masculibno");
echo $person->comprobarSexo("masculibno");





?>