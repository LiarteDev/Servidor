<?php require_once("../config.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo URLSITE; ?>view/css/app.css">

    <title>Q3 MVC</title>
</head>

<body>
    <div class="panel">
        <form action="<?php echo URLSITE; ?>?c=login&m=loguearse" method="POST">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" name="usuario" id="usuario" class="form-control" value="" required>
            <br>
            <label for="contrasena" class="form-label">Contraseña</label>
            <input type="password" name="contrasena" id="contrasena" class="form-control" value="" required>
            <br>

            <button type="submit" class="btn btn-primary">Aceptar</button>
            <a href="<?php echo URLSITE; ?>?c=recuperar" style="float:right">Recuperar contraseña</a>
        </form>
    </div>
</body>