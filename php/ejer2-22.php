<?php
$frutas = array("naranja", "platano");
array_push($frutas, "manzana", "melon","limon","fesa","kiwi");
print_r($frutas);
$frutasAñadidas = array_pad($frutas, 8,"cerezas");
//$frutasAñadidas = array_pad($frutas, 9,"piña");
echo "<br>";
print_r($frutasAñadidas);

?>