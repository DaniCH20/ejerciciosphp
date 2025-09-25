<?php
$array = [0=>"Piedra", 1=>"Papel", 2=>"Tijera"];
include "diseño.php";
$jugador1 = rand(0,2);
$maquina = rand(0,2);
echo "Tu eleccion : ";
print_r($array[$jugador1]);
echo "<br>";
echo "Eleccion de la maquina : ";
print_r($array[$maquina]);
echo "<br>";
echo "Resultado:" . seleccionarGanador($jugador1, $maquina);
function seleccionarGanador($jugador1, $maquina) {
    global $array;
    if ($jugador1 == $maquina) {
        return "Ha habido un empate ambos eligieron " . $array[$jugador1];
    } elseif (($jugador1 == 0 && $maquina == 2) || ($jugador1 == 1 && $maquina == 0) || ($jugador1 == 2 && $maquina == 1)) {
        return "Has ganado! " . $array[$jugador1] . " vence a " . $array[$maquina];
    } else {
        return "Ha ganado el ordenador! " . $array[$maquina] . " vence a " . $array[$jugador1];
    }
}
include "pie.html";
?>