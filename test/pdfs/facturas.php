<?php
require_once("fpdf/fpdf.php");

class FacturasPDF extends FPDF
{
    public $filas;
    public $factura;

    // Cabecera de página
    function Header()
    {
        // Ponemos el título de la página
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, 'Factura', 1, 0, 'C');

        // Ponemos el título de las celdas
        $this->SetXY(10, 20);
        $this->SetFillColor(0, 0, 0);
        $this->SetTextColor(255, 255, 255);
        $this->Cell(75, 10, iconv("UTF-8", "ISO-8859-1", "Número"), 1, 0, 'C', true);
        $this->Cell(75, 10, 'Cliente', 1, 0, 'C', true);
        $this->Cell(40, 10, 'Fecha', 1, 0, 'C', true);

        $this->Ln();

        // Ponemos los valores
        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(75, 10, $this->factura->numero, 1, 0, 'C', true);
        $this->Cell(75, 10, $this->factura->cliente, 1, 0, 'C', true);
        $this->Cell(40, 10, $this->factura->fecha, 1, 0, 'C', true);

        $this->Ln();

        $this->SetFillColor(0, 0, 0);
        $this->SetTextColor(255, 255, 255);
        $this->Cell(30, 10, 'Cantidad', 1, 0, 'C', true);
        $this->Cell(60, 10, iconv("UTF-8", "ISO-8859-1", "Descripcion"), 1, 0, 'C', true);
        $this->Cell(20, 10, 'Precio', 1, 0, 'C', true);
        $this->Cell(20, 10, 'Importe', 1, 0, 'C', true);
        $this->Ln();
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 3 cm del final de la página
        $this->SetY(-30);

        $this->SetFont('Arial', '', 16);

        $this->SetFillColor(0, 0, 0);
        $this->SetTextColor(255, 255, 255);
        $this->Cell(75, 10, 'BASE', 1, 0, 'C', true);
        $this->Cell(75, 10, 'IVA', 1, 0, 'C', true);
        $this->Cell(40, 10, 'TOTAL', 1, 0, 'C', true);

        $this->Ln();

        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(75, 10, $this->factura->base, 1, 0, 'C', true);
        $this->Cell(75, 10, $this->factura->importe_iva, 1, 0, 'C', true);
        $this->Cell(40, 10, $this->factura->importe, 1, 0, 'C', true);
    }

    public function Imprimir()
    {
        // Si tenemos filas a imprimir
        if ($this->filas) {
            $nuevaPagina = 1;           // Control de salto de página
            $color = 1;                 // Para poner las filas en color alternativo
            $fotoY = 32;                // Posición de la foto

            foreach ($this->filas as $fila) {
                // Salto de línea
                $this->Ln();

                // Filas pares en gris e impares en blanco
                if ($color++ % 2 == 0) {
                    $this->SetFillColor(200, 200, 200);
                } else {
                    $this->SetFillColor(255, 255, 255);
                }

                //if($fila->foto_url != "") {
                //    $this->Image($fila->foto_url, 15, $fotoY, 20, 20);
                //}
                $this->Cell(46, 10, $fila->cantidad, 1, 0, "C", true);
                $this->Cell(46, 10, iconv("UTF-8", "ISO-8859-1", $fila->descripcion), 1, 0, "C", true);
                $this->Cell(46, 10, $fila->precio, 1, 0, "C", true);
                $this->Cell(46, 10, $fila->importe, 1, 0, "C", true);
            }
        }
    }
}
