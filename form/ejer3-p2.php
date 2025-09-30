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
        <input type="number" id="edad" name="edad" required><br>
        <label for="medio">Medio de transporte</label>
        <select id="medio" name="medio" required><br>
            <option value="coche">Coche</option>
            <option value="moto">Moto</option>
            <option value="bicicleta">Bicicleta</option>
            <option value="transporte_publico">Transporte público</option>
            <option value="a_pie">A pie</option>
        </select><br>
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
    $edad = htmlspecialchars($_POST['edad']);
    $medio = htmlspecialchars($_POST['medio']);
    $fecha = $_POST['fecha'];
    if($name == "" || $apellido == ""){
        echo "<p>Por favor, completa todos los campos del formulario.</p>";
        exit;
    }
    if ($edad < 15) {
        echo "<p>Hola $name $apellido, eres muy joven , no te apetece viajar el </p>";
        echo"$fecha";
    }else if ($edad >= 15 && $edad < 60) {
        echo "<p>Hola $name $apellido, de verdad te gusta ir en $medio , en ese caso te espero el dia </p>";
        echo"$fecha";
    }else{
        echo "<p>Hola $name $apellido, disfruta de tu viaje no te exigas mucho y no te olvides llevar tus pastillas para el dia </p>";
        echo"$fecha";
    }
}
?>