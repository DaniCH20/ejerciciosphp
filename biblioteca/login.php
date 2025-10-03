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
        <h2>Opciones</h2>
        
   
<?php
include 'coneccion.php';

// Recibir datos del formulario
$user = $_POST["username"];
$pass = $_POST["password"];

// Realiza una consulta
$consulta = "SELECT * FROM usuarios WHERE nombre_usuario='$user' AND contrasena='$pass'";
$resultado = mysqli_query($connection, $consulta);

// Verificar si hay filas 
if ($resultado->num_rows > 0) {
  echo '<p class="exito">Usted está registrado!</p>';
    
} else {
    echo '<p class="error">¡Necesitas registrarte!</p>';
    echo '<a href="../crearCuenta.html">Ir a Registrarte</a><br>';
    echo '<a href="../login.html">Volver a intentar</a>';
}
// Cerrar la conexión
$connection->close();

?>      
    <li class="boton">
        <a href="./nuevo.php">Insertar Nuevo Libro</a>
    </li>
    <li class="boton">
            <a href="./consulta.php">Consulta de libros</a>
        </li>
    <li class="boton">
        <a href="./buscar.php">Buscador</a>
    </li>
    
    </main>
</body>
</html>