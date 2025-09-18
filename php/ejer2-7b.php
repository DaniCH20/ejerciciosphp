<?php
$nombre1 = "Beñat Lekue Alkorta";
$nombre2 = "Martina Atxa Mendoza";
$nombre3 = "Peio Martin Diz";
$nombre4 = "Elisabet Gil Alkorka";
mensaje($nombre1);
mensaje($nombre2);
mensaje($nombre3);
mensaje($nombre4);


function mensaje($n)
{
    $name = "Elisabet";
    $ape = "Lekue Alkorta";
    if (
        substr_count($n, $name) ||
        substr_count($n, $ape)
    ) {

        printf('Bienvenida %s', $n);
        echo '<br>';
    } else {
        printf("Acceso denegado %s", $n);
        echo '<br>';
    }
}
