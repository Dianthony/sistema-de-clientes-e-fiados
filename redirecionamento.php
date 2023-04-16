<?php 
	session_start();

	$caminho = $_POST['pag'];

	if ($caminho == 1) {
		header("location: cliente.php");
	}
	else if ($caminho == 2){
		header("location: cadastrocliente.php");
	}

?>