<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3-7</title>
</head>

<body>
    <h1>Ejercicio 3-7</h1>
    <form action="ejer3-7.php" method="post" enctype="multipart/form-data">
        <label for="archivo">Selecciona un archivo:</label><br>
        <input type="file" name="archivo" id="archivo" required>
        <br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $archivo = $_FILES["archivo"];
    if ($archivo["size"] >= 1500) {
        echo "El archivo es demasiado grande. El tamaño máximo permitido es 1500 bytes.";
    } else {
        echo "El archivo se ha subido correctamente.<br>";
    }
}


?>