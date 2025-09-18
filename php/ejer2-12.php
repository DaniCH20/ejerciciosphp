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
    for ($i=0 ;$i<4 ;$i++){
        print('<tr>');
        if($i==0){
            printf("<td style='border:2px solid black'>  </td>");
        }else{
            printf("<td style='border:2px solid black'> %s </td>",$i );
        }
        
        
        for ($s=1 ;$s<5 ;$s++){
           if($i==0){
            printf("<td style='border:2px solid black'> %s </td>",$s);
        }else{
            printf("<td style='border:1px solid black'> %s - %s </td>",$i ,$s);
        }
            
        }
        print('</tr>');
    }
    
?>
    </table>
</body>

</html>