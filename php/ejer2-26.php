<?php
//ejer 26 : Acertar un numero y mediante un array controlaremos que esta ves no se repita ningun numero
 $num =3;
 
    $random=0;
    $intentos=0;
    $numeros_salidos = array();
    do {
        $intentos++;
        $random = rand(1, 10);

        printf("Intento %d: salió el numero %d<br>", $intentos, $random);
        if (in_array($random, $numeros_salidos)) {
            printf("Has vuelto a introducir el numero %d te quedan %d intentos<br><br>", $random,$intentos);
            $intentos--; // le restamos 1 a los intentos
            continue; // saltar a la siguiente iteración del bucle
        }
        if ($random == $num) {
            printf("<b>Felicidades, acertaste en el intento %d. El número era %d</b><br>", $intentos, $num);
            break; // salir del bucle no olvidar
        } else {
            printf("No es el numero, probemos de nuevo...<br><br>");
            $numeros_salidos[] = $random; // añadir el número al array de números salidos
        }

        if ($intentos == 5) {
            printf("<b>Te quedaste sin intentos. El numero era %d</b>", $num);
        }

    } while ($intentos < 5);
?>