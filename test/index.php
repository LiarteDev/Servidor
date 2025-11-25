<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

require_once("config.php");

require_once("controller/app.php");
require_once("controller/login.php");
require_once("controller/salir.php");
require_once("controller/usuarios.php");

// localhost/mvc/index.php
// localhost/mvc/index.php?c=clientes --> Me voy al index de clientes
// localhost/mvc/index.php?c=clientes&m=nuevo --> Me voy al método nuevo de clientes
// localhost/mvc/index.php?c=clientes&m=editar&id=28 --> Me voy al método de editar del cliente (en este caso el cliente con id 28)

if (isset($_GET["c"])) {
    $controlador = $_GET["c"];

    $metodo = "";
    if (isset($_GET["m"])) {
        $metodo = $_GET["m"];
    }

    switch ($controlador) {
        case "login":
            if (method_exists("LoginControlador", $metodo)) {
                LoginControlador::{$metodo}();
            }
            break;
        case "salir":
            if (method_exists("SalirControlador", "salir")) {
                SalirControlador::Salir();
            }
            break;

        case "usuarios":
            if (method_exists("UsuariosControlador", $metodo)) {
                UsuariosControlador::{$metodo}();
            } else {
                UsuariosControlador::index();
            }
            break;

        case "clientes":
            require_once("controller/clientes.php");

            if (method_exists("ClientesControlador", $metodo)) {
                ClientesControlador::{$metodo}();
            } else {
                ClientesControlador::index();
            }
            break;

        case "facturas":
            require_once("controller/facturas.php");

            if (method_exists("FacturasControlador", $metodo)) {
                FacturasControlador::{$metodo}();
            } else {
                FacturasControlador::index();
            }
            break;

        case "facturaslineas":
            require_once("controller/facturaslineas.php");

            if (method_exists("FacturasLineasControlador", $metodo)) {
                FacturasLineasControlador::{$metodo}();
            } else {
                FacturasLineasControlador::index();
            }
            break;
        case "recibos":
            require_once("controller/recibos.php");

            if (method_exists("RecibosControlador", $metodo)) {
                RecibosControlador::{$metodo}();
            } else {
                RecibosControlador::index();
            }
            break;
    }
} else {
    AppControlador::index();
}
