<?php
include 'includes/header.php';

abstract class Persona{
    protected $nombre;
    protected $apellido;
    protected $email;
    protected $telefono;

    public function __construct($nombre, $apellido, $email, $telefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->telefono = $telefono;
    }
    public function mostrarInformacion() {
        echo "Nombre: " . $this->nombre . " ". $this->apellido . " Email: " . $this->email;
    }
    public function getTelefono(){
        return $this->telefono;
    }
}

// Clases abstractas
class Empleado extends Persona{
    
    protected $codigo;
    protected $departamento;

    public function __construct($nombre, $apellido, $email, $telefono, $codigo, $departamento)
    {
        parent::__construct($nombre, $apellido, $email, $telefono);
        $this->codigo = $codigo;
        $this->departamento = $departamento;
    }
    
}

class Proveedor extends Persona{
    protected $empresa;

    public function __construct($nombre, $apellido, $email, $telefono, $empresa)
    {
        parent::__construct($nombre, $apellido, $email, $telefono);
        $this->empresa = $empresa;
    }
    public function mostrarInformacion() {
        echo "Nombre: " . $this->nombre . " ". $this->apellido . " Email: " . $this->email . " De la empresa: " . $this->empresa;
    }
}

// $persona = new Persona('Persona', 'Apellido', 'persona@persona.com', 1234567);
$empleado = new Empleado('Juan', 'Perez', 'juan@gmail.com', 28947392, 001, 'Costos');
$proveedor = new Proveedor('Pedro', 'Pascal', 'pedro@gmail.com', 2727282, 'Gamesa');

// echo "<pre>";
// var_dump($persona);
// echo "</pre><br>";

echo "<pre>";
var_dump($empleado);
echo "</pre><br>";

echo "<pre>";
var_dump($proveedor);
echo "</pre><br>";

$empleado->mostrarInformacion();
echo "<br>";

$proveedor->mostrarInformacion();
echo "<br>";

echo $proveedor->getTelefono();