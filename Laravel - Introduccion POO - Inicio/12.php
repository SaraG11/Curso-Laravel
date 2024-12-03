<?php
include 'includes/header.php';

// Metodos estaticos
class Empleado{
    protected static $nombre;
    public $apellido;
    public $departamento;
    public $email;
    public $codigo;

    public function __construct($nombre, $apellido, $departamento, $email, $codigo )
    {
        self::$nombre = $nombre;
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
    public static function obtenerEmepleado(){
        echo "Desde metodo estatico";
    }
    public static function getNombre(){
        return self::$nombre;
    }
}


$empleado = new Empleado('Juan', 'Perez', 'TI', 'juan@empresa.com', 006);

echo $empleado::getNombre();

echo "<pre>";
var_dump($empleado);
echo "</pre><br>";



