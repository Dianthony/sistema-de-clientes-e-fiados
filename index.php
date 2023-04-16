<!DOCTYPE html>
<html>
	<head>
		<?php session_start(); 

		if (isset($_SESSION['nome'])) {
			if ((isset($_SESSION['nome']) == true) and (isset($_SESSION['senha']) == true)){
				$nome = $_SESSION['nome'];
				$id = $_SESSION['id'];
			}
		}
		?>
		<title>Art'Print</title>
		<link rel="icon" type="image/x-icon" href="imagens/logo-empresa.png">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-sclae=1.0">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
		<script type="text/javascript" src="bootstrap/js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="modal fade" id="log" tabindex="-1" role="dialog" aria-labelledby="logModalLabel" area-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="logModalLabel">Login</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form name='login' method='post' action='acessar.php'>		
								<input type='text' class="form-control" name='login' placeholder='Usuário' required>	<br>
								<input type='password' class="form-control" name='senha' placeholder='Senha' required>	<br>
								<input type='submit' class="btn btn-success form-control" name='enviar' value='Acessar Sistema'></form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<center><section>
					<?php 
						if (isset($_SESSION['msg'])) {
							echo $_SESSION['msg'];
							unset($_SESSION['msg']);
						}
					?>
				</section></center>
			</div>
			<div class="row">
				<div class="col-4 col-sm-2" id="header">
					<h1>
					<a href="#"><img src="imagens/logo-empresa-contorno.png"></img></a>
					</h1>
				</div>
				<div class="col-4 col-sm-8" id="menu">
					<?php if (isset($nome)) { ?>
							<b><a href="#">Home <img src="imagens/icons/home.png"></a></b> |
							<a href="fiado.php">Fiados <img src="imagens/icons/fiado.png"></a> |
							<a href="cliente.php">Clientes <img src="imagens/icons/cliente.png"></a> |
							<a href="sair.php"> Sair <img src="imagens/icons/sair.png"></a>
					<?php	} else{ ?>
							<a href="#" data-toggle="modal" data-target="#log">Home <img src="imagens/icons/home.png"></a> |
							<a href="#" data-toggle="modal" data-target="#log">Fiados <img src="imagens/icons/fiado.png"></a> |
							<a href="#" data-toggle="modal" data-target="#log">Clientes <img src="imagens/icons/cliente.png"></a>
					<?php } ?>
				</div>
				<div class="col-4 col-sm-2" id="header2">
					<?php if (isset($nome)) { ?>
						<span>
						<img src="imagens/icons/usuario.png">
						<?php	echo strtoupper($nome); ?></span>
						<?php } else { ?> 
						<button type="button" data-toggle="modal" data-target="#log" class="btn btn-warning">Fazer Login</button>
					<?php } ?>
				</div>
			</div>
			<div class="row">
				<div class="col-1 col-sm-2">
					
				</div>
				<div class="col-10 col-sm-8" id="homebody">
					<h1>
					<b>CONTROLE DE CLIENTES</b>
					</h1>
					<img src="imagens/logo-empresa-contorno.png"></img>
				</div>
				<div class="col-1 col-sm-2">
					
				</div>
			</div>
			
			<div class="row">
				<div class="col-12" id="baseboard">
					<br>
					Copyrigth - 2023
				</div>
			</div>
		</div>
	</body>
</html>