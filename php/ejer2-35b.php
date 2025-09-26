<?php

$accion=rand(2,5);
echo "A continuacion se realizaran $accion acciones aleatorias.<br>";
accionesAleatorias($accion);
function accionesAleatorias($acciones){
     $rondas=1;
      $resumen= array(0,0,0);
    do{
    $opcion=rand(1,3);
    echo"Ronda $rondas <br>";
        switch($opcion){
            case 1:
                mostratabla();
                $acciones--;
                $rondas++;
                $resumen[0] += 1;
                break;
            case 2:
                mostrarImagenes();
                $acciones--;
                $rondas++;
                $resumen[1] += 1;
                break;
            case 3:
                echo"Lastima no tenemos nada para ti intenta de nuevo.<hr><br>";
                $acciones--;
                $rondas++;
                $resumen[2] += 1;
                break;
        }
    }while($acciones>0);
    resumen($resumen);
}
function mostratabla(){
    $num =rand(2,10);
    echo"Mostrar tabla de Multiplicar del numero $num";
    echo"<table style='border:3px solid black' >";
    for ($i=1 ;$i<10 ;$i++){
        printf("<tr><td style='border:1px solid black'> %s x %s </td> <td style='border:1px solid black'> %s</td></tr>",$i ,$num,$i * $num);
    }
    echo"</table><hr>";

}
function mostrarImagenes(){
     echo"Mostrar Imagenes<br>";
    echo"<table style='border:3px solid black' >";
    for ($i=1 ;$i<3 ;$i++){
        printf("<tr><td style='border:1px solid black'><img src='pollo.jpg'/></td> <td style='border:1px solid black'> <img src='pollo.jpg'/></td></tr>");
    }
    echo"</table><hr>";
    echo"<br><hr>";
}
function resumen($resumen){
    echo"<b>Resumen de opciones mostradas<b><br>";
    echo"Opcion1:Tabla multiplicar  ";
    printf($resumen[0]);
     echo" veces <br>  ";
     echo"Opcion2:Imagen  ";
    printf($resumen[1]);
     echo" veces <br>  ";
     echo"Opcion sin mostrar nada ";
    printf($resumen[2]);
     echo" veces <br>  ";
}

?>
