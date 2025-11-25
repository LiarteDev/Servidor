<?php
require_once("bd.php");

class LineasModelo extends BD
{
    public $id;
    public $factura_id;
    public $referencia;
    public $descripcion;
    public $cantidad;
    public $precio;
    public $iva;
    public $importe;

    public $filas = null;

    public function Insertar()
    {
        // Calcular importe
        $this->importe = $this->cantidad * $this->precio * (1 + $this->iva / 100.0);

        $sql = "INSERT INTO lineas VALUES 
            (default, '$this->factura_id', '$this->referencia', 
            '$this->descripcion', '$this->cantidad', '$this->precio',
            '$this->iva', '$this->importe')";

        return $this->_ejecutar($sql);
    }

    public function Modificar()
    {
        $this->importe = $this->cantidad * $this->precio * (1 + $this->iva / 100.0);

        $sql = "UPDATE lineas SET 
            factura_id='$this->factura_id',
            referencia='$this->referencia',
            descripcion='$this->descripcion',
            cantidad='$this->cantidad',
            precio='$this->precio',
            iva='$this->iva',
            importe='$this->importe'
            WHERE id=$this->id";

        return $this->_ejecutar($sql);
    }

    public function Borrar()
    {
        $sql = "DELETE FROM lineas WHERE id=$this->id";
        return $this->_ejecutar($sql);
    }

    public function Seleccionar()
    {
        $sql = "SELECT * FROM lineas";

        if ($this->id != 0)
            $sql .= " WHERE id=$this->id";

        $this->filas = $this->_consultar($sql);

        if ($this->filas == null)
            return false;

        if ($this->id != 0) {
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
}
?>
