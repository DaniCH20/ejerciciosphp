<?php
//Diseña una funcion que muestra la media aritmetica de
//varios numeros guardados en un array
function mediaAritmetica($numeros) {
    $suma = array_sum($numeros);
    $cantidad = count($numeros);
    return $suma / $cantidad;
}
$numeros = [10, 20, 35, 40, 50];
$media = mediaAritmetica($numeros);
echo "La media aritmetica es: " . $media;

?>