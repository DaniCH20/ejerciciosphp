<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Refugio de Mascotas</title>
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
                Aquí encontrarás mascotas que puedes llevar a tu casa. 
                Nuestro objetivo es dar una segunda oportunidad a cada animal y reunirlos con familias adecuadas.
            </p>

            <h2>Razas y total de mascotas</h2>

            <table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr valign="top">
                    <!-- Columna izquierda -->
                    <td width="50%">
                        <h2>🐾 Top 3 Razas Más Populares</h2>
                        <?php
                        include("functions.php"); 

                        $populares = getPopularBreeds();
                        $razas = getAllBreeds();
                        
                        foreach ($populares as $raza => $cantidad) {
                            printf("<p><strong>%s</strong>: %d mascotas</p>", $raza, $cantidad);
                        }
                        echo("<h2>Todas las razas</h2>");
                        foreach ($razas as $raza => $cantidad) {
                            printf("<p><strong>%s</strong>: %d mascotas</p>", $raza, $cantidad);
                        }
                        ?>
                    </td>

                    <!-- Línea divisoria -->
                    <td width="1" bgcolor="black"></td>

                    <!-- Columna derecha -->
                    <td width="50%">
                        <h2>📊 Situación de las adopciones</h2>
                        <?php
                        $adopcion = getAdoptionPercentage();

                        printf("<p>Adoptados: %s%%</p>", $adopcion['adoptados']);
                        printf("<p>Disponibles: %s%%</p>", $adopcion['disponibles']);
                        ?>
                    </td>
                </tr>
            </table>

        </section>
    </main>

    <?php include("footer.php") ?>
</body>
</html>
