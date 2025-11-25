<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

require_once("model/facturas.php");

class FacturasControlador
{
    static function index()
    {
        $facturas = new FacturasModelo();

        $facturas->Seleccionar();
        require_once("view/facturas.php");
    }

    static function Nuevo()
    {
        $opcion = 'NUEVO';
        require_once("view/facturasmantenimiento.php");
    }

    static function Insertar()
    {
        $factura = new FacturasModelo();

        $factura->cliente_id = $_POST['cliente_id'];
        $factura->numero     = $_POST['numero'];
        $factura->fecha      = $_POST['fecha'];

        if ($factura->Insertar() == 1)
            header("location:" . URLSITE . '?c=facturas');
        else {
            $_SESSION["CRUDMVC_ERROR"] = $factura->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    static function Editar()
    {
        $factura = new FacturasModelo();
        $factura->id = $_GET['id'];

        $opcion = 'EDITAR';

        if ($factura->Seleccionar())
            require_once("view/facturasmantenimiento.php");
        else {
            $_SESSION["CRUDMVC_ERROR"] = $factura->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    static function Modificar()
    {
        $factura = new FacturasModelo();

        $factura->id         = $_GET['id'];
        $factura->cliente_id = $_POST['cliente_id'];
        $factura->numero     = $_POST['numero'];
        $factura->fecha      = $_POST['fecha'];

        if (($factura->Modificar() == 1) || ($factura->GetError() == ''))
            header("location:" . URLSITE . '?c=facturas');
        else {
            $_SESSION["CRUDMVC_ERROR"] = $factura->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    static function Borrar()
    {
        $factura = new FacturasModelo();
        $factura->id = $_GET['id'];

        if ($factura->Borrar() == 1)
            header("location:" . URLSITE . '?c=facturas');
        else {
            $_SESSION["CRUDMVC_ERROR"] = $factura->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }
}
?>
