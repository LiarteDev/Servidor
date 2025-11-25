<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once("bd.php");
require_once("controller/crypt.php");

class LoginModelo extends BD
{
    public $usuario;
    public $contrasena;

    public function Loguearse()
    {
        $sql = "SELECT * FROM usuarios WHERE usuario = '$this->usuario'";

        $filas = $this->_consultar($sql);

        if ($filas != null) {
            if (Crypt::Encriptar($this->contrasena) === $filas[0]->contrasena) {
                $_SESSION["usuario"] = $filas[0]->usuario;
                $_SESSION["nombre"] = $filas[0]->nombre;
                $_SESSION["logueado"] = true;
                $_SESSION["loggedstart"] = time();

                return true;
            }
            return false;
        }
        return false;
    }
}
