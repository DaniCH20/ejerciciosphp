<!-- Crea 2 variables y realiza entre ellos las operaciones de suma , resta , multi y divi .
 Guarda el resultado de cada operacion en una variable distinta $sum , $resta, etc 
 Situa el codigo edentro del html y muestra el resultado en pantalla
  -->
<?php
echo '<h1>Operaciones matematicas en PHP </h1>';
$x = 3;
$y = 12;
printf("El primer operando es %u ", $x);
echo '<br>';
printf("El segundo operando es %u ", $y);
echo '<br>';
suma();
resta();
multi();
division();
function suma()
{
   global $x;
   global $y;
   $suma = $x + $y;
   printf("la suma de %u y %u es de %u", $x, $y, $suma);
   echo '<br>';
}
function resta()
{
   global $x;
   global $y;
   $suma = $y - $x;
   printf("la resta de %u y %u es %u ", $y, $x, $suma);
   echo '<br>';
}
function multi()
{
   global $x;
   global $y;
   $multi = $y * $x;
   printf("la multiplicacion de %u y %u es %u ", $y, $x, $multi);
   echo '<br>';
}
function division()
{
   global $x;
   global $y;
   $divi = $y / $x;
   printf("la division de %u y %u es %u ", $y, $x, $divi);
   echo '<br>';
}
?>