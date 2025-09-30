<?php
echo "<h1>Color seleccionado</h1>";
if (isset($_POST['radio'])) {
    $color = $_POST['radio'];
    echo "<div style='width:100px; height:100px; background-color:#$color; border:1px solid #000;'></div>";
    echo "<p >Has seleccionado el color: <strong style='color:$color'>$color</strong></p>";
    echo "<a href='ejer4.php'>Selecciona otro color</a>";
} else {
    echo "<p>No has seleccionado ningún color.</p>";
    echo "<a href='ejer4.php'>Selecciona otro color</a>";
}
?>