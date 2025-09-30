<?php
$nombre = $_GET['name'];
$telefono = $_GET['telefono'];
$email = $_GET['email'];
$mensaje = $_GET['mensaje'];
$thank="gracias.html";
$mostrar="nombre:".$nombre."<br>"."telefono:"
.$telefono."<br>"."email:".$email."<br>"."mensaje:"
.$mensaje;
echo $mostrar;
?>