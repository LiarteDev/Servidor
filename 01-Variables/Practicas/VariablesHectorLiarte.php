<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables</title>
</head>

<body>
    <h2>Ejercicio 2</h2>
    <?php
    // Haz  un  programa  que  visualice  tu  nombre  y  apellidos,  ambos  deben  estar  contenidos  en  variables.
    $nombre = 'Hector';
    $apellidos = 'Liarte Herrera';
    echo $nombre . ' ' . $apellidos;
    ?>

    <h2>Ejercicio 3</h2>
    <!-- TODO -->

    <h2>Ejercicio 4</h2>
    <?php
    // Pon nombre de variables coherentes a los siguientes conceptos.
    $pisoEnVenta;
    $m2;
    $valorDeMercado;
    $nombreYApellidos;
    $examenDeEnero;
    $vacacionesDeVerano;
    $mesDeCumpleaños;
    $alarma;
    $ubicacionArchivo;
    $direccionWeb;
    $nombreBBDD;
    $usuarioBBDD;
    $contrasenyaBBDD;
    ?>
    
    <h2>Ejercicio 5</h2>
    <?php
    /*
    Indica  si  el  resultado  de  las  siguientes  expresiones  es  verdadero  o  falso,  siendo  $a  =  6,  
    $b = -5.8 y $c = 6.0. 
     */

    $a = 6;
    $b = -5.8;
    $c = 6.0;

    echo "Operación 1 (\$a < \$b): " . (int) ($a < $b) . " → " . (($a < $b) ? "true" : "false") . "<br>";
    echo "Operación 2 (\$a >= \$c): " . (int) ($a >= $c) . " → " . (($a >= $c) ? "true" : "false") . "<br>";
    echo "Operación 3 (\$b != \$c): " . (int) ($b != $c) . " → " . (($b != $c) ? "true" : "false") . "<br>";
    echo "Operación 4 (\$a === \$c): " . (int) ($a === $c) . " → " . (($a === $c) ? "true" : "false") . "<br>";
    echo "Operación 5 (\$a !== \$c): " . (int) ($a !== $c) . " → " . (($a !== $c) ? "true" : "false") . "<br>";
    echo "Operación 6 (\$a / \$b == 25): " . (int) ($a / $b == 25) . " → " . (($a / $b == 25) ? "true" : "false") . "<br>";
    echo "Operación 7 (\$a * \$b == -34.8): " . (int) ($a * $b == -34.8) . " → " . (($a * $b == -34.8) ? "true" : "false") . "<br>";
    echo "Operación 8 ((\$a + \$b) > (\$b + \$c)): " . (int) (($a + $b) > ($b + $c)) . " → " . ((($a + $b) > ($b + $c)) ? "true" : "false") . "<br>";
    ?>
  
    <h2>Ejercicio 6</h2>
    <?php
    // Crea un programa que calcule la suma de los números pedidos al usuario, usando variables llamadas "numero1" y "numero2"
    $numero1 = 5;
    $numero2 = 8;

    echo $numero1 . " + " . $numero2 . " = " . $numero1 + $numero2;
    ?>
  
    <h2>Ejercicio 7</h2>
    <?php
    // Crea un programa que calcule el producto de los números pedidos al usuario, usando variables llamadas "numero1" y "numero2".
    $numero1 = 5;
    $numero2 = 8;

    echo $numero1 . " * " . $numero2 . " = " . $numero1 * $numero2;
    ?>

    <h2>Ejercicio 8</h2>
    <?php
    // Utilizando funciones de PHP localiza la posición de la primera y la última 'a' de la siguiente frase: "Alacant, la millor terreta del Mont".
    $frase = "Alacant, la millor terreta del Mont";
    echo "La posición de la primera a es: " . strpos($frase, 'a') . "<br>"; // devuelve 2 porque distingue entre mayus y minus
    echo "La posición de la ultima a es: " . strrpos($frase, 'a');
    ?>

    <h2>Ejercicio 9</h2>
    <?php
    // Crea  un  vector  asociativo  que  almacene  los  siguientes  datos  de  tres  compañeros  de  clase: Nombre, apellidos, teléfono y edad. 
    $companyeros = Array(
        array('nombre' => "Hector", 'apellidos' => "Liarte Herrera", 'telefono' => "123456789", 'edad' => "23"),
        array('nombre' => "Jorge", 'apellidos' => "Reolid Sanus", 'telefono' => "987654321", 'edad' => "22"),
        array('nombre' => "Roberto", 'apellidos' => "Moreno Garcia", 'telefono' => "123498765", 'edad' => "33")
    );
    echo '<pre>';
    print_r($companyeros);
    echo '</pre>';
    ?>

    <h2>Ejercicio 10</h2>
    <?php
    //  Crea un programa en PHP que muestre tu fecha de nacimiento en varios formatos.
    $dob = strtotime('2001-10-31');
    echo 'Fecha de Nacimiento: ' . date("d/m/y", $dob) . '<br>';
    echo 'Fecha de Nacimiento: ' . date("m/d/y", $dob) . '<br>';
    echo 'Fecha de Nacimiento: ' . date("y/m/d", $dob);
    ?>
</body>
</html>