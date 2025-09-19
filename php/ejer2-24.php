<?php
$paises = ["alemania", "rumania", 
"italia", "chile","uruguay","australia"];
print_r($paises);
echo "<br>";
unset($paises[0]);
unset($paises[3]);
unset($paises[5]);
print_r($paises);
echo "<br>";
$paises=array_values($paises);
$paises[]="argentina";
$paises[]="bolivia";
print_r($paises);
echo "<br>";
sort($paises);
print_r($paises);
echo "<br>";

?>