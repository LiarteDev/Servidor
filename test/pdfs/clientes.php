<?php
require_once("fpdf/fpdf.php");

class ClientesPDF extends FPDF
{
    public $filas;

    // Cabecera de página
    function Header()
    {
        // Ponemos el titulo de la pagina
        $this->SetFont("Arial", "B", 16);
        $this->Cell(277, 10, "LISTADO DE CLIENTES", 1, 0, "C");

        // POnemos el título de las celdas
        $this->SetXY(10, 20);
        $this->SetFillColor(0, 0, 0);               // Fondo de las celdas en negro
        $this->SetTextColor(255, 255, 255);         // Letras en blanco
        $this->Cell(46, 10, "Usuario", 1, 0, "C", true);
        $this->Cell(46, 10, "Email", 1, 0, "C", true);
        $this->Cell(46, 10, iconv("UTF-8", "ISO-8859-1", "Teléfono "), 1, 0, "C", true);
        $this->Cell(46, 10, "Provincia", 1, 0, "C", true);
        $this->Cell(46, 10, "RGPD", 1, 0, "C", true);
        $this->Cell(47, 10, "Activo", 1, 0, "C", true);
    }

    function Footer()
    {
        // Posición a 1 cm del final de la pagina
        $this->SetY(-13);

        // Arial italic 8
        $this->SetFont("Arial", "", 10);

        // Fecha y hora
        $fechaYhora = date("d/m/Y - H:i");
        $this->Cell(50, 10, $fechaYhora, 0, 0, "L");

        // Número de página
        $this->Cell(227, 10, iconv("UTF-8", "ISO-8859-1", "Página " . $this->PageNo() . " / {nb}"), 0, 0, "R");
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
                $this->Cell(46, 10, $fila->nombre, 1, 0, "C", true);
                $this->Cell(46, 10, $fila->email, 1, 0, "C", true);
                $this->Cell(46, 10, $fila->telefono, 1, 0, "C", true);
                $this->Cell(46, 10, iconv("UTF-8", "ISO-8859-1", $fila->provincia), 1, 0, "C", true);
                $this->Cell(46, 10, iconv("UTF-8", "ISO-8859-1", ($fila->rgpd ? 'Sí' : 'No')), 1, 0, "C", true);
                $this->Cell(47, 10, iconv("UTF-8", "ISO-8859-1", ($fila->activo ? 'Sí' : 'No')), 1, 0, "C", true);
            }
        }
    }
}
