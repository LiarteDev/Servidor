<?php
    // Crea una función que imite el lanzamiento de un dado, generando un número al azar entre 1 y 6.
    function Dado(): int
    {
        return random_int(1, 6);
    }

    function EscribirTablaMultiplicar(int $numero): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $resultado = $numero * $i;
            echo $numero . " X " . $i . " = " . $resultado;
            echo "<br>";
        }
    }
    function Inicial(string $frase)
    {
        return $frase[0];
    }
?>
