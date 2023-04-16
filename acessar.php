<?php
	require_once "conexão.php";
	session_start();

	$login = $_POST['login'];
	$password = $_POST['senha'];


	$sql = "select * from adm where nome='$login';";
	$busca = mysqli_query($conectar, $sql);
	$resultado = mysqli_fetch_assoc($busca);
		$id = $resultado['id'];
		$nome = $resultado['nome'];
		

	if(isset($resultado)){
		$senha = $resultado['senha'];
			if ($login != $nome || $password != $senha) {
				$_SESSION['msg'] = "<div id='message'>
				<b>Atenção!</b><br>
				Login ou senha inválidos.</div>";
				header("location:index.php");
			}
			else if($login == $nome && $password == $senha){
				$_SESSION['nome'] = $nome;
				$_SESSION['senha'] = $senha;
				$_SESSION['id'] = $id;
				header("location:index.php");
			}
	}
	if(isset($resultado) == ""){
		$_SESSION['msg'] = "<div id='message'>
		<b>Atenção!</b><br>
		Administrador não encontrado.</div>";
		header("location:index.php");
	}
?>