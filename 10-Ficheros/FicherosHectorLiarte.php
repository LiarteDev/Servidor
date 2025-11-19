<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficheros</title>
</head>

<body>

    <?php
    //Creo el fichero y le añado los datos
    $file_path = 'fichero.csv';
    $data = [];
    $csv_content = "Javier;Miras;ajmiras@igformacion.com;DAW\n"
        . "José;García;jgarcia@igformacion.com;DAW\n"
        . "Juan;Latorre;jlatorre@igformacion.com;DAW\n";

    file_put_contents($file_path, $csv_content);
    ?>


    <h2>Ejercicio 96:</h2>
    <?php
    // Crea  un  programa  que  lea  de  un  fichero  la  secuencia  escrita  en  CSV. Utiliza  la función explode.

    $fichero = fopen("fichero.csv", "r");
    while ($cadena = fgets($fichero)) {
        $separados = explode(";", trim($cadena));

        foreach ($separados as $valor) {
            echo $valor . "<br>";
        }
        echo "<hr>";
    }
    fclose($fichero);
    ?>


    <h2>Ejercicio 97:</h2>
    <?php
    // Crea un programa que lea de un fichero la secuencia del ejercicio anterior. Utiliza la función fgetcsv
    $fichero = fopen("fichero.csv", "r");
    while (($cadena = fgetcsv($fichero, 1000, ";")) !== FALSE) {
        foreach ($cadena as $valor) {
            echo $valor . "<br>";
        }
        echo "<hr>";
    }

    fclose($fichero);
    ?>


    <h2>Ejercicio 98:</h2>
    <?php
    // Crea un programa que modifique la secuencia del ejercicio anterior, cambiando DAW por DAM y guardándolas en un fichero. Utiliza la función implode
    
    $ficheroEntrada = fopen("fichero.csv", "r");
    $ficheroSalida = fopen("fichero_modificado_implode.csv", "w");
    $contenidoModificado = "";

    while (($cadena = fgetcsv($ficheroEntrada, 1000, ";")) !== FALSE) {
        foreach ($cadena as $index => $valor) {
            if (trim($valor) === "DAW") {
                $cadena[$index] = "DAM";
            }
        }
        $contenidoModificado .= implode(";", $cadena) . "\n";
    }
    fwrite($ficheroSalida, $contenidoModificado);

    fclose($ficheroEntrada);
    fclose($ficheroSalida);

    echo "Se ha modificado el archivo correctamente y se ha guardado como fichero_modificado_implode.csv";
    ?>


    <h2>Ejercicio 99:</h2>
    <?php
    // Crea un programa que modifique la secuencia del ejercicio anterior, cambiando DAW por DAM y guardándolas en un fichero. Utiliza la función fputcsv
    
    $ficheroEntrada = fopen("fichero.csv", "r");
    $ficheroSalida = fopen("fichero_modificado_fputcsv.csv", "w");
    
    while (($cadena = fgetcsv($ficheroEntrada, 1000, ";")) !== FALSE) {
        foreach ($cadena as $index => $valor) {
            if (trim($valor) === "DAW") {
                $cadena[$index] = "DAM";
            }
        }
        fputcsv($ficheroSalida, $cadena, ";");
    }

    fclose($ficheroEntrada);
    fclose($ficheroSalida);

    echo "Se ha modificado el archivo correctamente y se ha guardado como fichero_modificado_fputcsv.csv";
    ?>


    <h2>Ejercicio 100:</h2>
    <a href="ejercicio100HectorLiarte.php">Descargar el PDF</a>
</body>

</html>