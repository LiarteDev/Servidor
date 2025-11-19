<?php

if (!isset($_COOKIE["IGFormacion"])) {
    echo "Error: no existe la cookie *IGFormacion*<br>";
}

$caracteristicas = array(
    'expires' => time() + 60 * 5,
    'path' => '/',
    'secure' => false
);

setcookie("MiCookie", "jorgereolid@gmail.com", $caracteristicas);

if (isset($_COOKIE["MiCookie"])) {
    echo "DATOS DE LA COOKIE <br>";
    print_r($_COOKIE["MiCookie"]);
}