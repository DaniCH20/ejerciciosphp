<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Tabla de Multiplicar</title>

</head>

<body>
    <h1>Tabla de Multiplicar</h1>
    
    <table style="border:3px solid black" ><?php
    
    $num =3;
     $i=0;
    do {
       $i++;
        printf("<tr><td style='border:1px solid black'> %s x %s </td> <td style='border:1px solid black'> %s</td></tr>",$i ,$num,$i * $num);
        
    }while($i<10);
    
?>
        <thead>
            <tr>
                <th>Operaciones</th>
                <th>Resultados</th>
            </tr>
        </thead>
    </table>
</body>

</html>