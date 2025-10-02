<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3-9 - Cookies en PHP</title>
</head>

<body>
    <h1>Datos de Usuario</h1>
    <p>Este es un archivo HTML básico listo para usar PHP y cookies.</p>
    <form method="post" action="ejer3-9.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if (isset($_COOKIE['usuario'])) {
        echo "<p>Bienvenido de nuevo: " . htmlspecialchars($_COOKIE['usuario']) . "</p>";
    } else {
        echo "<p>No se ha encontrado la cookie 'usuario'. Por favor, ingrese su nombre.</p>";
    }
    ?>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
        $name= htmlspecialchars($_POST['nombre']);
        setcookie('usuario', $name, time() + 3600); 
        echo "<p>Cookie 'usuario' establecida con el valor: $name</p>";
    } else {
        echo "<p>Por favor, ingrese un nombre.</p>";
    }
}