<?php
$datos=array("Ander"=>array("ugarte Fernandez","19","AS3"),
             "Ezitzen"=>array("Etxebarria Rumayor","20","DW3"),
             "Aitor"=>array("Madariaga Alkorta","27","DW3"));

echo "<h1>Ejercicio 19 Mostrar contenidos de un array multidimensional</h1> <br>";
echo "<h2>Listado de Alumnos</h2>";
foreach($datos as $nombre => $info) {
    echo"<p><strong>Nombre: $nombre</strong></p>";
    echo"<ul>";
    echo "<li><strong> Apellidos: </strong>".$info[0] ."</li>";
    echo "<li><strong> Edad: </strong>".$info[1] ."</li>";
    echo "<li><strong> Curso: </strong>".$info[2] ."</li>";
    echo"</ul>";
 
}
?>