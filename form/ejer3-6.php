<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3-6</title>
</head>

<body>
    <h1>Ejercicio 3-6</h1>
    <form action="ejer3-6.php" method="post" enctype="multipart/form-data">
        <label for="archivo">Selecciona un archivo:</label><br>
        <input type="file" name="archivo" id="archivo" required>
        <br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_FILES["archivo"] as $key => $value) {
        echo "<strong>Propiedad Clave: " . htmlspecialchars($key) . ":</strong> " . htmlspecialchars($value) . "<br>";
    }
}


?>