<?php
// Ejericio 83
class Persona{
    protected $nombre;

    function __construct($nombre = ""){
        $this->nombre = $nombre;
    }

    function SetNombre($nombre){
        $this->nombre = $nombre;
    }
    public function Saludar(){
        echo "Hola, soy $this->nombre" . "<br>";
    }
}
?>