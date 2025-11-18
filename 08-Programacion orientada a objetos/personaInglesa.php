<?php
require_once("persona.php");
class PersonaInglesa extends Persona
{
    public function __construct()
    {
        $this->nombre = "John";
    }
    
    public function TomarTe()
    {
        echo "Estoy tomando té<br>";
    }
}
?>