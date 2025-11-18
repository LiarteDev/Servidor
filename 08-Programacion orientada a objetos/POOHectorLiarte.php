<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programación Orientada a Objetos</title>
</head>

<body>
    <h2>Ejercicio 84</h2>
    <?php
    // Para guardar información sobre libros, vamos a comenzar por crear una clase "Libro", que 
    // contendrá atributos "autor", "titulo", "ubicacion" y métodos Get y Set adecuados para leer su 
    // valor y cambiarlo. Crea una aplicación para probarla.
    
    //Este seria el codigo del ejercicio 84 pero como hemos modificado la clase de Libro y eliminado sus atributos nos da un error.
    /*
    require_once("libro.php");

    $libro = new Libro();
    $libro->set_autor("Cervantes");
    $libro->set_titulo("Don Quijote");
    $libro->set_ubicacion("Sección Literatura Española");

    echo "Autor: " . $libro->get_autor() . "<br>";
    echo "Título: " . $libro->get_titulo() . "<br>";
    echo "Ubicación: " . $libro->get_ubicacion() . "<br>";

    */
    ?>

    <h2>Ejercicio 85</h2>
    <?php
    // Crea una variante ampliada del ejercicio 83. En ella, la clase Persona no cambia.
    // Se creará una nueva clase PersonaInglesa, en el fichero "personainglesa.php".
    // Esta clase deberá heredar las  características  de  la  clase  "Persona",  y  añadir  un  método  "TomarTe",
    // que  escribirá  en pantalla  "Estoy tomando  té".
    // Para  probarlo  crea  dos  objetos  de  tipo  Persona  y  uno  de  tipo PersonaInglesa, les asignará un nombre, 
    // les pedirá que saluden y pedirá a la persona inglesa que tome té.
    
    require_once "persona.php";
    require_once "personainglesa.php";

    $persona1 = new Persona();
    $persona2 = new Persona();
    $personaInglesa = new PersonaInglesa();

    $persona1->SetNombre("Héctor");
    $persona2->SetNombre("Lucía");
    $personaInglesa->SetNombre("Jorge");

    
    $persona1->Saludar();
    $persona2->Saludar();
    $personaInglesa->Saludar();

    $personaInglesa->TomarTe();
    ?>
</body>

</html>