<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decisiones</title>
</head>

<body>
    <h1>Ejercicios Decisiones</h1>
    <h2>Ejercicio 11</h2>
    <?php
    //  Un programa que pida al usuario una frase, después una letra y finalmente diga si aparece esa letra como parte de esa frase o no. Utilizar una función del API de PHP
    $frase = "Esto es una frase";
    $letra = 'e';

    echo (strpos($frase, $letra)) ? 'La frase contiene la letra: ' . $letra : 'La frase NO contiene la letra: ' . $letra;
    ?>


    <h2>Ejercicio 12</h2>
    <?php
    //  Crea un programa que pida al usuario un número entero y diga si es par.
    $numero = 8;
    echo ($numero % 2 == 0) ? 'El numero: ' . $numero . ' es par.' : 'El numero: ' . $numero . ' no es par.'
        ?>


    <h2>Ejercicio 13</h2>
    <?php
    //   Crea un programa que pida al usuario dos números enteros y diga cuál es el mayor de ellos.
    $numero1 = 10;
    $numero2 = 9;

    if ($numero1 > $numero2) {
        echo $numero1 . ' es mayor que: ' . $numero2;
    } else if ($numero1 < $numero2) {
        echo $numero2 . ' es mayor que: ' . $numero1;
    } else {
        echo 'Son iguales';
    }
    ?>


    <h2>Ejercicio 14</h2>
    <?php
    // Crea un programa que pida al usuario dos números enteros y diga si el primero es múltiplo del segundo. 
    $numero1 = 10;
    $numero2 = 9;
    echo ($numero1 % $numero2 == 0) ? 'Son multiplos' : 'No son multiplos';
    ?>


    <h2>Ejercicio 15</h2>
    <?php
    // Crea un programa que pida al usuario dos números entero. Si el primer número es múltiplo 
    // de 10, informará al usuario e indicará si el segundo número también es múltiplo de 10. 
    if ($numero1 % 10 == 0) {
        echo "$numero1 es múltiplo de 10.<br>";

        if ($numero2 % 10 == 0) {
            echo "$numero2 también es múltiplo de 10.";
        } else {
            echo "$numero2 NO es múltiplo de 10.";
        }

    } else {
        echo "El $numero1 NO es múltiplo de 10.";
    }
    ?>


    <h2>Ejercicio 16</h2>
    <?php
    // Crea  un  programa  que  multiplique  dos  números  pedidos  al  usuario.  Si  cualquiera  de  los 
    // números es cero, deberá aparecer en pantalla: "El producto por 0 es 0".
    $numero1 = 10;
    $numero2 = 0;
    $producto = $numero1 * $numero2;
    echo ($numero1 * $numero2 == 0) ? "El producto por 0 es 0" : "El producto es:($producto)";
    ?>


    <h2>Ejercicio 17</h2>
    <?php
    // Crea un programa que pida al usuario dos números enteros. Si el segundo no es cero, mostrará 
    // el resultado de dividir entre el primero y el segundo. En caso contrario, escribirá "Error: No 
    // se puede dividir entre cero"
    $numero1 = 10;
    $numero2 = 0;
    $producto = $numero1 * $numero2;
    echo ($numero2 !== 0) ? "El producto es: $producto" : "No se puede dividir por cero";
    ?>


    <h2>Ejercicio 18</h2>
    <?php
    // Crea un programa que pida al usuario un número entero y responda si es múltiplo de 2 o de 3. 
    $numero = 9;
    if ($numero % 2 == 0) {
        echo "El numero: $numero es múltiplo de 2";
    } elseif ($numero % 3 == 0) {
        echo "El numero: $numero es múltiplo de 3";
    } else {
        echo "El numero no es múltiplo de 2 y 3";
    }
    ?>


    <h2>Ejercicio 19</h2>
    <?php
    // Crea un programa que pida al usuario un número entero y responda si es múltiplo de 2 y de 3 simultáneamente. 
    $numero = 6;
    echo ($numero % 2 == 0 || $numero % 3 == 0) ? "El numero $numero es multiplo de 2 y 3" : "El numero $numero no es multiplo de 2 y 3";
    ?>


    <h2>Ejercicio 20</h2>
    <?php
    // Crea un programa que pida al usuario un número entero y responda si es múltiplo de 2 pero no de 3
    $numero = 8;
    echo ($numero % 2 == 0 || $numero % 3 != 0) ? "El numero $numero es multiplo de 2 pero no de 3" : "";
    ?>


    <h2>Ejercicio 21</h2>
    <?php
    // Crea un programa que pida al usuario un número entero y responda si no es múltiplo de 2 ni de 3.
    $numero = 8;
    echo ($numero % 2 != 0 || $numero % 3 != 0) ? "El numero $numero no es multiplo de 2 ni de 3" : "";
    ?>
    ?>


    <h2>Ejercicio 22</h2>
    <?php
    // Crea un programa que pida al usuario dos números enteros y diga si ambos son pares.
    $numero1 = 2;
    $numero2 = 4;
    echo ($numero1 % 2 == 0 && $numero2 % 2 == 0) ? "Los numeros $numero1 y $numero2 son pares" : "Los numeros $numero1 y $numero2 NO son pares";
    ?>


    <h2>Ejercicio 23</h2>
    <?php
    // Crea un programa que pida al usuario dos números enteros y diga si (al menos) uno es par.
    $numero1 = 2;
    $numero2 = 7;
    echo ($numero1 % 2 == 0 || $numero2 % 2 == 0) ? "Uno de los dos numeros es par" : "Los numeros $numero1 y $numero2 NO son pares";
    ?>


    <h2>Ejercicio 24</h2>
    <?php
    // Crea un programa que pida al usuario dos números enteros y diga si uno y sólo uno es par.
    $numero1 = 2;
    $numero2 = 4;
    echo (($numero1 % 2 == 0 && $numero2 % 2 != 0) || ($numero2 % 2 == 0 && $numero1 % 2 != 0))
        ? "Uno de los dos numeros es par"
        : "Uno de los dos numeros no es par";
    ?>


    <h2>Ejercicio 25</h2>
    <?php
    // Crea un programa que pida al usuario dos números enteros y diga "Uno de los números es 
    // positivo",  "Los  dos  números  son  positivos"  o  bien  "Ninguno  de  los  números  es  positivo", 
    // según corresponda.
    $numero1 = 3;
    $numero2 = -5;
    if (($numero1 > 0 && $numero2 < 0) || ($numero1 < 0 && $numero2 > 0)) {
        echo "Uno de los números es positivo";
    } elseif ($numero1 > 0 && $numero2 > 0) {
        echo "Ambos números son positivos";
    } else {
        echo "Ninguno de los números es positivos";
    }
    ?>


    <h2>Ejercicio 26</h2>
    <?php
    // Crea un programa que pida al usuario tres números y muestre cuál es el mayor de los tres
    $numero1 = 3;
    $numero2 = -5;
    $numero3 = 10;

    if ($numero1 > $numero2 && $numero1 > $numero3) {
        echo "$numero1 es el mayor";
    } elseif ($numero2 > $numero1 && $numero2 > $numero3) {
        echo "$numero2 es el mayor";
    } elseif ($numero3 > $numero1 && $numero3 > $numero2) {
        echo "$numero3 es el mayor";
    }
    ?>


    <h2>Ejercicio 27</h2>
    <?php
    // Crea un programa que pida al usuario dos números enteros y diga si son iguales o, en caso 
    // contrario, cuál es el mayor de ellos
    $numero1 = 1;
    $numero2 = 3;
    if ($numero1 === $numero2) {
        echo "$numero1 es igual que $numero2";
    } else if ($numero1 > $numero2) {
        echo "$numero1 es mayor que $numero2";
    } else if ($numero1 < $numero2) {
        echo "$numero2 es mayor que $numero1";
    }
    ?>


    <h2>Ejercicio 28</h2>
    <?php
    // Crea un programa que use el operador condicional para mostrar un el valor absoluto de un 
    // número de la siguiente forma: si el número es positivo, se mostrará tal cual; si es negativo, se 
    // mostrará cambiado de signo
    $numero1 = -3;
    $valorAbsoluto = ($numero1 >= 0) ? $numero1 : -$numero1;
    echo "El número original es: " . $numero1 . "<br>";
    echo "El valor absoluto es: " . $valorAbsoluto;
    ?>


    <h2>Ejercicio 29</h2>
    <?php
    // Usa el operador condicional para calcular el menor de dos números
    $numero1 = 3;
    $numero2 = 5;
    $menor = ($numero1 < $numero2) ? $numero1 : $numero2;
    echo "el numero menor es: $menor";
    ?>


    <h2>Ejercicio 30</h2>
    <?php
    // Crea un programa que pida un número del 1 al 5 al usuario, y escriba el nombre de ese número,
    // usando "switch" (por ejemplo, si introduce "1", el programa escribirá "uno").
    
    $usuario = 1;
    echo "numero de usuario: $usuario <br>";
    switch ($usuario) {
        case 1:
            echo "uno";
            break;
        case 2:
            echo "dos";
            break;
        case 3:
            echo "tres";
            break;
        case 4:
            echo "cuatro";
            break;
        case 5:
            echo "cinco";
            break;
        default:
            echo "numero no valido";
            break;
    }
    ?>


    <h2>Ejercicio 31</h2>
    <?php
    // Crea un programa que pida una letra tecleada por el usuario y diga si se trata de un signo de
    // puntuación (. , ; :), una cifra numérica (del 0 al 9) o algún otro carácter, usando "switch".
    $usuario = 'a';
    echo "caracter de usuario: $usuario <br>";

    switch ($usuario) {
        //Casos de signo de puntuaciones
        case '.':
        case ',':
        case ';':
        case ':':
            echo "El caracter $usuario es un signo de puntuacion";
            break;
        //Casos de numeros
        case '0':
        case '1':
        case '2':
        case '3':
        case '4':
        case '5':
        case '6':
        case '7':
        case '8':
        case '9':
            echo "El caracter $usuario es un numero";
            break;
        //Caso para el resto de caracteres
        default:
            echo "El caracter $usuario es otro tipo de caracter ni signo de puntuacion ni numero";
            break;
    }
    ?>


    <h2>Ejercicio 32</h2>
    <?php
    // Crea un programa que pida una letra tecleada por el usuario y diga si se trata de una vocal,
    // una cifra numérica o una consonante, usando "switch".
    $usuario = 'a';
    echo "caracter de usuario: $usuario <br>";
    switch ($usuario) {
        // Casos para las vocales
        case 'a':
        case 'e':
        case 'i':
        case 'o':
        case 'u':
            echo "El carácter $usuario es una vocal";
            break;

        // Casos para numeros
        case '0':
        case '1':
        case '2':
        case '3':
        case '4':
        case '5':
        case '6':
        case '7':
        case '8':
        case '9':
            echo "El carácter $usuario es un numero";
            break;

        // Caso por defecto (Consonante u otro carácter)
        default:
            // Verificamos si es una letra alfabetica (true) o algún otro símbolo con el método ctype_alpha https://www.php.net/manual/function.ctype-alpha
    
            echo ctype_alpha($caracter_evaluar)
                ? "Resultado: El carácter $usuario es una consonante"
                : "Resultado: El carácter $usuario es otro tipo de carácter (no es vocal, consonante o cifra)";
            break;
    }
    ?>


    <h2>Ejercicio 33</h2>
    <?php
    // Repite el ejercicio 30, empleando "if" en lugar de "switch"
    $usuario = 1;
    echo "numero de usuario: $usuario <br>";
    if ($usuario == 1) {
        echo "uno";
    } elseif ($usuario == 2) {
        echo "dos";
    } elseif ($usuario == 3) {
        echo "tres";
    } elseif ($usuario == 4) {
        echo "cuatro";
    } elseif ($usuario == 5) {
        echo "cinco";
    } else {
        echo "numero no valido";
    }

    ?>


    <h2>Ejercicio 34</h2>
    <?php
    // Repite el ejercicio 31, empleando "if" en lugar de "switch" (pista: como las cifras numéricas
    // del 0 al 9 están ordenadas, no hace falta comprobar los 10 valores, sino que se puede hacer
    // con "if ((simbolo >= '0') && (simbolo <='9'))"). 
    
    $usuario = ":";
    echo "caracter de usuario: $usuario <br>";
    if ($usuario >= '0' && $usuario <= '9') {
        echo "El caracter $usuario es un numero";
    } elseif (
        ($usuario == ':') ||
        ($usuario == '.') ||
        ($usuario == ',') ||
        ($usuario == ';')
    ) {
        echo "El caracter $usuario es un signo de puntuacion";
    } else {
        echo "El caracter $usuario es otro tipo de caracter ni signo de puntuacion ni numero";
    }
    ?>


    <h2>Ejercicio 35</h2>
    <?php
    // Repite el ejercicio 32, empleando "if" en lugar de "switch".
    $usuario = 'a';
    echo "caracter de usuario: $usuario <br>";
    if (($usuario >= '0') && ($usuario <= '9')) {
        echo "El caracter $usuario es un numero";;
    } elseif (
        ($usuario == 'a') ||
        ($usuario == 'e') ||
        ($usuario == 'i') ||
        ($usuario == 'o') ||
        ($usuario == 'u')
    ) {
        echo "El carácter $usuario es una vocal";
    } elseif (ctype_alpha($usuario)) {
        echo "Resultado: El carácter $usuario es una consonante";
    } else {
        echo "Resultado: El carácter $usuario es otro tipo de carácter (no es vocal, consonante o cifra)";
    }
    ?>
</body>

</html>