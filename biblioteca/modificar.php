<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>*****Biblioteca*****</h1>
    </header>
    <main>
        <h2>Modificar datos del libro</h2>
        
    </main>
</body>
</html>
<?php
include 'coneccion.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];

   
    $sql = "SELECT * FROM libros WHERE codigo = '$id'";
    $resultado = mysqli_query($connection, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $libro = mysqli_fetch_assoc($resultado);
        echo "<form action='modificar.php?id=$id' method='post'>
                <label for='title'>Titulo:</label>
                <input type='text' id='title' name='title' value='{$libro['titulo']}' required>
                <br>
                <label for='autor'>Autor:</label>
                <input type='text' id='autor' name='autor' value='{$libro['autor']}' required>
                <br>
                <label for='disponible'>Disponible:</label>
                <input type='checkbox' id='disponible' name='disponible'" . ($libro['disponible'] ? ' checked' : '') . ">
                <br>
                <button type='submit'>Guardar Cambios</button>
              </form>";
    } else {
        echo "Libro no encontrado.";
        exit;
    }
} else {
    echo "ID no proporcionado.";
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["title"];
    $autor = $_POST["autor"];
    $disponible = isset($_POST["disponible"]) ? 1 : 0;

    $actualizar = "UPDATE libros SET titulo='$titulo', autor='$autor', disponible=$disponible WHERE codigo='$id'";

    if (mysqli_query($connection, $actualizar)) {
        echo "Registro actualizado correctamente. <a href='buscar.php'>Volver a la búsqueda</a>";
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($connection);
    }
}
?>