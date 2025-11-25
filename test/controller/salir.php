<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class SalirControlador
{
    public static function Salir()
    {
        // Borramos todas las variables utilizadas para el logueo
        unset($_SESSION["usuario"]);
        unset($_SESSION["nombre"]);
        unset($_SESSION["logueado"]);
        unset($_SESSION["loggedstart"]);

        // Nos vamos a la pantalla de login
        header("Location: view/login.php");
    }
}
