<?php
	$host = "localhost";
	$name = "sistema";
	$user = "root";
	$password = "";

	$conectar = mysqli_connect($host, $user, $password);
	mysqli_select_db($conectar, $name) or die("Erro de comunicação com o Banco de Dados");
?>