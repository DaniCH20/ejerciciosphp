<h1>Formulario de Alta</h1>
<form action="ejer3.php" method="post">
    <label for="user">Usuario:</label>
    <input type="text" id="user" name="user"><br><br>
    <label for="pass">Contraseña:</label>
    <input type="password" id="pass" name="pass"><br><br>
    <input type="submit" value="Enviar">
</form>
<?php
// processa_form.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = htmlspecialchars($_POST['user']);
    $pass = htmlspecialchars($_POST['pass']);
    if(!empty($user) && !empty($pass)){
        echo "Usuario: " . $user . "<br>";
        echo "Contraseña: " . str_repeat('*', strlen($pass)) . "<br>"; 
    }else{
        echo "Por favor, complete ambos campos.";
    }
}else{
    echo "No se han recibido datos.";
}


?>
