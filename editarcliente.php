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

		$idc = $_GET['idcliente'];

		$sql = "SELECT * FROM cliente WHERE id=$idc;";
		$busca = mysqli_query($conectar, $sql);
		$resultado = mysqli_fetch_assoc($busca);
		$nomec = $resultado['nome'];
		$contato = $resultado['contato'];
		$cpf = $resultado['cpf'];
		$logradouro = $resultado['logradouro'];
		$bairro = $resultado['bairro'];
		$complemento = $resultado['complemento'];
		$cidade = $resultado['cidadeuf'];


		?>
		<title>EDITAR - <?php echo $nomec ?></title>
		<link rel="icon" type="image/x-icon" href="imagens/logo-empresa.png">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-sclae=1.0">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
		<script type="text/javascript" src="bootstrap/js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="script/maskinput.js"></script>
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
					<a href="cliente.php">voltar</a>
					<form name="cliente" method="post" action="alterarcliente.php">
						<table class="table">
							<thead class="table-dark">
								<th colspan="2"><center><?php echo $nomec; ?></center></th>
							</thead>
							<tbody>
									<tr><td colspan="2" class="table-light"><center><strong>INFORMAÇÕES PESSOAIS</strong></center></td></tr>
									<tr>
										<td>
											<label for="id">ID</label>
											<input type="text" class="form-control" id="id" name="idc" value="<?php echo $idc ?>" readonly>
										</td> 
										<td>
											<label for="nome">Nome</label>
											<input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nomec ?>" required>
										</td>
									</tr>
									<tr>
										<td>
											<label for="contato">Celular</label>
											<input type="text" class="form-control" id="contato" name="contato" value="<?php echo $contato ?>" maxlength="15" placeholder="(00) 00000-0000" onkeypress="number(contato.value)" required>
										</td>
										<td>
											<label for="cpf">CPF</label>
											<input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $cpf ?>" placeholder="000.000.000-00" maxlength="14" onkeypress="aplicar(cpf.value)" required>
										</td>
									</tr>
									<tr><td colspan="2" class="table-light"><center><strong>ENDEREÇO</strong></center></td></tr>
									<tr>
										<td>
											<label for="logradouro">Logradouro</label>
											<input type="text" class="form-control" id="logradouro" name="logradouro" value="<?php echo $logradouro ?>" placeholder="Rua, Avenida..., Nº" required>
										</td>
										<td>
											<label for="bairro">Bairro</label>
											<input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $bairro ?>" placeholder="Bairro" required>
										</td>
									</tr>
									<tr>
										<td>
											<label for="complemento">Complemento</label>
											<input type="text" class="form-control" id="complemento" name="complemento" value="<?php echo $complemento ?>" placeholder="Opcional">
										</td>
										<td>
											<label for="cidadeuf">Cidade/UF</label>
											<input type="text" class="form-control" id="cidadeuf" name="cidadeuf" value="<?php echo $cidade ?>" placeholder="Cidade/UF" required>
										</td>
									</tr>
									<tr>
										<td colspan="1">
										<center><button type="submit" class="btn btn-success">Salvar Alterações</button></center>
										</td>
									
										<td colspan="1">
										<center><a href="excluircliente.php?excluir=<?php echo $idc ?>"<button class="btn btn-danger">Excluir Cliente</button></a></center>
										</td>
									</tr>
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