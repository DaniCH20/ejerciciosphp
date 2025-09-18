<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Fecha formateada</title>

</head>

<body>
    <h1>Fecha formateada</h1>
    <?php
    date_default_timezone_set('Europe/madrid');
    setlocale(LC_ALL, "es_ES"); //Si el setlocale no funciona usar los arrays
    $diassemana = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
    $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    echo $diassemana[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y');
    $mes=date('n');
    $dia=date('w');
    echo('<br>');
    switch ($dia){
        case 1:
            echo('Lunes ');
            break;
        case 2:
            echo('Martes ');
            break;
        case 3:
            echo('Miercoles ');
            break;    
        case 4:
            echo('Jueves ');
            break;
        case 5:
            echo('Viernes ');
            break;
        case 6:
            echo('Sabado ');
            break;
        case 7:
            echo('Domingo ');
            break;
        default:
            print('Fin de semana');
    }
    switch($mes){
        case 1:
            echo('Enero');
            break;
        case 2:
            echo('Febrero');
            break;
        case 3:
            echo('Marzo');
            break;    
        case 4:
            echo('Abril');
            break;
        case 5:
            echo('Mayo');
            break;
        case 6:
            echo('Junio');
            break;
        case 7:
            echo('Julio');
            break;
        case 8:
            echo('Agosto');
            break;
        case 9:
            echo('Septiembre');
            break;
        case 10:
            echo('Octubre');
            break;
        case 11:
            echo('Nobiembre');
            break;
        case 12:
            echo('Diciembre');
            break;
        default:
            print('Fin de Año');
    }

    ?>
</body>

</html>