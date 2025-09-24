<?php

$alumnos = [];


function crearAlumno($nombre, $edad, $calificacion)
{
    global $alumnos;
    
    $alumnos[$nombre] = [
        "edad" => $edad,
        "calificacion" => $calificacion
    ];
}


function mostrarAlumno($nombre)
{
    global $alumnos;

    if (array_key_exists($nombre, $alumnos)) {
        echo "<h2>Nombre: " . $nombre . "</h2>";
        echo "Edad: " . $alumnos[$nombre]["edad"] . "<br>";
        echo "Calificación: " . $alumnos[$nombre]["calificacion"] . "<br><br>";
    } else {
        echo "El alumno '$nombre' no existe en el registro.<br><br>";
    }
}


echo "<h1>Listado de Alumnos</h1><br>";


crearAlumno("Xabier", 20, 7);
crearAlumno("Ekaitz", 22, 5);
crearAlumno("Pedro", 19, 8);


mostrarAlumno("Xabier");
mostrarAlumno("Ekaitz");
mostrarAlumno("Pedro");

mostrarAlumno("Maria");
?>
