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
        <h2>Busca el libro que desees</h2>
        <form  id="formulario" action="buscar.php" method="post">
            <label for="title">Titulo:</label>
            <input type="text" id="title" name="title" required>
            <br>
            <label for="autor">Autor:</label>
            <input type="text" id="autor" name="autor" required>
            <button type="submit">Buscar</button> 
    </main>
</body>
</html>
<?php

include 'coneccion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (isset($_POST['autor']) && !empty($_POST['title'])) {
       $titulo = $_POST["title"];
        $autor = $_POST["autor"];
        $buscado = "select * from libros where titulo='$titulo' or autor='$autor';";
        if (mysqli_query($connection, $buscado)) {
            $result = mysqli_query($connection, $buscado);
            if (mysqli_num_rows($result) > 0) {
                echo "<table><tr><th>ID</th><th>Titulo</th><th>Autor</th><th>Disponible</th><th></th><th></th></tr>";
                while($row = mysqli_fetch_assoc($result)) {
                    $disponible = $row["disponible"] ? "Si" : "No";
                    echo "<tr><td>" . $row["codigo"]. "</td><td>" . $row["titulo"]. "</td><td>" . $row["autor"]. "</td><td>" .  $disponible. "</td><td><a href='./modificar.php'>Modificar</a></td><td><a href='./borrado.php'>Borrar</a></td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
        } else {
            echo "Error: " . $buscado . "<br>" . mysqli_error($connection);
        }
    } else {
       echo "<h2>No has rellenado todos los campos.</h2>";
    }
}

?>