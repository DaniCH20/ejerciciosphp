
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Tabla de Multiplicar</title>

</head>

<body>
    <h1>Muestra por pantalla todos los numero pares</h1>
    
    <?php
 $num =2;
    for ($i=3 ;$i<26 ;$i++){
        
        if($i==25){
        printf("%s", $i * $num);
        }else{
        printf("%s,", $i * $num);
        }

    }
?>
</body>

</html>