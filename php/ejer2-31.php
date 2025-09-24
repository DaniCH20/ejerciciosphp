<?php
//el programa tendra una variable estatica que se inicializara en cero.
//obtendra 3 valores numericos al azar y los sumara 
function suma() {
    static $total = 0;
    for ($i = 1; $i < 4; $i++) {
        $num = rand(1, 10);
        echo "$i. vez incrementa: $num : ";
        $total += $num;
        echo " $total <br>";
    }
    return $total;
}
echo "La suma total es: " . suma();
?>