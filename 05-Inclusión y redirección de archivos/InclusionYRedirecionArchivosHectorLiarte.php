<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inclusión y redirección de archivos</title>
</head>
<body>
    <h2>Ejercicio 80</h2>
    <?php 
    //Ejercicio 80
    include_once('funciones.php');

    echo dado();

    echo "<br>";

    EscribirTablaMultiplicar(7);

    echo "<br>";

    $incial = Inicial("PHP");
    echo $incial;
    ?>

</body>
</html>