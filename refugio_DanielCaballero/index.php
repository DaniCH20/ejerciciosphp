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
            <p>
                Aqui encontraras mascotas que puedes llevar a tu casa . Nuestro objetivo es dar una segunda oportunidad  a cada animal y reunirnos con familias adecuadas
            </p>
            <h2>Razas y total de mascotas</h2>
            <?php
            include("functions.php"); 
              $mascotas=[];
              $mascotas=getAllBreeds();
            print_r($mascotas);
            
            foreach($mascotas as $mas=>$cantidad){
                printf("<p>%d , %d </p><br>",$mas, $cantidad);
            }
            $adopcion=[];
            $adopcion= getAdoptionPercentage();
            
            ?>
        </section>
      
       
    </main>
    <?php include("footer.php") ?>
</body>
</html>