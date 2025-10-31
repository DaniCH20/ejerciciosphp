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
        <h1>*****Login*****</h1>
    </header>
    <main>
        <h2>Opciones</h2>
        
   
<?php
include 'conection.php';

// Recibir datos del formulario
$user = $_POST["username"];
$pass = $_POST["password"];

// Realiza una consulta
$consulta = "SELECT * FROM users WHERE name='$user' AND password='$pass'";
$resultado = mysqli_query($connection, $consulta);

// Verificar si hay filas 
if ($resultado->num_rows > 0) {
  echo '<p class="exito">Usted está registrado!</p>';
  
  echo' 
    
    </main>
</body>
</html>';
    
} else {
    echo '<p class="error">¡Necesitas registrarte!</p>';
}
// Cerrar la conexión
$connection->close();

?>      
   