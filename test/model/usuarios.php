<?php
require_once("bd.php");

class UsuariosModelo extends BD
{
    // Campos de la tabla
    public $filas;
    public $id;
    public $usuario;
    public $contrasena;
    public $nombre;

    public function Insertar()
    {
        $sql = "INSERT INTO usuarios VALUES" . " (default, '$this->usuario', '$this->contrasena',
        '$this->nombre')";

        return $this->_ejecutar($sql);
    }

    public function Modificar()
    {
        $sql = "UPDATE usuarios SET" . " usuario='$this->usuario', contrasena='$this->contrasena', 
        nombre='$this->nombre'";

        $sql .= " WHERE id=$this->id";  // PONER SIEMPRE EL ESPACIO AL CONCATENAR CADENAS DE SQL

        return $this->_ejecutar($sql);
    }

    public function Borrar()
    {
        $sql = "DELETE FROM usuarios WHERE id=$this->id";

        return $this->_ejecutar($sql);
    }

    public function Seleccionar()
    {
        $sql = "SELECT * FROM usuarios";

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
            $this->usuario = $this->filas[0]->usuario;
            $this->contrasena = $this->filas[0]->contrasena;
            $this->nombre = $this->filas[0]->nombre;
        }

        return true;
    }

    public function ExisteEmail()
    {
        // Seleccionamos de la BBDD el usuario con el email proporcionado
        $sql = "SELECT * FROM usuarios WHERE usuario='$this->usuario'";

        // Realizamos la consulta
        $this->filas = $this->_consultar($sql);

        // Si no existe un usuario con ese email, falso
        if ($this->filas == null) {
            return false;
        }
        // Si existe, verdadero
        return true;
    }

    public function CambiarContrasena()
    {
        $sql = "UPDATE usuarios SET" . " contrasena='$this->contrasena'" . " WHERE usuario='$this->usuario'";

        return $this->_ejecutar($sql);
    }
}
