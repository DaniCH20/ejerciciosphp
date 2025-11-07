<header>
    <link rel="stylesheet" href="style.css">
    <h1>Refugio de Animales</h1>
    
    <section class="header">
    <?php 
        session_start();
        if(isset($_SESSION['user_id'])){
            echo"
            <ul>
                <li><a href='index.php'>Inicio</a></li>
                <li><a href='pets.php'>Mascotas</a></li>
                <li><a href='sessionClose.php'>Cerrar Sesion</a></li>
                <li><a >Hola ".$_SESSION['username']. "</a></li>
            </ul>
            ";
        }else{
             echo"
            <ul>
                <li><a href='index.php'>Inicio</a></li>
                <li><a href='pets.php'>Mascotas</a></li>
                <li><a href='login.php'>Iniciar Sesion</a></li>
            </ul>
            ";
        }
    ?>
    
            
    </section>
</header>