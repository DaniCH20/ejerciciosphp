<?php
 $camposMal = false;
    $camposVacios = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   

    include 'functions.php';

    $user = $_POST["username"] ?? '';
    $pass = $_POST["password"] ?? '';
    if ($user != "" && $pass != "") {
        if (login($user, $pass)) {

            header("Location: index.php");
        } else {
            $camposMal = true;
        }
    } else {
        $camposVacios = true;
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
        <h1>Iniciar Sesion</h1>
    </header>
    <main>
        <?php $camposMal && printf('<p class="errorText">Los datos son incorrectos . No tienes permiso</p>'); ?>
        <?php $camposVacios && printf('<p class="errorText">Los campos estan vacios por favor rellenelos</p>'); ?>
        <form  id="formulario" action="login.php" method="post">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </main>
</body>
</html>
