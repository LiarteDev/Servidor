<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

require_once("model/lineas.php");

class LineasControlador
{
    static function index()
    {
        $lineas = new LineasModelo();
        $lineas->Seleccionar();
        require_once("view/lineas.php");
    }

    static function Nuevo()
    {
        $opcion = 'NUEVO';
        require_once("view/lineasmantenimiento.php");
    }

    static function Insertar()
    {
        $linea = new LineasModelo();

        $linea->factura_id  = $_POST['factura_id'];
        $linea->referencia  = $_POST['referencia'];
        $linea->descripcion = $_POST['descripcion'];
        $linea->cantidad    = $_POST['cantidad'];
        $linea->precio      = $_POST['precio'];
        $linea->iva         = $_POST['iva'];

        if ($linea->Insertar() == 1)
            header("location:" . URLSITE . '?c=lineas');
        else {
            $_SESSION["CRUDMVC_ERROR"] = $linea->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    static function Editar()
    {
        $linea = new LineasModelo();
        $linea->id = $_GET['id'];

        $opcion = 'EDITAR';

        if ($linea->Seleccionar())
            require_once("view/lineasmantenimiento.php");
        else {
            $_SESSION["CRUDMVC_ERROR"] = $linea->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    static function Modificar()
    {
        $linea = new LineasModelo();

        $linea->id          = $_GET['id'];
        $linea->factura_id  = $_POST['factura_id'];
        $linea->referencia  = $_POST['referencia'];
        $linea->descripcion = $_POST['descripcion'];
        $linea->cantidad    = $_POST['cantidad'];
        $linea->precio      = $_POST['precio'];
        $linea->iva         = $_POST['iva'];

        if ($linea->Modificar() == 1 || $linea->GetError() == '')
            header("location:" . URLSITE . '?c=lineas');
        else {
            $_SESSION["CRUDMVC_ERROR"] = $linea->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }

    static function Borrar()
    {
        $linea = new LineasModelo();
        $linea->id = $_GET['id'];

        if ($linea->Borrar() == 1)
            header("location:" . URLSITE . '?c=lineas');
        else {
            $_SESSION["CRUDMVC_ERROR"] = $linea->GetError();
            header("location:" . URLSITE . "view/error.php");
        }
    }
}
?>
