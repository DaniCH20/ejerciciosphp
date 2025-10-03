<?php
	define('SERVER', "localhost:3306"); // Servidor al que nos vamos a conectar con el puerto en el que tenemos instalado el mysql
	define('USER', "root"); // Usuario de BBDD
	define('PASSWORD',""); // contraseña de BBDD en texto plano (en un proyecto real no deberiamos guardarlo asi)
	define('DATABASE',"db_biblioteca"); // base de datos a la que nos vamos a conectar

    // sql para crear el usuario (a realizar en la BBDD Mysql Workbench)
	// create user "mikel"@"localhost" IDENTIFIED BY "passwd123";
	// grant all privileges on empresadamtarde.* TO "mikel"@"localhost";

    // vamos a conectarnos a la base de datos con los campos descritos previamente
	$connection = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);

    // si no se puede conectar mostramos el error
	if (!$connection) {
		die("No se puede conectar: " . mysqli_connect_errno() . " : " . mysqli_connect_error());
	}else{
        // descomentar para probar
		 echo '<p>Si se pudo conectar</p><br>';
		 
	}


?>
