<?php
session_start();

if (!isset($_SESSION["intentos"])) {
    $_SESSION["intentos"] = 0;
}

$nombreIntroducido = $_POST["nombre"];
$passwordIntroducida = $_POST["pass"];


if ($nombreIntroducido == "Javier" && $passwordIntroducida == "12345") {
    $_SESSION["intentos"] = 0;
    header("location: logeado.php");
    die();
}

$_SESSION["intentos"]++;

if ($_SESSION["intentos"] >= 3) {
    header("location:contacto.php");
    die();
}

header("location:index.php");