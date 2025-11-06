<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3-5</title>
</head>

<body>
    <h1>Selecciona tus actividades de ocio</h1>
    <form action="ejer3-5.php" method="post">
        <input type="checkbox" name="actividades[]" value="Leer"> Leer<br>
        <input type="checkbox" name="actividades[]" value="Cine"> Cine<br>
        <input type="checkbox" name="actividades[]" value="Deporte"> Deporte<br>
        <input type="checkbox" name="actividades[]" value="VideoJuegos"> VideoJuegos<br>
        <input type="checkbox" name="actividades[]" value="Pasear"> Pasear<br>

        <br><br>
        <input type="submit" value="Mostrar Seleccionadas">
    </form>

</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['actividades']) && !empty($_POST['actividades'])) {
        $actividades = $_POST['actividades'];
        echo "<h2>Actividades seleccionadas:</h2>";
        echo "<ul>";
        foreach ($actividades as $actividad) {
            echo "<li>" . $actividad . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<h2>No has seleccionado ninguna actividad.</h2>";
    }
}

?>