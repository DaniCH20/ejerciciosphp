<?php
include 'coneccion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && !empty($_POST['password'])) {
       $user = $_POST["username"];
        $pass = $_POST["password"];
  
        $insertar = "INSERT INTO usuarios ( nombre_usuario, contrasena)
        VALUES ('$user', '$pass')";
        if (mysqli_query($connection, $insertar)) {
            echo "Nuevo Usuario insertado correctamente";
        } else {
            echo "Error: " . $insertar . "<br>" . mysqli_error($connection);
        }
    } else {
       echo "<h2>No has rellenado todos los campos.</h2>";
    }
}

$connection->close();

?>