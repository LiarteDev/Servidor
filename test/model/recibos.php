<?php
require_once("bd.php");

class RecibosModelo extends BD
{
    // Campos de la tabla
    public $recibo_id;
    public $factura_id;
    public $fecha;
    public $importe;

    public $filas;

    public function Insertar()
    {
        $sql = "INSERT INTO recibos values" . " (default, $this->factura_id, '$this->fecha', $this->importe)";
        die($sql);
        return $this->_ejecutar($sql);
    }

    public function Modificar()
    {
        $sql = "UPDATE recibos SET" . " factura_id=$this->factura_id, fecha='$this->fecha'," .
            " importe=$this->importe" .
            " WHERE recibo_id = $this->recibo_id";

        return $this->_ejecutar($sql);
    }

    public function Borrar()
    {
        $sql = "DELETE FROM recibos WHERE recibo_id=$this->recibo_id";

        return $this->_ejecutar($sql);
    }

    public function Seleccionar()
    {
        $sql = "SELECT *," .
            " (SELECT numero FROM facturas f WHERE f.id=r.factura_id) AS numero" .
            " (SELECT fecha FROM facturas f WHERE f.id=r.factura_id) AS fecha" .
            " FROM recibos r";

        // Si me han pasado un id, obtenemos solo el registro indicado
        if ($this->factura_id != 0) {
            $sql .= " WHERE r.factura_id=$this->factura_id";
        }

        $this->filas = $this->_consultar($sql);

        if ($this->filas == null) {
            return false;
        }

        return true;
    }

    public function SeleccionarById()
    {
        $sql = "SELECT * FROM recibos WHERE recibo_id=" . $this->recibo_id;

        $this->filas = $this->_consultar($sql);

        if ($this->filas == null) {
            return false;
        }

        $this->recibo_id = $this->filas[0]->recibo_id;
        $this->factura_id = $this->filas[0]->factura_id;
        $this->fecha = $this->filas[0]->fecha;
        $this->importe = $this->filas[0]->importe;

        return true;
    }

    public function SeleccionarImprimir()
    {
        $sql = "SELECT *," .
            " (SELECT nombre FROM clientes c WHERE c.id=  ( SELECT id FROM facturas f WHERE id = r.factura_id) AS cliente," .
            " (SELECT numero FROM facturas f WHERE f.id=r.recibo_id) as numero," .
            "FROM recibos r";
    }
}
