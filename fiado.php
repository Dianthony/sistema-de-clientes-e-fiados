<!DOCTYPE html>
<html>
	<head>
		<?php 
		ob_start();
		session_start(); 
		require_once "conexão.php";

		if (isset($_SESSION['nome'])) {
			if ((isset($_SESSION['nome']) == true) and (isset($_SESSION['senha']) == true)){
				$nome = $_SESSION['nome'];
				$id = $_SESSION['id'];
			}
		}
		?>
		<title>FIADOS</title>
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
				<div class="col-6 col-sm-2" id="header">
					<h1>
					<a href="index.php"><img src="imagens/logo-empresa-contorno.png"></img></a>
					</h1>
				</div>
				<div class="col-4 col-sm-8" id="menu">
					<?php if (isset($nome)) { ?>
							<a href="index.php">Home <img src="imagens/icons/home.png"></a> |
							<b><a href="#">Fiados <img src="imagens/icons/fiado.png"></a></b> |
							<a href="cliente.php">Clientes <img src="imagens/icons/cliente.png"></a> |
							<a href="sair.php"> Sair <img src="imagens/icons/sair.png"></a>
					<?php	} else{ ?>
							<a href="#" onclick="log();">Home</a> |
							<a href="#" onclick="log();">Fiados</a> |
							<a href="#" onclick="log();">Clientes</a>
					<?php } ?>
				</div>
				<div class="col-4 col-sm-2" id="header2">
					<?php if (isset($nome)){ ?>
						<span>
						<img src="imagens/icons/usuario.png">
						<?php	echo strtoupper($nome); ?></span>
						<?php } else { header("location:index.php"); } ?>
				</div>
			</div>
			<div class="row">
				<div class="col-1 col-sm-2">
					
				</div>
				<div class="col-10 col-sm-8" id="fiadobody">
					<form name="busca-cliente" method="post" action="fiado.php">  
						<table class="table">
							<thead class="thead-dark">
								<tr><th></th>
									<th>#</th>
									<th>NOME</th>
									<th colspan="2">
										<input type="text" name="cliente" placeholder="Digite o nome do cliente...">
										<button type="submit"><img src="imagens/icons/busca2.png"></button>
									</th>
								</tr>
							</thead>
							<tbody>
							<?php

							if($_POST){
								$nome = $_POST['cliente'];
								$sql = "SELECT * FROM cliente WHERE nome LIKE '%$nome%' ORDER BY nome ASC";
								$busca = mysqli_query($conectar, $sql);
								$row = mysqli_num_rows($busca);
								while ($resultado = mysqli_fetch_assoc($busca)) { ?>
										<tr><td></td>
											<td><?php echo $resultado['id'] ?></td>
											<td><?php echo $resultado['nome']  ?></td>
											<td><a href="verconta.php?idcliente=<?php echo $resultado['id'] ?>">Abrir Conta</a></td>
											<td></td>
										</tr>
									<?php }	
									if ($row == 0){ ?>
										<tr>
											<td colspan="6"> Nenhum resultado encontrado </td>
										</tr>
									<?php }
								}
							
							?>
					
							</tbody>
						</table>
					</form>
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