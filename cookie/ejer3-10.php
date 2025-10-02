<html>
<head>
    <title>Set Cookie Example</title>
</head>
<body>
<h1>Ejemplo de cookie</h1>
<?php
    if (isset($_COOKIE['date'])) {
        echo "<p>Su ultima sesion fue: " . htmlspecialchars($_COOKIE['date']) . "</p>";
    } else {
        echo "<p>No tienes una sesion iniciada</p>";
    }
    ?>
    <?php

    setcookie("date", date("Y-m-d H:i:s"), time() + 36, "/");

    if(isset($_COOKIE["date"])) {
        echo "Cookie ha sido creada!<br>";
        echo "Se ha creado o actualizado la ultima sesion:" . $_COOKIE["date"];
    } else {
        echo "No se ha creado la cookie!";
    }
    ?>
</body>
</html>


