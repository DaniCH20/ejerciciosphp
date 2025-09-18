<?php
$viajesDeseados=array("Italia", "Alemania", "Finlandia", "Ecuador", "Japon");
$viajesDeseados[]="Egipto";
$viajesDeseados[]="Brasil";
$visitados_2023=array("Finlandia", "Costa Rica");
$visitados_2024=array("Portugal", "Japon");
$visitados_totales=array_merge($visitados_2023,$visitados_2024);
foreach($viajesDeseados as $pais){
    if(in_array($pais,$visitados_totales)){
        echo "Ya has visitado $pais.<br>";
        unset($viajesDeseados[array_search($pais,$viajesDeseados)]);
    }else{
        echo "No has visitado $pais.<br>";
    }
}
sort($viajesDeseados);
print_r($viajesDeseados);
?>