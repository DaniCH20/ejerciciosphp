<?php
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
echo"<h1>Informacion Enviada</h1>";

if(isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['apellido'])&& !empty($_POST['apellido'])){
    echo "Bienvenido $nombre $apellido <br>";
    if(isset($_POST['email']) && !empty($_POST['email'])) {
        echo "Tu email es " . $_POST['email'];
    }
}else{
    echo "Hubo un error al recibir los datos";
    echo "<a href='ejer2.php'>Volver a rellenar el formulario</a>";
}
?>