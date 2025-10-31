<?php
	define('SERVER', "localhost:3306"); 
	define('USER', "root"); 
	define('PASSWORD',"");
	define('DATABASE',"labora"); 

   
	$connection = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);

	if (!$connection) {
		die("No se puede conectar: " . mysqli_connect_errno() . " : " . mysqli_connect_error());
	}


?>
