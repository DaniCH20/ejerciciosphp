<?php
//Dado un correo electronico, separa el nombre del dominio y muestra ambos por pantalla.
$correo="danielcaballero@ikasle.eus";
echo "El correo es: $correo <br>";
$nombre;
$dominio;
$posicion_arroba=strpos($correo,'@');
$nombre=substr($correo,0,$posicion_arroba);
$dominio=substr($correo,$posicion_arroba+1);
echo "El nombre del correo es: $nombre <br>";
echo "El dominio del correo es: $dominio";

?>