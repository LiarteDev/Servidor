<?php
$carpetaDestino = 'documents/';
$ficheroDestino = $carpetaDestino . basename($_FILES["documento"]["name"]);
$tipoDocumento = strtolower(pathinfo($ficheroDestino, PATHINFO_EXTENSION));
$nombreDocumento = htmlspecialchars(basename($_FILES["documento"]["name"]));
$correcto = true;

if ($tipoDocumento != 'doc' && $tipoDocumento != 'docx') {
    echo 'Sólo se permiten archivos doc o docx';
    $correcto = false;
}

if ($_FILES["documento"]["size"] > 30 * 1024 * 1024) {
    echo "El documento $nombreDocumento excede el tamaño máximo permitido (30 Mb).";
    $correcto = false;
}

if ($correcto == true) {
    if (move_uploaded_file($_FILES["documento"]["tmp_name"], $ficheroDestino))
        echo "El documento $nombreDocumento se ha subido.";
    else
        echo "Ha habido un error al guardar el documento $nombreDocumento.";
}
