<?php
$nombre1 = "Elisabet";
$apellido1 = "Lekue";
$apellido2 = "Alkorta";
$name = $nombre1 . " " . $apellido1 . " " . $apellido2;
const nombrePermitido = "Elisabet Lekue Alkorta";

if (substr_count(nombrePermitido, $name)) { //respuesta simple
    printf('Bienvenida %s', nombrePermitido);
    echo '<br>';
} else {
    printf("Acceso denegado %s", $nombre1);
}
if (substr_count(nombrePermitido, $nombre1) && 
    substr_count(nombrePermitido, $apellido1) &&    
    substr_count(nombrePermitido, $apellido2)) { //respuesta compleja

    printf('Bienvenida %s', nombrePermitido);
    echo '<br>';
} else {
    printf("Acceso denegado %s", $nombre1);
}
?>
