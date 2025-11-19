<?php
session_start();
if (isset($_SESSION["intentos"]) && $_SESSION["intentos"] >= 3) {
    header("location:contacto.php");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sesiones</title>
</head>

<body>
    <form action="checkSession.php?accion=1" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" /> <br />
        <label for="pass">Contraseña: </label>
        <input type="password" name="pass" id="pass" /> <br />
        <input type="submit" value="Iniciar Sesión" />
    </form>
</body>

</html>