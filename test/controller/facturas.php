<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once("model/facturas.php");
require_once("model/clientes.php");
//require_once("model/facturaslineas.php");
require_once("pdfs/facturas.php");

class FacturasControlador
{
    static function index()
    {
        $facturas = new FacturasModelo();

        if (isset($_GET["cliente_id"])) {
            $facturas->cliente_id = $_GET["cliente_id"];
            $facturas->SeleccionarCliente();
        } else {
            $facturas->Seleccionar();

            require_once("view/facturas.php");
        }
    }

    static function Nuevo()
    {
        $clientes = new ClientesModelo();

        $clientes->Seleccionar();

        $opcion = "NUEVA";


        require_once("view/facturasmantenimiento.php");
    }

    static function Insertar()
    {
        $facturas = new FacturasModelo();

        $facturas->cliente_id = $_POST["cliente_id"];
        $facturas->numero = $_POST["numero"];
        $facturas->fecha = $_POST["fecha"];

        if ($facturas->Insertar() == 1) {
            header("location:" . URLSITE . "?c=facturas");
        } else {
            $_SESSION["CRUDMVC_ERROR"] = $facturas->GetError();

            header("location:" . URLSITE . "view/error.php");
        }
    }

    static function Editar()
    {
        $factura = new FacturasModelo();
        $clientes = new ClientesModelo();

        $factura->id = $_GET["id"];

        $opcion = "EDITAR";     // Opción de modificar un cliente

        if ($factura->Seleccionar() && $clientes->Seleccionar()) {
            require_once("view/facturasmantenimiento.php");
        } else {
            $_SESSION["CRUDMVC_ERROR"] = $facturas->GetError();

            header("location:" . URLSITE . "view/error.php");
        }
    }

    static function Modificar()
    {
        $factura = new FacturasModelo();

        $factura->id = $_GET["id"];
        $factura->cliente_id = $_POST["cliente_id"];
        $factura->numero = $_POST["numero"];
        $factura->fecha = $_POST["fecha"];

        /*
            Aquí hay que tener cuidado, en el caso de que se pulse el botón de aceptar pero no se haya 
            modificado nada, la función modificar devolverá un cero, por eso hay que comprobar que no hay error 
        */
        if ($factura->Modificar() == 1 || $factura->GetError() == "") {
            header("location:" . URLSITE . "?c=facturas");
        } else {
            $_SESSION["CRUDMVC_ERROR"] = $factura->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    static function Borrar()
    {
        $factura = new FacturasModelo();

        $factura->id = $_GET["id"];

        if ($factura->Borrar() == 1) {
            header("location:" . URLSITE . "?c=facturas");
        } else {
            $_SESSION["CRUDMVC_ERROR"] = $factura->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    static function RenumerarVista()
    {
        require_once("view/facturasrenumerar.php");
    }

    static function Renumerar()
    {
        $facturaInicial = $_POST["facturainicial"];
        $facturaFinal = $_POST["facturafinal"];
        $numero = $_POST["numero"];

        $facturas = new FacturasModelo();

        $facturas->Renumerar($facturaInicial, $facturaFinal, $numero);

        header("location: " . URLSITE . "?c=facturas");
    }

    static function Imprimir()
    { /*
        $factura_id = $_GET["factura_id"];

        $facturasLineas = new FacturasLineasModelo();
        $facturasLineas->factura_id = $factura_id;
        $facturasLineas->Seleccionar();

        $factura = new FacturasModelo();
        $factura->id = $factura_id;
        $factura->Seleccionar();

        $pdf = new FacturasPDF();

        // Cabecera + Pie de la factura
        $pdf->factura = $factura;

        // lineas de la factura
        $pdf->filas = $facturasLineas->filas;

        $pdf->AddPage();
        $pdf->SetFont("Arial", "", 14);
        $pdf->SetWidths(array(30, 60, 20, 20));
        $pdf->Imprimir();
        $pdf->Output();
        */
    }
}
