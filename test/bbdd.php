<?php
require_once('./config.inc.php');

class BaseDatos
{
    protected static $con = NULL;

    private function __construct() {}
    private function __clone() {}
    public static function getConexion()
    {
        if (!self::$con) {
            self::$con = new PDO('mysql:host=' . SERVIDOR . ';dbname=' . BASEDATOS, USUARIO, PASSWORD);
        }
        return self::$con;
    }
}
