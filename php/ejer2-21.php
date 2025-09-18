<?php
$datos=array("0"=>array("Ander","ugarte Fernandez","19","AS3"),
             "1"=>array("Ezitzen","Etxebarria Rumayor","20","DW3"),
             "2"=>array("Aitor","Madariaga Alkorta","27","DW3"));

echo "<h1>Ejercicio 19 Mostrar contenidos de un array multidimensional</h1> <br>";
echo "<h2>Listado de Alumnos</h2>";
foreach($datos as $dato => $nombre) {
        
    foreach($nombre  as $info=> $name) {
    echo"<p><strong>Nombre:" .$nombre[0] ."</strong></p>";
    echo"<ul>";
    echo "<li><strong> Apellidos: </strong>".$nombre[1] ."</li>";
    echo "<li><strong> Edad: </strong>".$nombre[2] ."</li>";
    echo "<li><strong> Curso: </strong>".$nombre[3] ."</li>";
    echo"</ul>";
    break;
    }
}
?>