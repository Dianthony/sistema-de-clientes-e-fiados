<?php
	session_start();

	unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['senha']);
	header("location:index.php");
?>