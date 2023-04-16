<?php
	session_start();
	require_once "conexão.php";

	$id = $_POST['idc'];
	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
	$contato = $_POST['contato'];
	$logradouro = $_POST['logradouro'];
	$bairro = $_POST['bairro'];
	$complemento = $_POST['complemento'];
	$cidade = $_POST['cidadeuf'];

	$sql = "UPDATE cliente SET nome='$nome', contato='$contato', cpf='$cpf', logradouro='$logradouro', bairro='$bairro', complemento='$complemento', cidadeuf='$cidade' WHERE id=$id";
	mysqli_query($conectar, $sql);
	header("Location:editarcliente.php?idcliente=$id");
?>