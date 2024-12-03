<?php
include 'includes/header.php';

// Metodos
class Empleado{
    protected $nombre;
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
    public function obtenerNombre(){
        return $this->nombre;
    }
    public function cambiarNombre($nombre){
        $this->nombre = $nombre;
    }
}

$empleado = new Empleado('Juan', 'Perez', 'TI', 'juan@empresa.com', 006);
$empleado->cambiarNombre("Un nuevo nombre");
echo $empleado->obtenerNombre();

echo "<pre>";
var_dump($empleado);
echo "</pre><br>";
