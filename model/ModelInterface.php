<?php 
namespace Aeropuerto\Model;

interface ModelInterface{
    public function select(string $sql) : ?array;

    public function insert(array $campos) : bool;

    public function update(array $campos) : bool;
    
    public function delete(string $campo, string $condicion) : bool;
}

?>