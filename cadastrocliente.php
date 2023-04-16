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
		<title>CLIENTES - CADASTRO</title>
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
					<form name="paginas" method="post" action="redirecionamento.php">
						<select name="pag" onchange="this.form.submit()">
							<option value="2"> Cadastrar Novo Clientes</option>
							<option value="1"> Consultar Clientes</option>	
						</select>
					</form>
						<?php 
						if (isset($_SESSION['msg'])) {
							echo $_SESSION['msg'];
							unset($_SESSION['msg']);
						}
					?>

						<form name="cliente" method="post" action="acaocadastrarcliente.php">
						<div id="formulario-cliente" class="form-group">
							<table class="table">
								<thead class="thead-dark">
									<th colspan="2">FORMULÁRIO DE CADASTRO DE CLIENTES</th>
								</thead>
								<tbody>
									<tr><td colspan="2" class="table-light"><center><strong>INFORMAÇÕES PESSOAIS</strong></center></td></tr>
									<tr> 
										<td colspan="2">
											<label for="nome">Nome</label>
											<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
										</td>
									</tr>
									<tr>
										<td>
											<label for="contato">Celular</label>
											<input type="text" class="form-control" id="contato" name="contato" maxlength="15" placeholder="(00) 00000-0000" onkeypress="number(contato.value)" required>
										</td>
										<td>
											<label for="cpf">CPF</label>
											<input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" maxlength="14" onkeypress="aplicar(cpf.value)" required>
										</td>
									</tr>
									<tr><td colspan="2" class="table-light"><center><strong>ENDEREÇO</strong></center></td></tr>
									<tr>
										<td>
											<label for="logradouro">Logradouro</label>
											<input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Rua, Avenida..., Nº" required>
										</td>
										<td>
											<label for="bairro">Bairro</label>
											<input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" required>
										</td>
									</tr>
									<tr>
										<td>
											<label for="complemento">Complemento</label>
											<input type="text" class="form-control" id="complemento" name="complemento" placeholder="Opcional">
										</td>
										<td>
											<label for="cidadeuf">Cidade/UF</label>
											<input type="text" class="form-control" id="cidadeuf" name="cidadeuf" placeholder="Cidade/UF" required>
										</td>
									</tr>
									<tr>
										<td colspan="2"><button type="submit" class="btn btn-success">Cadastrar Cliente</button></td>
									</tr>
								</tbody>
							</table>
							
						</div>
					</form>
				</div>
				<div class="col-1 col-sm-2">
					
				</div>
			</div>
			<footer>
			<div class="row">
				<div class="col-12" id="baseboard">
					<br>
					Copyrigth - 2023
				</div>
			</div>
		</footer>
		</div>
	</body>
</html>