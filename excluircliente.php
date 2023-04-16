<?php
	require_once "conexão.php";
	session_start();

	$id = $_GET['excluir'];

	$sql = "DELETE FROM cliente WHERE id=$id;";
	$sql2 = "DELETE FROM fiado WHERE id_cliente=$id;";
	mysqli_query($conectar, $sql);
	mysqli_query($conectar, $sql2);

	header("Location: cliente.php");

	$_SESSION['msg'] = "Cliente '$id' deletado com sucesso!";
?>