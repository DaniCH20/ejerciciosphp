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
        <h2>Consulta de todos los Libros</h2>
        
    </main>
</body>
</html>
<?php

include 'coneccion.php';
        $consulta = "SELECT * FROM libros"; 
        if (mysqli_query($connection, $consulta)) {
            echo "Nuevo libro insertado correctamente";
            $result = mysqli_query($connection, $consulta);
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
            echo "Error: " . $consulta . "<br>" . mysqli_error($connection);
        }


$connection->close();
?>