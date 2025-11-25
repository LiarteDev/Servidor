<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once("model/recibos.php");
require_once("model/clientes.php");
require_once("model/facturas.php");
require_once("pdfs/recibos.php");
//require_once("../fpdf/fpdf.php");
//require_once("../fpdf/clientes.php");


class RecibosControlador
{
    // http://localhost/mvc/?c=recibos
    // http://localhost/mvc/?c=recibos&m=index
    static function index()
    {
        $recibos = new RecibosModelo();

        $recibos->Seleccionar();

        require_once("view/recibos.php");
    }

    static function Recibos()
    {
        $factura = new FacturasModelo();

        $factura->id = $_GET["factura_id"];
        $factura->Seleccionar();

        $cliente = new ClientesModelo();

        $cliente->id = $factura->cliente_id;
        $cliente->Seleccionar();

        $recibo = new RecibosModelo();

        switch ($cliente->formadepago) {
            case 1:
                $recibo->factura_id = $factura->id;
                $recibo->fecha = $factura->fecha;
                $recibo->importe = $factura->importe;

                if ($cliente->Insertar() == 1) {
                    header("location:" . URLSITE . "?c=recibos&factura_id=" . $factura->id);
                } else {
                    $_SESSION["CRUDMVC_ERROR"] = $cliente->GetError();
                    header("location:" . URLSITE . "view/error.php");
                }
                break;

            case 2:
                $recibo->factura_id = $factura->id;
                $recibo->fecha = date("Y/m/d", strtotime("+30 day", strtotime($factura->fecha)));
                $recibo->importe = $factura->importe;

                if ($cliente->Insertar() == 1) {
                    header("location:" . URLSITE . "?c=recibos&factura_id=" . $factura->id);
                } else {
                    $_SESSION["CRUDMVC_ERROR"] = $cliente->GetError();
                    header("location:" . URLSITE . "view/error.php");
                }
                break;

            case 3:
                $recibo->factura_id = $factura->id;
                $recibo->fecha = date("Y/m/d", strtotime("+60 day", strtotime($factura->fecha)));
                $recibo->importe = $factura->importe / 2.0;

                if ($cliente->Insertar() == 1) {
                    header("location:" . URLSITE . "?c=recibos&factura_id=" . $factura->id);
                } else {
                    $_SESSION["CRUDMVC_ERROR"] = $cliente->GetError();
                    header("location:" . URLSITE . "view/error.php");
                }
                break;
        }
    }

    static function Borrar()
    {
        $recibo = new RecibosModelo();

        $recibo->recibo_id = $_GET["recibo_id"];

        if ($recibo->Borrar() == 1) {
            header("location:" . URLSITE . "?c=recibos");
        } else {
            $_SESSION["CRUDMVC_ERROR"] = $recibo->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    static function Imprimir()
    {
        $recibos = new RecibosModelo();

        $recibos->SeleccionarImprimir();

        // La L es en horizontal (Landscape)
        $pdf = new RecibosPDF("L");

        // Añadimos una página
        $pdf->AddPage();

        // Ponemos fuente arial y 14 pt
        $pdf->SetFont("Arial", "", 14);

        // Se las pasamos al PDF
        $pdf->filas = $recibos->filas;

        // Imprimimos las filas
        $pdf->Imprimir();

        $pdf->Output();
    }
}
