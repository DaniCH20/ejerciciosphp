<?php
 include 'functions.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST["id"] ?? '';
    $eliminar = $_POST["eliminar"] ?? '';
    $modificar = $_POST["modificar"] ?? '';
}
if($eliminar=="eliminardeVeras"){
    eliminarMascota($id);
}
if($modificar!=""){
    modificarMascota($id , $modificar);
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
            <?php $eliminar && printf('<p class="errorText">Esta seguro de que quiere eliminar la mascota ? </p>'); ?>
            <?php
            if ($id != "") {
                getPetById($id , $eliminar , $modificar);
            }else{
                echo '<p class="info">No hay informacion disponible.</p>';
            }
            ?>
        </section>
      
       
    </main>
    <?php include("footer.php") ?>
</body>
</html>
