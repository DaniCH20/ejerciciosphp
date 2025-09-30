<html>
<head>
    <title>Ejercicio 3 - Parte 2</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Introduce todos tus datos</h1>
    <form action="ejer3-p2.php" method="post">
        <label for="name">Nombre</label>
        <input type="text" id="name" name="name" required><br>
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido" required><br>
        <label for="edad">Edad</label>
        <br>
        <input type="radio" id="edad" name="edad" value=15>0 - 15<br>
        <input type="radio" id="edad" name="edad" value=30>15 - 60<br>
        <input type="radio" id="edad" name="edad" value=60>60 - 100<br>
        <p for="medio">¿Que medio de transporte usas?</p>
        <input type="radio" name="medio" value="coche">coche<br>
        <input type="radio" name="medio" value="moto">moto<br>
        <input type="radio" name="medio" value="bicicleta">bicicleta<br>
        <input type="radio" name="medio" value="transporte_publico">transporte público<br>
        <br>
        <label for="fecha">Fecha de alta</label>
        <input type="date" id="fecha" name="fecha" required><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $apellido = htmlspecialchars($_POST['apellido']);
    $edad = $_POST['edad'];
    $medio =$_POST['medio'];
    $fecha = $_POST['fecha'];
    if($name == "" || $apellido == ""){
        echo "<p>Por favor, completa todos los campos del formulario.</p>";
        exit;
    }
    if ($edad == 15) {
        echo "<p>Hola $name $apellido, eres muy joven , no te apetece viajar el  $fecha </p>";
        echo"$fecha";
    }else if ($edad== 30) {
        echo "<p>Hola $name $apellido, de verdad te gusta ir en $medio , en ese caso te espero el dia $fecha </p>";
        echo"$fecha";
    }else{
        echo "<p>Hola $name $apellido, disfruta de tu viaje no te exigas mucho y no te olvides llevar tus pastillas para el dia $fecha  </p>";
        echo"$fecha";
    }
}
?>