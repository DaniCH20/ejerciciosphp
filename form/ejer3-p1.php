<form action="ejer3-p2.php" method="post">
    <label for="num">Ingrese el primer valor:</label>
    <input type="text" id="num1" name="num1" required>
    <br>
    <label for="num">Ingrese el segundo valor:</label>
    <input type="text" id="num2" name="apellido" required>

    <br>
    <div>
         <label for="operacion">Seleccione la operación:</label><br>

             <label for="suma">Suma</label><br>
           <input type="checkbox" id="suma" name="operacion" value="suma">
            <label for="resta">Resta</label><br>
           <input type="checkbox" id="resta" name="operacion" value="resta">
        
       
        
       
       

    </div>
    <input type="submit" value="Enviar">
</form>

<?php

?>