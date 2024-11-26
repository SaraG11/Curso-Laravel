<?php
include 'includes/header.php';

// constructores
class Empleado{
    public $nombre;
    public $apellido;
    public $departamento;
    public $email;
    public $codigo;

    public function __construct($nombre, $apellido, $departamento, $email, $codigo )
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->departamento = $departamento;
        $this->email = $email;
        $this->codigo = $codigo;
    }
    
}

$empleado = new Empleado('Juan', 'Perez', 'TI', 'juan@empresa.com', 006);
$empleado2 = new Empleado('Karen', 'Lopez', 'MTK', 'karen@empresa.com', 007);
// $empleado->nombre = "Juan";
// $empleado->apellido = "Perez";

echo "<pre>";
var_dump($empleado);
echo "</pre><br>";

echo "<pre>";
var_dump($empleado2);
echo "</pre><br>";