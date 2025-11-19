<?php
require_once("constantes.php");
class PDOConexion {
    protected static $pdo = NULL;

    private function __construct() {}
    private function __clone() {}

    public static function getConexion() {
        if (!self::$pdo) {
            $dsn = 'mysql:host=' . SERVIDOR . ';dbname=' . BASEDATOS . ';charset=utf8';

            try {
                self::$pdo = new PDO($dsn, USUARIO, PASSWORD);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                die('Error (' . $e->getCode() . '): ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }
    public static function cerrarConexion() {
        self::$pdo = NULL;
    }
}
?>