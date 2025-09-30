<form action="ejer3-p1.php" method="post">
    <label for="num">Ingrese el primer valor:</label>
    <input type="text" id="num1" name="num1" required>
    <br>
    <label for="num">Ingrese el segundo valor:</label>
    <input type="text" id="num2" name="num2" required>

    <br>
    <div>
        <p>Seleccione la operacion a realizar:</p>
            
           <input type="radio" id="operacion" name="operacion" value="suma">
            <label for="suma">Suma</label><br>
           <input type="radio" id="operacion" name="operacion" value="resta">
           <label for="resta">Resta</label><br>
    </div>
    <input type="submit" value="Enviar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = htmlspecialchars($_POST['num1']);
    $num2 = htmlspecialchars($_POST['num2']);
    $operacion = htmlspecialchars($_POST['operacion']);
    if(!empty($num1) && !empty($num2) && !empty($operacion)){
        if($operacion == "suma"){
            $resultado = $num1 + $num2;
            echo "El resultado de la suma es: " . $resultado;
        }elseif($operacion == "resta"){
            $resultado = $num1 - $num2;
            echo "El resultado de la resta es: " . $resultado;
        }else{
            echo "Operacion no valida.";
        }
    }
}else{
    echo "No se han recibido datos.";
}
?>