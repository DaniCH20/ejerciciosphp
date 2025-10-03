<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
        <h1>*****Biblioteca*****</h1>
    </header>
    <main>
        <h2>Login</h2>
        <form  id="formulario" action="nuevo.php" method="post">
            <label for="title">Titulo:</label>
            <input type="text" id="title" name="title" required>
            <br>
            <label for="autor">Autor:</label>
            <input type="text" id="autor" name="autor" required>
            <br>
            <label for="disponible">Disponible:</label>
            <input type="checkbox" id="disponible" name="disponible" value=1>Si
             <input type="checkbox" id="disponible" name="disponible" value=0>No
            <br>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </main>
</body>
</html>

<?php

include 'coneccion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['autor']) && !empty($_POST['disponible']) && !empty($_POST['title'])) {
       $titulo = $_POST["title"];
        $autor = $_POST["autor"];
        $disponible = $_POST["disponible"];
        $insertar = "INSERT INTO libros (titulo, autor, disponible)
        VALUES ('$titulo', '$autor', '$disponible')";
        if (mysqli_query($connection, $insertar)) {
            echo "Nuevo libro insertado correctamente";
        } else {
            echo "Error: " . $insertar . "<br>" . mysqli_error($connection);
        }
    } else {
       echo "<h2>No has rellenado todos los campos.</h2>";
    }
}

$connection->close();

?>