<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   

    include 'functions.php';

    $id = $_POST["id"] ?? '';
  
    if ($id != "") {
        if (getPetById($id)) {
        }
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
        <?php include("header.php") ?>
    </header>
    <main>
        <section>
            <h2>Bienvenid@ a nuestro refugio!!!</h2>
            
            <?php
            
            ?>
        </section>
      
       
    </main>
    <?php include("footer.php") ?>
</body>
</html>
