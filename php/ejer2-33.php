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
function media($calificaciones){
    $suma=0;
    $contador=0;
    foreach($calificaciones as $nota){
        $suma=$suma+$nota;
        $contador++;
    }
    return $suma/$contador;
}

function mostrarAlumno($nombre)
{
    global $alumnos;

    if (array_key_exists($nombre, $alumnos)) {
        echo "<h2>Nombre: " . $nombre . "</h2>";
        echo "Edad: " . $alumnos[$nombre]["edad"] . "<br>";
        echo "Calificaciones: " . implode(", ", $alumnos[$nombre]["calificacion"]) . "<br>";
        echo "Media: " . media($alumnos[$nombre]["calificacion"]) . "<br><br>";
    } else {
        echo "El alumno '$nombre' no existe en el registro.<br><br>";
    }
}



echo "<h1>Listado de Alumnos</h1><br>";


crearAlumno("Xabier", 20, [7,3,9,5,6,9]);
crearAlumno("Ekaitz", 22, [7,5,9,5,7,9]);
crearAlumno("Pedro", 19, [3,3,7,5,5,7]);


mostrarAlumno("Xabier");
mostrarAlumno("Ekaitz");
mostrarAlumno("Pedro");

mostrarAlumno("Maria");
?>
