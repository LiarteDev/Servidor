<?php
require_once("fpdf/fpdf.php");

class UsuariosPDF extends FPDF
{
    public $filas;

    // Cabecera de página
    function Header()
    {
        // Ponemos el titulo de la pagina
        $this->SetFont("Arial", "B", 16);
        $this->Cell(277, 10, "LISTADO DE USUARIOS", 1, 0, "C");

        // POnemos el título de las celdas
        $this->SetXY(10, 20);
        $this->SetFillColor(0, 0, 0);               // Fondo de las celdas en negro
        $this->SetTextColor(255, 255, 255);         // Letras en blanco
        $this->Cell(50, 10, "Foto", 1, 0, "C", true);
        $this->Cell(113, 10, "Usuario", 1, 0, "C", true);
        $this->Cell(114, 10, "Nombre", 1, 0, "C", true);
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

                // Primera columna para poner la foto del usuario
                $this->Cell(50, 25, "", 1, 0, "L", true);
                //if($fila->foto_url != "") {
                //    $this->Image($fila->foto_url, 15, $fotoY, 20, 20);
                //}
                $this->Cell(113, 25, $fila->usuario, 1, 0, "L", true);
                $this->Cell(114, 25, $fila->nombre, 1, 0, "L", true);

                // La siguiente foto 26mm más abajo
                $fotoY = $fotoY + 26;

                // Cada 5 filas hacemos un salto de página
                if ($nuevaPagina++ % 5 == 0) {
                    $fotoY = 32;

                    $this->addPage();
                }
            }
        }
    }
}
