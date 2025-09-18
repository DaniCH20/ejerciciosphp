<?php

$nombre = "daniel";
$apellido = "caballero";
$nombreCompleto = $nombre . " " . $apellido;
echo strtolower($nombreCompleto);//Minus
echo '<br>';
echo strtoupper($nombreCompleto);//Mayus
echo '<br>';
echo strlen($nombreCompleto);//cuenta los caracteres de mi  nombre
echo '<br>';
$primero = $nombreCompleto[0];//Hallar el primer caracter jsjsjs
$ultimo =$nombreCompleto[strlen($nombreCompleto) - 1];//Hallar el ultimo copiado del ejercicio anterior
printf("El primer caracter es %s y el ultimo es %s ", $primero, $ultimo);
echo '<br>';
echo 'Nombre: '. ucfirst($nombre);//Convierte a mayuscula la primera letra
echo '<br>';
echo 'Apellido: '. ucfirst($apellido);
echo '<br>';
printf("El tercer caracter es %s  y el quinto es %s ", $nombreCompleto[2], $nombreCompleto[4]);


