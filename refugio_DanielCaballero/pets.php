<?php   include("functions.php");?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pets</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <header>
        <?php include("header.php") ?>
    </header>
    <main>
        <section>
            <h2>Mascotas para adoptar</h2>
            <?php
            getMascotas();
            ?>
        </section>
        <section>
            <h2>Mascotas adoptadas</h2>
            <?php
            getPetsAdopt();
            ?>
        </section>


    </main>
    <?php include("footer.php") ?>
</body>

</html>