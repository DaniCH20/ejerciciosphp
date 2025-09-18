<?php
$a=2;
printf("El valor de a es %u",$a);
     echo '<br>';
printf("El valor de a++ es %u",$a++);
        echo '<br>';
printf("El valor de a es %u",$a);
        echo '<br>';
printf("El valor de ++a es %u",++$a);
        echo '<br>';
printf("El valor de a++ es %u",$a++);
 echo '<br>';
echo '______________________________________________________________________________________';
$a3=3;
$b=5;
echo '<br>';
printf("El valor de a es %u",$a3);
 echo '<br>';
printf("El valor de b es %u",$b);
 echo '<br>';
$b=++$a3;
printf("Con la operacion b=++a el valor de a es %u el valor de b es %u",$a3  , $b);
$b=$a3++;
 echo '<br>';
printf("Con la operacion b=a++ el valor de a es %u el valor de b es %u",$a3  ,$b );
?>