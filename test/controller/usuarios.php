<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once("model/usuarios.php");
require_once("pdfs/usuarios.php");
//require_once("../fpdf/fpdf.php");
//require_once("../fpdf/usuarios.php");


class UsuariosControlador
{
    // http://localhost/mvc/?c=usuarios
    // http://localhost/mvc/?c=usuarios&m=index
    static function index()
    {
        $usuarios = new UsuariosModelo();

        $usuarios->Seleccionar();

        require_once("view/usuarios.php");
    }
    // http://localhost/mvc/?c=usuarios&m=insertar
    static function nuevo()
    {
        $opcion = "NUEVO"; // Opcion de insertar un cliente

        require_once("view/usuariosmantenimiento.php");
    }

    static function Insertar()
    {
        $usuario = new UsuariosModelo();

        $usuario->usuario = $_POST["usuario"];
        $usuario->contrasena = CRYPT::Encriptar($_POST["contrasena"]);
        $usuario->nombre = $_POST["nombre"];

        if ($usuario->Insertar() == 1) {
            // Obtenemos el id del usuario insertado
            $usuario->id = $usuario->UltimoId();

            header("location:" . URLSITE . "?c=usuarios");
        } else {
            $_SESSION["CRUDMVC_ERROR"] = $usuario->GetError();

            header("location:" . URLSITE . "view/error.php");
        }
    }

    // http://localhost/mvc/?c=usuarios&m=editar&id=25
    static function Editar()
    {
        $usuario = new UsuariosModelo();

        $usuario->id = $_GET["id"];

        $opcion = "EDITAR"; // Opcion de modificar un cliente

        // Al pasarle el id solo traeremos ese cliente
        if ($usuario->Seleccionar()) {
            require_once("view/usuariosMantenimiento.php");
        } else {
            $_SESSION["CRUDMVC_ERROR"] = $usuario->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    // http://localhost/mvc/?c=usuarios&m=modificar&id=25
    static function Modificar()
    {
        $usuario = new UsuariosModelo();

        $usuario->id = $_GET["id"];
        $usuario->usuario = $_POST["usuario"];
        $usuario->contrasena = CRYPT::Encriptar($_POST["contrasena"]);
        $usuario->nombre = $_POST["nombre"];

        /*
            Aquí hay que tener cuidado, en el caso de que se pulse el botón de aceptar pero no se haya 
            modificado nada, la función modificar devolverá un cero, por eso hay que comprobar que no hay error 
        */
        if ($usuario->Modificar() == 1 || $usuario->GetError() == "") {
            header("location:" . URLSITE . "?c=usuarios");
        } else {
            $_SESSION["CRUDMVC_ERROR"] = $usuario->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    // http://localhost/mvc/?c=usuarios&m=borrar&id=25
    static function Borrar()
    {
        $usuario = new UsuariosModelo();

        $usuario->id = $_GET["id"];

        if ($usuario->Borrar() == 1) {
            header("location:" . URLSITE . "?c=usuarios");
        } else {
            $_SESSION["CRUDMVC_ERROR"] = $usuario->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    // http://localhost/mvc/?c=usuarios&m=exportar
    static function Exportar()
    {
        // Nos creamos el objeto usuarios para acceder a la tabla usuarios de la BBDD
        $usuarios = new UsuariosModelo;

        // Seleccionamos todos los usuarios
        $usuarios->Seleccionar();

        try {
            // Abrimos el fichero usuarios.csv en modo escritura
            $fichero = fopen("usuarios.csv", "w");

            if ($usuarios->filas) {
                // Para cade fila de la tabla...
                foreach ($usuarios->filas as $fila) {
                    // Crreamos la línea a exportar y...
                    $cadena = "$fila->id#$fila->usuario#$fila->contrasena#$fila->nombre\n";

                    // La guardamos en el fichero
                    fputs($fichero, $cadena);
                }
            } else {
                fputs($fichero, "No hay usuarios");
            }
        } finally {
            // Cerramos el fichero
            fclose($fichero);
        }

        // Finalmente exportamos el fichero
        $rutaFichero = "usuarios.csv";
        $fichero = basename($rutaFichero);

        header("Content-Type: application/octet-stream");
        header("Content-Length: " . filesize($rutaFichero));
        header("Content-Disposition: attachment; filename=$fichero");

        readfile($rutaFichero);
    }

    static function Imprimir2()
    {
        $pdf = new UsuariosPDF("L");        // La L es en horizontal (Landscape)

        // Para calcular el número total de páginas
        $pdf->AliasNbPages();

        // Añadimos una página
        $pdf->AddPage();

        // Ponemos fuente times y 12 pt
        $pdf->SetFont("Times", "", 12);

        // Nos creamos el usuario modelo, ...
        $usuarios = new UsuariosModelo();

        // Obtenemos todas las filas y ...
        $usuarios->Seleccionar();

        // Se las pasamos al PDF
        $pdf->filas = $usuarios->filas;

        $pdf->Imprimir();       // Imprimimos las filas

        $pdf->Output();
    }
}
