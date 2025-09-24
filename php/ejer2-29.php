<?php
//Diseña una funcion que recibe un parametro por referencia y le suma una unidad
function sumaUno(&$num) {
    $num += 1;
}   
$valor = 5;
sumaUno($valor);
echo "El valor incrementado es: " . $valor; // Muestra 6

?>