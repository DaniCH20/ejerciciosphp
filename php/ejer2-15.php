
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Tabla de Multiplicar</title>

</head>

<body>
    <h1>Muestra por pantalla todos los numero del 1 al 10</h1>
    
    <?php
    $num =0;
    do {
        $num++;
        printf("%s,", $num);
    }
    while ($num<10);
?>
</body>

</html>