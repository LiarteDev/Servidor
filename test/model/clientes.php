<?php
require_once("bd.php");

class ClientesModelo extends BD
{
    public $filas;
    public $id;
    public $nombre;
    public $email;
    public $telefono;
    public $provincia_id;
    public $rgpd;
    public $activo;
    public $formadepago;

    public function Insertar()
    {
        $sql = "INSERT INTO clientes VALUES" . " (default, '$this->nombre', '$this->email', '$this->telefono', '$this->provincia_id', $this->rgpd, $this->activo, '$this->formadepago')";

        return $this->_ejecutar($sql);
    }

    public function Modificar()
    {
        $sql = "UPDATE clientes SET" . " nombre='$this->nombre', email='$this->email', 
        telefono='$this->telefono', provincia_id='$this->provincia_id', rgpd='$this->rgpd',
        activo='$this->activo', formadepago='$this->formadepago'";

        $sql .= " WHERE id=$this->id";  // PONER SIEMPRE EL ESPACIO AL CONCATENAR CADENAS DE SQL

        return $this->_ejecutar($sql);
    }

    public function Borrar()
    {
        $sql = "DELETE FROM clientes WHERE id=$this->id";

        return $this->_ejecutar($sql);
    }

    public function Seleccionar()
    {
        $sql = "SELECT *," .
            " (SELECT provincia 
            FROM provincias p 
            WHERE p.id=c.provincia_id) AS provincia" .
            " FROM clientes c";


        if ($this->id != 0) {
            $sql .= " WHERE c.id = $this->id";
        }

        $this->filas = $this->_consultar($sql);

        if ($this->filas == null) {
            return false;
        }

        if ($this->id != 0) {
            // Guardamos los campos en las propiedades
            $this->nombre = $this->filas[0]->nombre;
            $this->email = $this->filas[0]->email;
            $this->telefono = $this->filas[0]->telefono;
            $this->provincia_id = $this->filas[0]->provincia_id;
            $this->rgpd = $this->filas[0]->rgpd;
            $this->activo = $this->filas[0]->activo;
            $this->formadepago = $this->filas[0]->formadepago;
        }

        return true;
    }
}
