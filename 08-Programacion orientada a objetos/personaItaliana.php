<?php
require_once "persona.php";

class PersonaItaliana extends Persona
{
    public function __construct()
    {
        parent::__construct($nombre = "");
    }   

    public function Saludar()
    {
        echo "Ciao, soy $this->nombre <br>";
    }
}
