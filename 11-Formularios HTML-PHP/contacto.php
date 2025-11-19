<?php
echo '<p>Los valores pasados por GET son los siguientes:</p>';
print_r($_GET);
echo '<p>Y por POST nos han pasado: </p>';
print_r($_POST);

$nombre = htmlspecialchars($_POST["nombre"]);
$apellidos = htmlspecialchars($_POST["apellidos"]);
$contraseña = $_POST["contrasenya"];
$telefono = $_POST["telefono"];
$codigoPostal = $_POST["cp"];
$email = $_POST["email"];
$fechaNacimiento = $_POST["fechanacimiento"];
$fechaMinima = strtotime("1990-01-01");
$fechaIngresada = strtotime($fechaNacimiento);

$correcto = true;

$nombre = htmlspecialchars($_POST["nombre"]);
if (strlen($nombre) > 50) {
    echo "<br>El nombre no puede tener más de 50 caracteres<br>";
    $correcto = false;
}

if (strlen($apellidos) > 100) {
    echo "Los apellidos no pueden tener más de 100 caracteres<br>";
    $correcto = false;
}

if (empty($contraseña)) {
    echo "La contraseña no puede estar vacía<br>";
    $correcto = false;
}

if (!ctype_digit($telefono)) {
    echo "El teléfono solo puede contener números<br>";
    $correcto = false;
}

if (!ctype_digit($codigoPostal) || strlen($codigoPostal) > 5) {
    echo "El código postal debe contener solo números y un máximo de 5 dígitos<br>";
    $correcto = false;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "El email no es válido<br>";
    $correcto = false;
}

if ($fechaIngresada <= $fechaMinima) {
    echo "La fecha de nacimiento debe ser posterior al 1/1/1990<br>";
    $correcto = false;
}
if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] === 0) {

    $destino = "img/" . basename($_FILES["foto"]["name"]);

    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $destino)) {
        echo "<br>Foto subida correctamente.<br>";
        echo "Guardada en: $destino<br>";
    } else {
        echo "<br>Error al guardar la foto<br>";
    }

} else {
    echo "<br>No se ha recibido ninguna foto<br>";
}
if ($correcto == true) {
    echo "<strong><br>Todos los datos han sido validados correctamente</strong><br>";
} else {
    echo "<strong>Ha habido errores en los datos ingresados</strong><br>";
}
