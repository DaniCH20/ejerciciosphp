<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>*****Biblioteca*****</h1>
    </header>
    <?php  $id = $_GET['id']; ?>
    <main>
        <h2>Eliminar Libro</h2>
        <form action='borrado.php?id=<?php echo $id; ?>' method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <p>¿Estás seguro de que deseas eliminar el libro <?php echo $id; ?>?</p>
            <button type='submit' name='confirmar' value='si'>Sí, eliminar</button>
            <button type='submit' name='confirmar' value='no'>No, cancelar</button>
        </form>
    </main>
</body>
</html>
<?php
include 'coneccion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['confirmar'])) {
        if ($_POST['confirmar'] === 'si') {
            $id = $_POST['id']; 
            $borrar = "DELETE FROM libros WHERE codigo='$id'";

            if (mysqli_query($connection, $borrar)) {
                echo "Registro eliminado correctamente. <a href='buscar.php'>Volver a la búsqueda</a>";
            } else {
                echo "Error al eliminar el registro: " . mysqli_error($connection);
            }
        } else {
            header("Location: consulta.php");
            exit();
        }
    }
}
?>