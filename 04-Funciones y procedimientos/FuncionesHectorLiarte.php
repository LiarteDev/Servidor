<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>04-Funciones</title>
</head>

<body>
    <h2>Ejercicio 62</h2>
    <?php
    // Crea una función llamada "DibujarCuadrado3x3", que dibuje un cuadrado formato por 3 filas con 3 asteriscos cada una.
    function DibujarCuadrado3x3(): void
    {
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                echo "*";
            }
            echo "<br>";
        }
    }
    DibujarCuadrado3x3()
        ?>

    <h2>Ejercicio 63</h2>
    <?php
    // Crea una función "DibujarCuadrado" que dibuje en pantalla un cuadrado del ancho (y alto) que se indique como parámetro.
    function DibujarCuadrado($ancho, $largo): void
    {
        for ($i = 0; $i < $largo; $i++) {
            for ($j = 0; $j < $ancho; $j++) {
                echo "*";
            }
            echo "<br>";
        }
    }
    DibujarCuadrado("4", 4);
    ?>

    <h2>Ejercicio 64</h2>
    <?php
    //  Crea una función "DibujarRectangulo" que dibuje en pantalla un rectángulo del ancho y alto que se indiquen como parámetros.
    function DibujarRectangulo($ancho, $largo): void
    {
        if ($ancho == $largo) {
            echo "Vas a dibujar un cuadrado <br>";
        }
        for ($i = 0; $i < $largo; $i++) {
            for ($j = 0; $j < $ancho; $j++) {
                echo "*";
            }
            echo "<br>";
        }
    }
    echo "<br>";
    DibujarRectangulo(2, 2);
    echo "<br>";
    DibujarRectangulo(20, 3);
    ?>

    <h2>Ejercicio 65</h2>
    <?php
    // Crea una función "Cubo" que calcule el cubo de un número real (float) que se indique como parámetro. El resultado deberá ser otro número real.
    // Prueba esta función para calcular el cubo de 3.2 y el de 5. 
    function Cubo($numero): float
    {
        return $numero * $numero * $numero;
    }
    echo Cubo(3.2);
    echo "<br>";
    echo Cubo(5);
    ?>

    <h2>Ejercicio 66</h2>
    <?php
    //  Crea una función "Menor" que calcule el menor de dos números enteros que recibirá como parámetros. El resultado será otro número entero.
    function Menor($numero1, $numero2): int
    {
        echo "Los numeros son $numero1 y $numero2";
        if ($numero1 > $numero2) {
            return $numero2;
        } elseif ($numero1 < $numero2) {
            return $numero1;
        }
        echo "Los numeros son iguales ";
        return -1;
    }
    echo Menor(3, 5);
    ?>

    <h2>Ejercicio 67</h2>
    <?php
    // Crea una función llamada "Signo", que reciba un número real,
    // y devuelva un número entero con el valor: -1 si el número es negativo, 1 si es positivo o 0 si es cero.
    function Signo(int $x): int
    {
        if ($x < 0) {
            return -1;
        } elseif ($x > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    echo Signo(3) . "<br>";
    echo Signo(0) . "<br>";
    echo Signo(-21);
    ?>

    <h2>Ejercicio 68</h2>
    <?php
    // Crea una función "Inicial", que devuelva la primera letra de una cadena de texto. Prueba esta función para calcular la primera letra de la frase "Hola".
    function Inicial(string $frase)
    {
        return $frase[0];
    }
    echo Inicial("Hola");
    ?>

    <h2>Ejercicio 69</h2>
    <?php
    // Crea una función "UltimaLetra", que devuelva la última letra de una cadena de texto. Prueba esta función para calcular la última letra de la frase "Hola". 
    function UltimaLetra(string $frase)
    {
        return substr($frase, -1);
    }
    echo UltimaLetra("Hola");
    ?>

    <h2>Ejercicio 70</h2>
    <?php
    // Crea una función "MostrarPerimSuperfCuadrado" que reciba un número y calcule y muestre en pantalla el valor del perímetro 
    // y de la superficie de un cuadrado que tenga como lado el número que se ha indicado como parámetro.
    function MostrarPerimSuperfCuadrado(int $lado): void
    {
        $perimetro = $lado * 4;
        echo "El perimetro es: " . $perimetro . "<br>";
        $superficie = $lado * 2;
        echo "La superficie es: " . $superficie;
    }
    MostrarPerimSuperfCuadrado(4);
    ?>

    <h2>Ejercicio 71</h2>
    <?php
    // Crea una función "EscribirTablaMultiplicar" que escriba la tabla de multiplicar de un número 
    // que  se declarará  variable  global (por ejemplo, para  el 3 deberá  llegar desde  "3x0=0" hasta "3x10=30")
    $numero = 3;
    function EscribirTablaMultiplicar(int $numero): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $resultado = $numero * $i;
            echo $numero . " X " . $i . " = " . $resultado;
            echo "<br>";
        }
    }
    EscribirTablaMultiplicar($numero);
    ?>

    <h2>Ejercicio 72</h2>
    <?php
    // Crea una función "ContarLetra", que reciba como parámetro una letra, 
    // y devuelva la cantidad de veces que dicha letra aparece en la cadena declarada como global.
    // Por ejemplo, si la cadena es "Alicante" y la letra es 'a', debería devolver 2.
    $frase = "Alicante";
    function ContarLetra($letra): int
    {
        global $frase;
        $contador = 0;
        for ($i = 0; $i < strlen($frase); $i++) {
            if (strtolower($frase[$i]) == strtolower($letra)) {
                $contador++;
            }
        }
        return $contador;
    }
    echo $frase . "<br>";
    echo "La letra 'a' se repite: " . ContarLetra('a');
    ?>

    <h2>Ejercicio 73</h2>
    <?php
    // Crea  una  función  "Intercambiar",  que  intercambie  el  valor  de  los  dos  números  que  se  le indiquen como parámetro, 
    // usando parámetros por referencia.
    function Intercambiar(&$n1, &$n2)
    {
        $temp = $n1;
        $n1 = $n2;
        $n2 = $temp;
    }
    // Variables de prueba
    $x = 2;
    $y = 3;
    echo "Antes: x = $x, y = $y <br>";
    Intercambiar($x, $y);
    echo "Después: x = $x, y = $y <br>";
    ?>

    <h2>Ejercicio 74</h2>
    <?php
    //  Crea  una  función  "Iniciales",  que  reciba  una  cadena  como "IG  Formación"  
    // y  devuelva  las letras  I  y  F  (primera  letra,  y  letra  situada  tras  el  primer  espacio),
    // usando parámetros por referencia.
    function Iniciales($frase, &$iniciales)
    {
        $palabras = explode(" ", $frase); // Este metodo convierte el string en un array donde se almacenan las palabras separadas por espacios
        $iniciales = "";

        if (isset($palabras[0][0])) {
            $iniciales .= strtoupper($palabras[0][0]); // primera letra de la primera palabra concatenada y asignada
        }

        if (isset($palabras[1][0])) {
            $iniciales .= strtoupper($palabras[1][0]); // primera letra de la segunda palabra concatenada y asignada
        }
    }
    $frase = "IG Formación";
    $iniciales = "";

    Iniciales($frase, $iniciales);

    echo "Las iniciales de '$frase' son: $iniciales";
    ?>

    <h2>Ejercicio 75</h2>
    <?php
    // Crea una función que imite el lanzamiento de un dado, generando un número al azar entre 1 y 6.
    function Dado(): int
    {
        return random_int(1, 6);
    }
    echo Dado();
    ?>

    <h2>Ejercicio 76</h2>
    <?php
    // Crea una función que genere un array relleno con 100 números reales al azar entre  -1000 y 1000.
    // Luego deberá calcular, y mostrar en pantalla, la media y la mediana.
    function arrayRandMediaYMediana(): void
    {
        $array = [];
        for ($i = 0; $i < 100; $i++) {
            $array[$i] = random_int(-1000, 1000);
        }
        $media = array_sum($array) / count($array);
        echo " La media es de: $media <br>";

        sort($array);
        $n = count($array);
        if ($n % 2 == 0) {
            $mediana = ($array[$n / 2 - 1] + $array[$n / 2]) / 2;
        } else {
            $mediana = $array[floor($n / 2)];
        }
        echo "La mediana del aray es de : $mediana";
    }
    arrayRandMediaYMediana();
    ?>

    <h2>Ejercicio 77</h2>
    <form method="POST">
        <label>a:</label>
        <input type="number" name="a" step="any" required><br><br>

        <label>b:</label>
        <input type="number" name="b" step="any" required><br><br>

        <label>c:</label>
        <input type="number" name="c" step="any" required><br><br>

        <button type="submit">Calcular</button>
    </form>
    <?php
    // Haz un programa que resuelva ecuaciones de segundo grado, del tipo a·x2 + b·x + c = 0.
    // El usuario deberá introducir los valores de a, b y c.
    // Se deberá crear una función "CalcularRaicesSegundoGrado", que recibirá como parámetros los coeficientes a, b y c (por valor) 
    // así como las soluciones x1 y x2 (por referencia).
    // Deberá devolver los valores de las dos soluciones x1 y x2. Si alguna solución no existe, se devolverá como valor 100.000 para esa solución. 
    function CalcularRaicesSegundoGrado($a, $b, $c, &$x1, &$x2)
    {
        // calculamos el discriminante
        $discriminante = $b * $b - 4 * $a * $c; //b^2 -4ac
    
        if ($discriminante < 0) {
            // No existen soluciones reales
            $x1 = 100000;
            $x2 = 100000;
        } else {
            $x1 = (-$b + sqrt($discriminante)) / (2 * $a);
            $x2 = (-$b - sqrt($discriminante)) / (2 * $a);
        }
    }

    if (isset($_POST['a']) && isset($_POST['b']) && isset($_POST['c'])) {

        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];

        $x1 = 0;
        $x2 = 0;

        CalcularRaicesSegundoGrado($a, $b, $c, $x1, $x2);

        echo "x1 = $x1<br>";
        echo "x2 = $x2<br>";
    }
    ?>

    <h2>Ejercicio 78</h2>
    <form method="POST">
        <label>Ángulo en grados:</label>
        <input type="number" name="angulo" step="any" required>
        <button type="submit">Calcular</button>
    </form>
    <?php
    // Crea un programa que pida al usuario un ángulo (en grados) y devuelva en tres parámetros el seno,  el  coseno  y  la  tangente. 
    // Recuerda  que  las  funciones  trigonométricas  esperan  que  el ángulo  se  indique  en  radianes,  no  en  grados.
    // La  equivalencia  es  que  360  grados  son  2*PI radianes. 
    
    function CalcularTrigonometria($grados, &$seno, &$coseno, &$tangente)
    {
        $radianes = $grados * M_PI / 180;

        $seno = sin($radianes);
        $coseno = cos($radianes);
        $tangente = tan($radianes);
    }

    if (isset($_POST['angulo'])) {

        $angulo = $_POST['angulo'];
      
        $seno = 0;
        $coseno = 0;
        $tangente = 0;

        CalcularTrigonometria($angulo, $seno, $coseno, $tangente);

        echo "Seno: $seno<br>";
        echo "Coseno: $coseno<br>";
        echo "Tangente: $tangente<br>";
    }
    ?>

    <h2>Ejercicio 79</h2>
    <?php
    // La empresa para la que trabajas quiere que realices un informe sobre las funciones anónimas o closures.  
    
    /*
    Funciones anónimas: Son funciones sin nombre que pueden almacenarse en variables, pasarse
    como argumentos o devolverse desde otras funciones. Se definen mediante la palabra clave
    function sin especificar un nombre.


    Closures: Son funciones anónimas que pueden acceder a variables externas al ámbito donde
    fueron creadas. Para ello se utiliza la palabra clave use, que permite “capturar” variables del
    entorno.
    */
    echo "Ejemplo:";
    $mensaje = "Hola";
    $saludar = function () use ($mensaje) {
        echo $mensaje;
    };
    $saludar();
    ?>
</body>

</html>