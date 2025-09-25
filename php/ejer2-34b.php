<?php
$array = [0 => "Piedra", 1 => "Papel", 2 => "Tijera"];
$puntosM=0;
$puntosJ=0;
Include "diseño.php";
function seleccionarGanador($jugador1, $maquina)
{
   global $array, $puntosM, $puntosJ;
    if ($jugador1 == $maquina) {
        return "Ha habido un empate ambos eligieron " . $array[$jugador1];
    } elseif (($jugador1 == 0 && $maquina == 2) || ($jugador1 == 1 && $maquina == 0) || ($jugador1 == 2 && $maquina == 1)) {
        $puntosJ++;
        return "Has ganado! " . $array[$jugador1] . " vence a " . $array[$maquina];
    } else {
        $puntosM++;
        return "Ha ganado el ordenador! " . $array[$maquina] . " vence a " . $array[$jugador1];
    }
}
function partida()
{
   global $array, $puntosM, $puntosJ;
    do {
        $jugador1 = rand(0, 2);
        $maquina = rand(0, 2);
        echo "<div style='margin-bottom:10px;'>";
        echo "Tu eleccion : ";
        print_r($array[$jugador1]);
        echo "<br>";
        echo "Eleccion de la maquina : ";
        print_r($array[$maquina]);
        echo "<br>";
        echo "Resultado:" . seleccionarGanador($jugador1, $maquina);
        echo "</div><hr>";
    } while ($puntosM < 3 && $puntosJ < 3);
     if ($puntosJ == 3) {
        echo "<h2>¡Felicidades, ganaste la partida!</h2>";
    } else {
        echo "<h2>La máquina ganó la partida </h2>";
    }
}
partida();
include "pie.html";
?>
