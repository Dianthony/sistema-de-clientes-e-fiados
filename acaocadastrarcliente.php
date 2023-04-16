<?php
	session_start();
	require_once "conexão.php";

	$nomecliente = $_POST['nome'];
	$contatocliente = $_POST['contato'];
	$cpfcliente = $_POST['cpf'];
	$logracliente = $_POST['logradouro'];
	$bairrocliente = $_POST['bairro'];
	$complementocliente = $_POST['complemento'];
	$cidadecliente = $_POST['cidadeuf'];

	$sql = "INSERT INTO cliente VALUES(0,'$nomecliente', '$contatocliente', '$cpfcliente', '$logracliente', '$bairrocliente', '$complementocliente', '$cidadecliente')";
	mysqli_query($conectar, $sql);	

	header("Location: cadastrocliente.php");
	$_SESSION['msg'] = "Cliente $nomecliente cadastrado com sucesso!";
	
?>