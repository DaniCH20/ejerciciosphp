<?php
$intentos=rand(1,5);
acces($intentos);
function acces($intentos){

    if($intentos==0){
        echo"Lastima te quedaste sin intentos";
    }else{
        $num=rand(0,1);
        if($intentos==$num){
             echo (horario());
            echo " acceso permitido<br>";
            include "ejer2-35b.php";
        }else{
            $intentos--;
            echo"Acceso denegado <br>";
            echo"Intentos restantes $intentos<br>";
            acces($intentos);
        }

    }
    
}
function horario(){
    $hora=date("h");
    echo $hora;
    if($hora>6 && $hora<12){
        return "BUENOS DIAS";
    }else if($hora>13 && $hora<18){
        return "BUENAS TARDES";
    }else{
        return "BUENOS NOCHES";
    }
}

?>