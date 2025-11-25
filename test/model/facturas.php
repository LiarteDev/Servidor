<?php
require_once("bd.php");

class FacturasModelo extends BD
{
    // Campos de la tabla
    public $id;
    public $cliente_id;
    public $numero;
    public $fecha;

    // Campos calculados
    public $cliente;
    public $base;
    public $importe_iva;
    public $importe;

    public $filas;

    public function Insertar()
    {
        $sql = "INSERT INTO facturas values" . " (default, $this->cliente_id, $this->numero, '$this->fecha')";

        return $this->_ejecutar($sql);
    }

    public function Modificar()
    {
        $sql = "UPDATE facturas SET" . " cliente_id=$this->cliente_id, numero=$this->numero," .
            " fecha='$this->fecha'" .
            " WHERE id = $this->id";

        return $this->_ejecutar($sql);
    }

    public function Borrar()
    {
        $sql = "DELETE FROM facturas WHERE id=$this->id";

        return $this->_ejecutar($sql);
    }

    public function Seleccionar()
    {
        $sql = "SELECT *," .
            " (SELECT nombre FROM clientes WHERE clientes.id=f.cliente_id) AS cliente, " .
            " (SELECT SUM(cantidad * precio) FROM facturaslineas fl WHERE fl.factura_id=f.id) AS base , " .
            " (SELECT SUM(iva) FROM facturaslineas fl WHERE fl.factura_id=f.id) AS importe_iva, " .
            " (SELECT SUM(importe) FROM facturaslineas fl WHERE fl.factura_id=f.id) AS importe " .
            " FROM facturas f";

        // Si me han pasado un id, obtenemos solo el registro indicadoç
        if ($this->id != 0) {
            $sql .= " WHERE id=$this->id";
        }

        $this->filas = $this->_consultar($sql);

        if ($this->filas == null) {
            return false;
        }

        if ($this->id != 0) {
            // Guardamos los campos en las propiedades
            $this->cliente_id = $this->filas[0]->cliente_id;
            $this->numero = $this->filas[0]->numero;
            $this->fecha = $this->filas[0]->fecha;

            $this->cliente = $this->filas[0]->cliente;
            $this->base = $this->filas[0]->base;
            $this->importe_iva = $this->filas[0]->importe_iva;
            $this->importe = $this->filas[0]->importe;
        }

        return true;
    }

    public function SeleccionarCliente()
    {
        $sql = "SELECT *," .
            " (SELECT nombre FROM clientes WHERE clientes.id=facturas.cliente_id) AS cliente " .
            " FROM facturas";

        // Si me han pasado un id, obtenemos solo las facturas de ese cliente
        if ($this->cliente_id != 0) {
            $sql .= " WHERE cliente_id=$this->cliente_id";
        }

        $this->filas = $this->_consultar($sql);

        if ($this->filas == null) {
            return false;
        }

        if ($this->cliente_id != 0) {
            // Guardamos los campos en las propiedades
            $this->numero = $this->filas[0]->numero;
            $this->fecha = $this->filas[0]->fecha;
        }

        return true;
    }

    public function Renumerar($facturaInicial, $facturaFinal, $numero)
    {
        for ($i = $facturaInicial; $i <= $facturaFinal; $i++, $numero++) {
            $sql = "UPDATE facturas SET numero=$numero WHERE numero=$i";
            //die($sql);
            $this->_ejecutar($sql);
        }
    }
}
