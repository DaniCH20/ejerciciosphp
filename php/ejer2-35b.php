<?php

$accion=rand(2,5);
echo "A continuacion se realizaran $accion acciones aleatorias";
accionesAleatorias($accion);
function accionesAleatorias($acciones){
     $acciones;
     $rondas=1;
    do{
    $opcion=rand(1,3);
    echo"Ronda $rondas";
        switch($opcion){
            case 1:
                mostratabla();
                $acciones--;
                break;
            case 2:
                mostrarImagenes();
                $acciones--;
                break;
            case 3:
                echo"Lastima no tenemos nada para ti intenta de nuevo";
                $acciones--;
                break;
        }
    }while($rondas != $acciones);
    
}
function mostratabla(){
    $num =rand(2,10);
    echo"Mostrar tabla de Multiplicar de $num";
    echo"<table style='border:3px solid black' >";
    for ($i=1 ;$i<10 ;$i++){
        printf("<tr><td style='border:1px solid black'> %s x %s </td> <td style='border:1px solid black'> %s</td></tr>",$i ,$num,$i * $num);
    }
    echo"</table>";

}
function mostrarImagenes(){

}

?>