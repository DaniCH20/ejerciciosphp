<?php
$a = array("Iker"=>"3.5","Martina"=>"7","Anurag"=>"6.3");
echo "<h1>Ejercicio 15 Mostrar contenidos de un array asociativo</h1> <br>";
printf ("Nota de Iker : %s", $a["Iker"]); 
echo "<br>";
printf ("Nota de Martina : %s", $a["Martina"]); 
echo "<br>";
printf ("Nota de Anurag : %s", $a["Anurag"]); 
echo "<br>";

foreach($a as $nombre => $nota) {
  echo  $nombre .": ". $nota;
  echo "<br>";
}

foreach($a as $x => $valor) {
  echo "Clave=" . $x ;
  echo "<br>";
}

echo"segunda clave : %s", $a["Martina"];
?>