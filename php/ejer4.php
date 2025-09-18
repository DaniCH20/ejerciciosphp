<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Información del Alumno</title>
    <?php
        const universidad = "Euskal Herriko Unibertsitatea";
        const creditos_grado = 240;
        const precio_curso = 1230.75;

        $nombre_alumno = "Daniel";
        $creditos_actuales = 45;
        $nota_media = 7.8;
        $curso_finalizado = false;
    ?>
</head>
<body>
    <h1>Hola mundo</h1>

    <h2>Información del Alumno</h2>
    <p>Nombre del alumno: <?php print($nombre_alumno); ?></p>
    <p>Universidad: <?php print(universidad); ?></p>
    <p>Créditos hasta el momento: <?php print(($creditos_actuales / creditos_grado) * 10); ?></p>
    <p>Nota media: <?php print($nota_media); ?></p>
    <p>Curso finalizado: 
        <?php 
            echo ($curso_finalizado?"SI":"NO")
        ?>
    </p>
    <p>Pagar: <?php print(precio_curso); ?> €</p>
</body>
</html>
