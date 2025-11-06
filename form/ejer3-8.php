<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3-8</title>
</head>

<body>
    <h1>Ejercicio 3-8</h1>
    <form action="ejer3-8.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre"><br>
        <label for="apellido">Apellido:</label><br>
        <input type="text" name="apellido"><br>
        <label for="edad">Edad:</label><br>
        <input type="text" name="edad"><br>
        <label for="archivo">Selecciona un archivo:</label><br>
        <input type="file" name="archivo" id="archivo" required>
        <br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $apellido = htmlspecialchars($_POST['apellido']);
    $edad = htmlspecialchars($_POST['edad']);
    $imagen = $_FILES['archivo'];
    echo "<h2>Datos de Alumnos:</h2>";
    echo "Nombre: " . $nombre . "<br>";
    echo "Apellido: " . $apellido . "<br>";
    echo "Edad: " . $edad . "<br><br>";
    echo "<h2>Imagen</h2>";
    echo "Nombre de la imagen: " . htmlspecialchars($imagen['name']) . "<br>";
    echo "Tipo de la imagen: " . htmlspecialchars($imagen['type']) . "<br>";
    echo "Tamaño de la imagen: " . htmlspecialchars($imagen['size']) . " bytes<br>";
    echo "Ruta temporal de la imagen: " . htmlspecialchars($imagen['tmp_name']) . "<br>";

    if (move_uploaded_file($imagen['tmp_name'], $imagen['name'])) {
        echo "La imagen se ha subido correctamente.<br>";
    } else {
        echo "Error al subir la imagen.<br>";
        var_dump(error_get_last());
    }
    echo "<img src='" . htmlspecialchars($imagen['name']) . "' alt='Imagen subida' style='max-width:300px;'><br>";
}


?>