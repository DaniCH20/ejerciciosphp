
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Tabla de Multiplicar</title>

</head>

<body>
    <h1>Muestra por pantalla todos los numero del 1 al 10</h1>
    
    <?php
    $num =3;
    $min=1;
    $max=10;
    $random=0;
    $intentos=0;
    do {
        $intentos++;
        $random = rand($min, $max);

        printf("Intento %d: salió el número %d<br>", $intentos, $random);

        if ($random == $num) {
            printf("<b>Felicidades, acertaste en el intento %d. El número era %d</b><br>", $intentos, $num);
            break; // salir del bucle no olvidar
        } else {
            printf("No es el número, probemos de nuevo...<br><br>");
        }

        if ($intentos == 5) {
            printf("<b>Te quedaste sin intentos. El número era %d</b>", $num);
        }

    } while ($intentos < 5);
?>
</body>

</html>