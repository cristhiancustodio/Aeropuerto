<?php 
/**
 * Patrom de diseño estrategia
 */
interface OperationInterface{

    public function doOperation(float $a, float $b);

}

class AdditionStrategy implements OperationInterface{

    public function doOperation(float $a, float $b)
    {
        return $a + $b;    
    }
}

class SubstractionStrategy implements OperationInterface{
    public function doOperation(float $a, float $b) : float|int
    {
        return $a - $b;
    }
}
class MultiplicactionStrategy implements OperationInterface{
    public function doOperation(float $a, float $b) : float|int
    {
        return $a * $b;
    }
}

class Calculator 
{
    protected $operation;

    
    public function __construct(OperationInterface $operation = null)
    {
        $this->operation = $operation ?? new AdditionStrategy();

    }
    
    public function execute(float $a, float $b){
        return $this->operation->doOperation($a,$b);
    }

    public function setOperation(OperationInterface $operation)
    {
        $this->operation = $operation;
    }
     
}

$calcula = new Calculator(new MultiplicactionStrategy());
$resultado = $calcula->execute(59.2,50);
echo $resultado;








?>