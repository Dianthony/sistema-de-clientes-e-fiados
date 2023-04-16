<!DOCTYPE html>
<html>
	<head>
		<?php session_start(); 
		require_once "conexão.php";

		if (isset($_SESSION['nome'])) {
			if ((isset($_SESSION['nome']) == true) and (isset($_SESSION['senha']) == true)){
				$nome = $_SESSION['nome'];
				$id = $_SESSION['id'];
			}
		}
		?>
		<title>CLIENTES</title>
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
							<a href="fiado.php">Fiados <img src="imagens/icons/fiado.png"></a> |
							<b><a href="#">Clientes <img src="imagens/icons/cliente.png"></a></b> |
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
				<div class="col-10 col-sm-8" id="clientebody">
					<form name="paginas" method="post" action="redirecionamento.php">
						<select name="pag" onchange="this.form.submit()">
							<option value="1"> Consultar Clientes</option>
							<option value="2"> Cadastrar Novo Clientes</option>
						</select>
					</form>
						<?php 
						if (isset($_SESSION['msg'])) {
							echo $_SESSION['msg'];
							unset($_SESSION['msg']);
						}
					?>
					<form name="cliente">
						
						<table class="table">
							<thead class="thead-dark">
								<tr><th></th>
									<th>#</th>
									<th>NOME</th>
									<th></th>
									<th>CONTATO</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php

									$sql = "SELECT * FROM cliente ORDER BY nome ASC";
									$busca = mysqli_query($conectar, $sql);

									while($resultado = mysqli_fetch_assoc($busca)){ 
										$id_cliente = $resultado['id'];
										$nome_cliente = $resultado['nome'];
										$contato_cliente = $resultado['contato'];

										?>

										<tr><td></td>
											<td><?php echo $id_cliente ?></td>
											<td colspan="2"><?php echo $nome_cliente ?></td>
											<td><?php echo $contato_cliente ?></td>
											<td><a href="editarcliente.php?idcliente=<?php echo $id_cliente ?>">Editar</a></td>
										</tr>

									<?php }

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