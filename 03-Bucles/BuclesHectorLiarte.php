<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bucles</title>
</head>

<body>
    <h2>Ejercicio 36</h2>
    <?php
    // Crea un programa que escriba en pantalla los números del 1 al 10, usando "while"
    $num = 1;
    while ($num <= 10) {
        echo "$num ";
        $num++;
    }
    ?>

    <h2>Ejercicio 37</h2>
    <?php
    // Crea  un  programa  que  escriba  en  pantalla  los  números  pares  del  26  al  10  (descendiendo), usando "while".
    $num = 26;
    while ($num > 1) {
        if ($num % 2 == 0)
            echo "$num ";
        $num--;
    }
    ?>

    <h2>Ejercicio 38</h2>
    <?php
    // Crea un programa calcule cuantas cifras tiene un número entero positivo usando "while" (Se puede hacer dividiendo varias veces entre 10).
    $num = 123456789;
    $aux = $num;
    $contadorCifras = 0;

    if ($aux === 0) {
        $contadorCifras = 1;
    } else {
        while ($aux > 0) {
            $aux = intdiv($aux, 10); //Intdiv divide un numero por otro y se castea en int
            $contadorCifras++;
        }
    }

    echo "El número $num tiene $contadorCifras cifras";
    ?>

    <h2>Ejercicio 39</h2>
    <?php
    // Crea un programa que escriba en pantalla los números del 1 al 10, usando "do..while".
    $num = 1;
    do {
        echo "$num ";
        $num++;
    } while ($num <= 10);
    ?>

    <h2>Ejercicio 40</h2>
    <?php
    // Crea un programa que escriba en pantalla los números pares del 26 al 10 (descendiendo), usando "do..while".
    $num = 26;
    do {
        if ($num % 2 == 0) {
            echo "$num ";
        }
        $num--;
    } while ($num >= 1);
    ?>

    <h2>Ejercicio 41</h2>
    <?php
    // Crea un programa que muestre los números del 10 al 20, ambos incluidos, usando "for".
    for ($i = 10; $i <= 20; $i++) {
        echo "$i ";
    }
    ?>

    <h2>Ejercicio 42</h2>
    <?php
    // Crea un programa que escriba en pantalla los números del 1 al 50 que sean múltiplos de 3
    // (habrá que recorrer todos esos números y ver si el resto de la división entre 3 resulta 0), usando "for".
    for ($i = 1; $i < 50; $i++) {
        if ($i % 3 == 0) {
            echo "$i ";
        }
    }
    ?>

    <h2>Ejercicio 43</h2>
    <?php
    // Crea un programa que muestre los números del 100 al 200 (ambos incluidos) que sean divisibles entre 7 y a la vez entre 3, usando "for".
    for ($i = 100; $i <= 200; $i++) {
        if ($i % 3 == 0 && $i % 7 == 0) {
            echo "$i ";
        }
    }
    ?>

    <h2>Ejercicio 44</h2>
    <?php
    // Crea un programa que escriba en pantalla los números del 1 al 50 que sean múltiplos de 3 (habrá que recorrer todos esos números y ver si el resto de la división entre 3 resulta 0), usando "for".
    for ($i = 1; $i <= 50; $i++) {
        if ($i % 3 == 0) {
            echo "$i ";
        }
    }
    ?>

    <h2>Ejercicio 45</h2>
    <?php
    // Crea un programa que muestre los primeros ocho números pares: 2 4 6 8 10 12 14 16 (en cada pasada habrá que aumentar de 2 en 2,
    // o bien mostrar el doble del valor que hace de contador), usando "for".
    for ($i = 0; $i <= 16; $i += 2) {
        echo "$i ";
    }
    ?>

    <h2>Ejercicio 46</h2>
    <?php
    // Crea un programa que muestre los números del 15 al 5, descendiendo (en cada pasada habrá que descontar 1, por ejemplo, haciendo i=i-1, que se puede abreviar i--), usando "for".
    for ($i = 15; $i >= 5; $i--) {
        echo "$i ";
    }
    ?>

    <h2>Ejercicio 47</h2>
    <?php
    // Crea un programa escriba 4 veces los números del 1 al 5, en una misma línea, usando "for": 12345123451234512345.
    for ($i = 1; $i <= 4; $i++) {
        for ($j = 1; $j <= 5; $j++) {
            echo $j;
        }
    }
    ?>

    <h2>Ejercicio 48</h2>
    <?php
    // Crea un programa escriba 4 veces los números del 1 al 5, en una misma línea, usando "while": 12345123451234512345.
    $i = 1;
    while ($i <= 4) {
        $j = 1;
        while ($j <= 5) {
            echo $j;
            $j++;
        }
        $i++;
    }
    ?>

    <h2>Ejercicio 49</h2>
    <?php
    // Crea un programa que, para los números entre el 10 y el 20 (ambos incluidos) diga si son divisibles entre 5, si son divisibles entre 6 y si son divisibles entre 7.
    for ($i = 10; $i <= 20; $i++) {
        if ($i % 5 == 0) {
            echo "$i es divisible por 5 <br>";
        } elseif ($i % 6 == 0) {
            echo "$i es divisible por 6 <br>";
        } elseif ($i % 7 == 0) {
            echo "$i es divisible por 7 <br>";
        }
    }
    ?>

    <h2>Ejercicio 50</h2>
    <?php
    // Crea un programa que escriba 4 líneas de texto, cada una de las cuales estará formada por los números del 1 al 5.
    for ($i = 1; $i <= 4; $i++) {
        for ($j = 1; $j <= 5; $j++) {
            echo $j . " ";
        }
        echo "<br>";
    }
    ?>

    <h2>Ejercicio 51</h2>
    <form action="BuclesHectorLiarte.php" method="POST">
        Número 1: <input type="number" name="num1" required><br><br>
        Número 2: <input type="number" name="num2" required><br><br>
        <button type="submit">Calcular MCD</button>
    </form>
    <?php
    // Crea un programa que pida al usuario dos números y escriba su máximo común divisor
    // (pista: una solución lenta pero sencilla es probar con un "for" todos los números descendiendo a partir del menor de ambos, hasta llegar a 1;
    // cuando encuentres un número que sea divisor de ambos, interrumpes la búsqueda).
    if (isset($_POST['num1']) && isset($_POST['num2'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];

        $menor = min($num1, $num2);
        $mcm = 1; // valor por defecto
    
        for ($i = $menor; $i >= 1; $i--) {
            if ($num1 % $i == 0 && $num2 % $i == 0) {
                $mcm = $i;
                break; // en cuanto encontremos el mayor divisor común, paramos
            }
        }
        echo "<br>";
        echo "El MCD de $num1 y $num2 es: $mcm";
    }
    ?>

    <h2>Ejercicio 52</h2>
    <form action="BuclesHectorLiarte.php" method="POST">
        Número 1: <input type="number" name="num3" required><br><br>
        Número 2: <input type="number" name="num4" required><br><br>
        <button type="submit">Calcular MCM</button>
    </form>
    <?php
    // Crea un programa que pida al usuario dos números y escriba su mínimo común múltiplo
    // (pista: una solución lenta pero sencilla es probar con un "for" todos los números a partir del mayor de ambos, de forma creciente;
    // cuando encuentres un número que sea múltiplo de ambos, interrumpes la búsqueda).
    if (isset($_POST['num3']) && isset($_POST['num4'])) {
        $num1 = $_POST['num3'];
        $num2 = $_POST['num4'];

        $mayor = max($num1, $num2);
        $mcm = $mayor;

        for ($i = $mayor; ; $i++) {
            if ($i % $num1 == 0 && $i % $num2 == 0) {
                $mcm = $i;
                break;
            }
        }
        echo "<br>";
        echo "El MCM de $num1 y $num2 es: $mcm";
    }
    ?>

    <h2>Ejercicio 53</h2>
    <?php
    // Crea un programa que escriba los números del 20 al 10, descendiendo, excepto el 13, usando "continue".
    for ($i = 20; $i > 10; $i--) {
        if ($i === 13) {
            continue;
        }
        echo "$i ";
    }
    ?>

    <h2>Ejercicio 54</h2>
    <?php
    // Crea un programa que escriba los números pares del 2 al 106, excepto los que sean múltiplos de 10, usando "continue"
    for ($i = 2; $i <= 106; $i++) {
        if ($i % 10 === 0) {
            continue;
        }
        if ($i % 2 == 0) {
        }
        echo "$i ";
    }
    ?>

    <h2>Ejercicio 55</h2>
    <?php
    // Crea un programa que escriba los números pares del 20 al 10, descendiendo, excepto el 14, primero con "for" y luego con "while".
    echo "Hecho con for: <br>";
    for ($i = 20; $i >= 10; $i--) {
        if ($i === 14) {
            continue;
        }
        echo "$i ";
    }
    echo "<br> Hecho con while: <br>";
    $i = 20;
    while ($i >= 10) {
        if ($i === 14) {
            $i--;
            continue;
        }
        echo "$i ";
        $i--;
    }
    ?>

    <h2>Ejercicio 56</h2>
    <?php
    // Crea un programa que calcule un número elevado a otro, usando multiplicaciones sucesivas.
    $base = 2;
    $exponente = 4;
    $resultado = 1; // Se inicializa a 1
    for ($i = 0; $i < $exponente; $i++) {
        $resultado *= $base;
    }
    echo "$base ^ $exponente = $resultado";
    ?>

    <h2>Ejercicio 57</h2>
    <?php
    // Crea un programa que "dibuje" un rectángulo formado por asteriscos, con el ancho y el alto que indique el usuario,usando dos "for" anidados.
    // Por ejemplo, si desea anchura 4 y altura 3, el rectángulo sería así:
    $ancho = 4;
    $largo = 3;

    for ($i = 0; $i < $largo; $i++) {

        for ($j = 0; $j < $ancho; $j++) {
            echo "*";
        }
        echo "<br>";
    }
    ?>

    <h2>Ejercicio 58</h2>
    <?php
    // Crea un programa que "dibuje" un triángulo decreciente, con la altura que indique el usuario.
    // Por ejemplo, si el usuario dice que desea 4 caracteres de alto, el triángulo sería así:
    $alto = 4;

    for ($i = $alto; $i > 0; $i--) {
        for ($j = 0; $j < $i; $j++) {
            echo "*";
        }
        echo "<br>";
    }
    ?>

    <h2>Ejercicio 59</h2>
    <?php
    // Crea un programa que "dibuje" un rectángulo hueco, cuyo borde sea una fila (o columna) de asteriscos y cuyo interior esté formado por espacios en blanco,
    // con el ancho y el alto que indique el usuario. Por ejemplo, si desea anchura 4 y altura 3, el rectángulo sería así:
    $ancho = 4;  // Prueba: cambia por lo que quieras
    $alto = 3;
    echo "<pre>"; // Uso la etiqueta de pre para que me queden bien los espacios
    for ($fila = 1; $fila <= $alto; $fila++) {

        if ($fila == 1 || $fila == $alto) {
            for ($i = 1; $i <= $ancho; $i++) {
                echo "*";
            }
        } else {
            echo "*";

            for ($i = 1; $i <= $ancho - 2; $i++) {
                echo " ";
            }

            if ($ancho > 1) {
                echo "*";
            }
        }

        echo "<br>";
    }
    echo "</pre>";
    ?>

    <h2>Ejercicio 60</h2>
    <?php
    // Crea un programa que "dibuje" un triángulo creciente, alineado a la derecha, con la altura que indique el usuario.
    // Por ejemplo, si el usuario dice que desea 4 caracteres de alto, el triángulo sería así:
    
    $altura = 4;

    echo "<pre>";

    for ($fila = 1; $fila <= $altura; $fila++) {


        for ($esp = 1; $esp <= $altura - $fila; $esp++) {
            echo " ";
        }

        for ($ast = 1; $ast <= $fila; $ast++) {
            echo "*";
        }

        echo "\n";
    }

    echo "</pre>";
    ?>


    <h2>Ejercicio 61</h2>
    <form action="BuclesHectorLiarte.php" method="POST">
        <label>Precio del producto:</label>
        <input type="number" name="precio" required><br><br>

        <label>Cantidad entregada:</label>
        <input type="number" name="pagado" required><br><br>

        <button type="submit">Calcular cambio</button>
    </form>
    <?php
    // Crea un programa que devuelva el cambio de una compra, utilizando monedas (o billetes) del mayor valor posible.
    // Supondremos que tenemos una cantidad ilimitada de monedas (o billetes) de 100, 50, 20, 10, 5, 2 y 1, y que no hay decimales.
    // La ejecución podría ser algo como:

    // He cambiado un poco la forma en la que se ve la cantidad de billetes de cada valor en vez de que se repitan, pongo las unidades de cada tipo de billete
    
    if (isset($_POST['precio']) && isset($_POST['pagado'])) {
        $precio = $_POST['precio'];
        $pagado = $_POST['pagado'];

        $cambio = $pagado - $precio;

        echo "Cambio total: $cambio €\n\n ||";

        $monedas = [100, 50, 20, 10, 5, 2, 1];

        foreach ($monedas as $m) {
            if ($cambio >= $m) {
                $cantidad = intdiv($cambio, $m);
                echo "$m €: $cantidad ud\n";
                $cambio %= $m;
            }
        }
    }
    ?>

</body>

</html>