<?php
include 'includes/header.php';

// Metodos
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
        // $this->nombreEmpleado();
    }

    public function nombreEmpleado()
    {
        echo $this->nombre . " " . $this->apellido;
    }
    public function departamentoEmpleado()
    {
        return $this->departamento;
    }
    
}

$empleado = new Empleado('Juan', 'Perez', 'TI', 'juan@empresa.com', 006);
// instancia de juan
// $empleado->nombreEmpleado();
$empleado2 = new Empleado('Karen', 'Lopez', 'MTK', 'karen@empresa.com', 007);


echo "<pre>";
var_dump($empleado);
echo "</pre><br>";

echo "<pre>";
var_dump($empleado2);
echo "</pre><br>";

// echo $empleado->nombreEmpleado();
$departamento1 = $empleado->departamentoEmpleado();
echo $departamento1;