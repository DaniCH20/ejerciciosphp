<?php
$text="This is a test";
echo strlen($text);
echo $text[strlen($text)-1];//el último carácter de "This is a test", que es "t"
echo substr_count($text ,'is');//Busca cuántas veces aparece 'is'
echo substr_count($text ,'is',3);//A partir del índice 3 aparece 1 vez "is"
echo substr_count($text ,'is',3,3);
echo substr_count($text ,'is',5,9);
echo substr_count("Hello World. The world is nice","world");
?>