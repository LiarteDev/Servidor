<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once("model/clientes.php");
require_once("model/provincias.php");
require_once("pdfs/clientes.php");
//require_once("../fpdf/fpdf.php");
//require_once("../fpdf/clientes.php");


class ClientesControlador
{
    // http://localhost/mvc/?c=clientes
    // http://localhost/mvc/?c=clientes&m=index
    static function index()
    {
        $clientes = new ClientesModelo();

        $clientes->Seleccionar();

        require_once("view/clientes.php");
    }
    // http://localhost/mvc/?c=clientes&m=insertar
    static function nuevo()
    {
        $opcion = "NUEVO"; // Opcion de insertar un cliente
        $provincias = new ProvinciasModelo();

        $provincias->Seleccionar();


        require_once("view/clientesmantenimiento.php");
    }

    static function Insertar()
    {
        $cliente = new ClientesModelo();

        $cliente->nombre = $_POST["nombre"];
        $cliente->email = $_POST["email"];
        $cliente->telefono = $_POST["telefono"];
        $cliente->provincia_id = $_POST["provincia_id"];
        $cliente->rgpd = (isset($_POST["rgpd"]) ? 1 : 0);
        $cliente->activo = (isset($_POST["activo"]) ? 1 : 0);
        $cliente->formadepago = $_POST["formadepago"];

        if ($cliente->Insertar() == 1) {
            // Obtenemos el id del cliente insertado
            $cliente->id = $cliente->UltimoId();

            header("location:" . URLSITE . "?c=clientes");
        } else {
            $_SESSION["CRUDMVC_ERROR"] = $cliente->GetError();

            header("location:" . URLSITE . "view/error.php");
        }
    }

    // http://localhost/mvc/?c=clientes&m=editar&id=25
    static function Editar()
    {
        $cliente = new ClientesModelo();

        $cliente->id = $_GET["id"];

        $opcion = "EDITAR"; // Opcion de modificar un cliente

        $provincias = new ProvinciasModelo();
        $provincias->Seleccionar();

        // Al pasarle el id solo traeremos ese cliente
        if ($cliente->Seleccionar()) {
            require_once("view/clientesMantenimiento.php");
        } else {
            $_SESSION["CRUDMVC_ERROR"] = $cliente->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    // http://localhost/mvc/?c=clientes&m=modificar&id=25
    static function Modificar()
    {
        $cliente = new ClientesModelo();

        $cliente->id = $_GET["id"];
        $cliente->nombre = $_POST["nombre"];
        $cliente->email = $_POST["email"];
        $cliente->telefono = $_POST["telefono"];
        $cliente->provincia_id = $_POST["provincia_id"];
        $cliente->rgpd = (isset($_POST["rgpd"]) ? 1 : 0);
        $cliente->activo = (isset($_POST["activo"]) ? 1 : 0);
        $cliente->formadepago = $_POST["formadepago"];


        /*
            Aquí hay que tener cuidado, en el caso de que se pulse el botón de aceptar pero no se haya 
            modificado nada, la función modificar devolverá un cero, por eso hay que comprobar que no hay error 
        */
        if ($cliente->Modificar() == 1 || $cliente->GetError() == "") {
            header("location:" . URLSITE . "?c=clientes");
        } else {
            $_SESSION["CRUDMVC_ERROR"] = $cliente->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    // http://localhost/mvc/?c=cliente&m=borrar&id=25
    static function Borrar()
    {
        $cliente = new ClientesModelo();

        $cliente->id = $_GET["id"];

        if ($cliente->Borrar() == 1) {
            header("location:" . URLSITE . "?c=clientes");
        } else {
            $_SESSION["CRUDMVC_ERROR"] = $cliente->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    // http://localhost/mvc/?c=clientes&m=exportar
    static function Exportar()
    {
        // Nos creamos el objeto clientes para acceder a la tabla usuarios de la BBDD
        $clientes = new ClientesModelo();

        // Seleccionamos todos los clientes
        $clientes->Seleccionar();

        try {
            // Abrimos el fichero clientes.csv en modo escritura
            $fichero = fopen("clientes.csv", "w");

            if ($clientes->filas) {
                // Para cade fila de la tabla...
                foreach ($clientes->filas as $fila) {
                    // Crreamos la línea a exportar y...
                    $cadena = "$fila->id#$fila->nombre#$fila->email#$fila->telefono#$fila->provincia_id#$fila->rgpd#$fila->activo#$fila->formadepago\n";

                    // La guardamos en el fichero
                    fputs($fichero, $cadena);
                }
            } else {
                fputs($fichero, "No hay clientes");
            }
        } finally {
            // Cerramos el fichero
            fclose($fichero);
        }

        // Finalmente exportamos el fichero
        $rutaFichero = "clientes.csv";
        $fichero = basename($rutaFichero);

        header("Content-Type: application/octet-stream");
        header("Content-Length: " . filesize($rutaFichero));
        header("Content-Disposition: attachment; filename=$fichero");

        readfile($rutaFichero);
    }

    static function Imprimir2()
    {
        $pdf = new ClientesPDF("L");        // La L es en horizontal (Landscape)

        // Para calcular el número total de páginas
        $pdf->AliasNbPages();

        // Añadimos una página
        $pdf->AddPage();

        // Ponemos fuente times y 12 pt
        $pdf->SetFont("Times", "", 12);

        // Nos creamos el usuario modelo, ...
        $clientes = new ClientesModelo();

        // Obtenemos todas las filas y ...
        $clientes->Seleccionar();

        // Se las pasamos al PDF
        $pdf->filas = $clientes->filas;

        $pdf->Imprimir();       // Imprimimos las filas

        $pdf->Output();
    }
}
