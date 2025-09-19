<?php
$titulos = array("harry potter", "space jam",
 "mi pobre angelito", "sherk", "Solo en casa", "Eyes Wide Shut","pacific rim","titanic","avatar"
,"el señor de los anillos");
print_r($titulos);
echo "<br>";
sort($titulos);
print_r($titulos);
echo "<br>";
for($i=0;$i<5;$i++){
    printf("%s .- %s",$i,$titulos[$i]);
    echo "<br>";
}
?>