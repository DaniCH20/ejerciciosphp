<?php
//Diseña una funcion que calcule el iva de un producto
function iva¨($precio,$iva=0.21) {
    return $precio * (1 + $iva);
}
echo"Precio con 21% de IVA :". iva¨(100) . "<br>";
?>