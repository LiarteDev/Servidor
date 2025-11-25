<?php
require_once("bd.php");

class ProvinciasModelo extends BD
{
    public $filas;
    public $id;
    public $codigo;
    public $provincia;

    public function Seleccionar()
    {
        $sql = "SELECT * FROM provincias";

        // Si me han pasado un id, obtenemos solo el registro indicado
        if ($this->id != 0) {
            $sql .= " WHERE id=$this->id";
        }

        $this->filas = $this->_consultar($sql);

        if ($this->filas == null) {
            return false;
        }

        if ($this->id != 0) {
            // Guardamos los campos en las propiedades
            $this->codigo = $this->filas[0]->codigo;
            $this->provincia = $this->filas[0]->provincia;
        }

        return true;
    }
}
