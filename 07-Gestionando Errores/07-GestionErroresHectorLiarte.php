<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Errores y Gestion de Errores</title>
</head>

<body>
    <h2>Ejercicio 81</h2>
    <?php
    // Crea una que calcule el cuadrado de un área.
    // Si el parámetro que se le pasa es negativo,
    // deberá lanzar  una  excepción  con  el  mensaje: 
    // "Debe  introducir  un  número  positivo".  Prueba  el programa con el siguiente vector (2, -5, 8)
    
    $calcularArea = function ($lado) {
        if ($lado < 0) {
            throw new Exception("Debe introducir un número positivo");
        }
        return $lado * $lado;
    };

    $vector = [2, -5, 8];
    foreach ($vector as $i) {
        try {
            $area = $calcularArea($i);
            echo "El area es: $area <br>";
        } catch (Exception $e) {
            echo $e->getMessage() . "<br>";
        }
    }
    ?>
    <h2>Ejercicio 82</h2>
    <?php
    // Crea un programa que capture la excepción lanzada en el ejercicio anterior.
    // Se mostrará el fichero, línea y mensaje de la siguiente forma: "Error en la línea X en el archivo Y: Mensaje." 
    
    $calcularArea = function ($lado) {
        if ($lado < 0) {
            throw new Exception("Debe introducir un número positivo");
        }
        return $lado * $lado;
    };

    $vector = [2, -5, 8];
    foreach ($vector as $i) {
        try {
            $area = $calcularArea($i);
            echo "El area es: $area <br>";
        } catch (Exception $e) {
            $archivo = $e->getFile();
            $linea = $e->getLine();
            $mensaje = $e->getMessage();
            echo"Error en la línea $linea en el archivo $archivo: $mensaje<br>";
        }
    }
    ?>
</body>

</html>