<?php
require_once("fpdf/pdf_mc_table.php");

class RecibosPDF extends PDF_MC_Table
{
    public $filas;

    // Cabecera de página
    function Header()
    {
        // Ponemos el titulo de la pagina
        $this->SetFont("Arial", "B", 16);
        $this->Cell(277, 10, "LISTADO DE RECIBOS", 1, 0, "C");

        // POnemos el título de las celdas
        $this->SetXY(10, 20);
        $this->SetFillColor(0, 0, 0);               // Fondo de las celdas en negro
        $this->SetTextColor(255, 255, 255);         // Letras en blanco
        $this->Cell(55.4, 10, "Nombre del cliente", 1, 0, "C", true);
        $this->Cell(55.4, 10, iconv("UTF-8", "ISO-8859-1", "Nº factura"), 1, 0, "C", true);
        $this->Cell(55.4, 10, "Fecha factura", 1, 0, "C", true);
        $this->Cell(55.4, 10, "Fecha recibo", 1, 0, "C", true);
        $this->Cell(55.4, 10, "Importe", 1, 0, "C", true);
    }

    function Footer()
    {
        // Posición a 1 cm del final de la pagina
        $this->SetY(-13);

        // Arial italic 8
        $this->SetFont("Arial", "", 10);

        // Número de página
        $this->Cell(227, 10, iconv("UTF-8", "ISO-8859-1", "Página " . $this->PageNo() . " / {nb}"), 0, 0, "R");
    }

    public function Imprimir()
    {
        // Si tenemos filas a imprimir
        if ($this->filas) {
            foreach ($this->filas as $fila) {
                $this->Row(array(
                    $fila->cliente,
                    $fila->numero_factura,
                    $fila->fecha_factura,
                    $fila->fecha_recibo,
                    $fila->importe
                ));
            }
        }
    }
}
