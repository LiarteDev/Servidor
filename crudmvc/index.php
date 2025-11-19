<?php
if(session_status() === PHP_SESSION_NONE) session_start();

require_once("config.php");
require_once("controller/clientes.php");

if(isset($_GET["m"])){
    $metodo = $_GET["m"];

    if(method_exists(ClientesControlador::class, $metodo)){
        ClientesControlador::{$metodo}();
    }
    else {
        ClientesControlador::index();
    }
} else{
    ClientesControlador::index();
}
?>