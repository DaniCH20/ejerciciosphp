<?php
$datos = array("Iker"=>"3.5","Martina"=>"7","Anurag"=>"6.3");
echo "<h1>Ejercicio 20 Calcular la media de un array asociativo</h1> <br>";
echo "<h2>Utilizando For each</h2>";
$media=0;
$contador=0;
foreach($datos as $nombre => $nota) {
    echo  $nombre .": ". $nota;
    echo "<br>";
    $media=$media+$nota;
    $contador++;
}
$media=$media/$contador;
echo "<h2>La media es: $media</h2>";
?>