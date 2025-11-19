<?php
// conexion.php

require_once "constantes.php";

class Conexion {
    private static $usuario = USUARIO;
    private static $contrasenya = PASSWORD;
    private static $baseDatos = BASEDATOS;
    private static $servidor = SERVIDOR;

    protected static $con = NULL;

    private function __construct() {}
    private function __clone() {}

    public static function getConexion() {
        if (!self::$con) {
            self::$con = @new mysqli(
                self::$servidor,
                self::$usuario,
                self::$contrasenya,
                self::$baseDatos
            );
            if (self::$con->connect_error) {
                die('Error (' . self::$con->connect_errno . '): ' .  self::$con->connect_error);
            }
            self::$con->set_charset("utf8");
        }
        return self::$con;
    }

    public static function cerrarConexion() {
        if (self::$con) {
            self::$con->close();
            self::$con = NULL;
        }
    }
}
