<?php
require_once("bd.php");

class ClientesModelo extends BD
{
    // Campos de la tabla. 
    public $id;
    public $nombre;
    public $apellidos;
    public $email;
    public $contrasena;
    public $direccion;
    public $cp;
    public $poblacion;
    public $provincia;
    public $fecha_nacimiento;

    public $filas = null;

    public function Insertar()
    {
        $sql = "INSERT INTO clientes VALUES" .
            " (default, '$this->nombre', '$this->apellidos','$this->email','$this->contrasena','$this->direccion','$this->cp','$this->poblacion','$this->provincia','$this->fecha_nacimiento')";

        return $this->_ejecutar($sql);
    }

    public function Modificar()
    {
        $sql = "UPDATE clientes SET" .
            " nombre='$this->nombre', apellidos='$this->apellidos', email='$this->email', contrasena='$this->contrasena',direccion='$this->direccion',cp='$this->cp',poblacion='$this->poblacion',provincia='$this->provincia',fecha_nacimiento='$this->fecha_nacimiento'" .
            " WHERE id=$this->id";

        return $this->_ejecutar($sql);
    }

    public function Borrar()
    {
        $sql = "DELETE FROM clientes WHERE id=$this->id";

        return $this->_ejecutar($sql);
    }

    public function Seleccionar()
    {
        $sql = 'SELECT * FROM clientes';

        // Si me han pasado un id, obtenemos solo el registro indicado. 
        if ($this->id != 0)
            $sql .= " WHERE id=$this->id";

        $this->filas = $this->_consultar($sql);

        if ($this->filas == null)
            return false;

        if ($this->id != 0) {
            // Guardamos los campos en las propiedades. 
            $this->nombre = $this->filas[0]->nombre;
            $this->apellidos = $this->filas[0]->apellidos;
            $this->email = $this->filas[0]->email;
            $this->contrasena = $this->filas[0]->contrasena;
            $this->direccion = $this->filas[0]->direccion;
            $this->cp = $this->filas[0]->cp;
            $this->poblacion = $this->filas[0]->poblacion;
            $this->provincia = $this->filas[0]->provincia;
            $this->fecha_nacimiento = $this->filas[0]->fecha_nacimiento;
        }

        return true;
    }
}
?>