<?php
include 'includes/header.php';
include 'DB.php';

// Comunicar dos clases
class Empleado{
    protected $nombre;
    protected $apellido;
    protected $departamento;
    protected $email;
    protected $codigo;

    public function __construct($nombre, $apellido, $departamento, $email, $codigo )
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->departamento = $departamento;
        $this->email = $email;
        $this->codigo = $codigo;
    }
    /*
    Get - para obtener un valor
    Set - para modificar un valor 
    */
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getDepartamento(){
        return $this->departamento;
    }
    public function setDepatarmento($dpto){
        $this->departamento = $dpto;
    }
}

$empleado = new Empleado('Juan', 'Perez', 'TI', 'juan@empresa.com', 006);
$nombre = $empleado->getNombre();

$db = new DB($nombre);
$db->guardar();