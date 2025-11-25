<?php
require_once("bd.php");

class FacturasLineasModelo extends BD
{
    // Campos de la tabla 
    public $id;
    public $factura_id;
    public $referencia;
    public $descripcion;
    public $cantidad;
    public $precio;
    public $iva;
    public $importe;
    public $filas;

    public function Insertar()
    {
        $sql = "INSERT INTO facturaslineas VALUES" .
            " (default, $this->factura_id, '$this->referencia', '$this->descripcion'," .
            " $this->cantidad, $this->precio, $this->iva, null, null, null)";

        return $this->_ejecutar($sql);
    }

    public function Modificar()
    {
        $sql = "UPDATE facturaslineas SET" .
            " referencia='$this->referencia', " .
            " descripcion='$this->descripcion', cantidad=$this->cantidad, " .
            " precio=$this->precio, iva=$this->iva" .
            " WHERE id=$this->id";

        return $this->_ejecutar($sql);
    }

    public function Borrar()
    {
        $sql = "DELETE FROM facturaslineas WHERE id=$this->id";

        return $this->_ejecutar($sql);
    }

    public function Seleccionar()
    {
        $sql = "SELECT * FROM facturaslineas";

        // Si me han pasado un id, obtenemos solo el registro indicado
        if ($this->id != 0) {
            $sql .= " WHERE id=$this->id";
        }
        // Si me pasan una factura en concreto, sacamos todas las lineas asociadas
        elseif ($this->factura_id != 0) {
            $sql .= " WHERE factura_id=$this->factura_id";
        }

        $this->filas = $this->_consultar($sql);

        if ($this->filas == null) {
            return false;
        }

        if ($this->id != 0) {
            // Guardamos los campos en las propiedades
            $this->factura_id = $this->filas[0]->factura_id;
            $this->referencia = $this->filas[0]->referencia;
            $this->descripcion = $this->filas[0]->descripcion;

            $this->cantidad = $this->filas[0]->cantidad;
            $this->precio = $this->filas[0]->precio;
            $this->iva = $this->filas[0]->iva;
            $this->importe = $this->filas[0]->importe;
        }

        return true;
    }

    public function Totales()
    {
        $sql = "SELECT
                SUM(base) AS base,
                SUM(importe_iva) AS importe_iva,
                SUM(importe) AS importe
                FROM facturaslineas
                WHERE factura_id=$this->factura_id";

        $fila = $this->_consultar($sql);

        if ($fila == null) {
            return false;
        }

        return $fila;
    }
}
