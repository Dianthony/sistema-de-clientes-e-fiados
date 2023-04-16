<!DOCTYPE html>
<html>
	<head>
		<?php session_start(); 
		require_once "conexão.php";

		if (isset($_SESSION['nome'])) {
			if ((isset($_SESSION['nome']) == true) and (isset($_SESSION['senha']) == true)){
				$nome = $_SESSION['nome'];
				$id = $_SESSION['id'];
				$senha = $_SESSION['senha'];
			}
		}
		$idc = $_GET['idcliente'];
		$sqlcliente = "SELECT * FROM cliente WHERE id=$idc;";
		$buscacliente = mysqli_query($conectar, $sqlcliente);
		$resultadocliente = mysqli_fetch_assoc($buscacliente);
		$idcliente = $resultadocliente['id'];

		$sql = "SELECT * FROM fiado WHERE id_cliente=$idc ORDER BY id DESC";
		$busca = mysqli_query($conectar, $sql);
		$row = mysqli_num_rows($busca);
		
		?>
		<title>FIADOS - <?php echo $resultadocliente['nome']; ?></title>
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
				<div class="modal fade" id="quitarcontas" tabindex="-1" role="dialog" aria-labelledby="logModalLabel" area-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form name='login' method='post' action='acaoapagarregistros.php'>		
									Esta ação apagará todos os registros de fiados do cliente: <br>
									<b><?php echo $resultadocliente['nome']; 
								echo "<input type='text' name='idcliente' value='$idcliente' readonly style='display:none'>" ?></b> <br><br>
									Para confirmar, digite sua senha de login <br>
									<input type='password' class="form-control" name='confsenha' placeholder='Senha' required>	<br>
								<input type='submit' class="btn btn-secondary " name='enviar' data-dismiss="modal" value='Fechar'>
								<input type='submit' class="btn btn-success" name='enviar' value='Confirmar'></form>
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
				<div class="col-10 col-sm-8" id="vercontabody">
					<a href="fiado.php">voltar</a>
					<form name="busca-cliente" method="post" action="acaoadicionardebito.php">  
						<table class="table">
							 <thead class="thead-dark">
							 	<th colspan="4"> Cliente: <b><?php  echo $resultadocliente['nome'];
							 	echo "<input type='text' name='idcliente' value='$idcliente' readonly style='display:none'>";

							 	?></b>
							 </thead>
							 <tbody>
							 	<tr><td colspan="2">Descrição:<textarea class="form-control" name="descricao" required></textarea></td></tr>
							 	<tr><td>Valor: R$<input class="form-control" type="text" name="valor" id="valor" required></td>
							 		<td>Data <input class="form-control" type="date" name="data" id="date-input" required></td></tr>
							 	<tr><td><input class="btn btn-danger" type="reset" value="Limpar Tudo"></td>
								<td><input class="btn btn-success" type="submit" value="+"></td></tr>
							 </tbody>
							 <script>
								const dataatual = new Date().toLocaleDateString();
								const quebra = dataatual.split("/");
								const newData = quebra[2]+"-"+quebra[1]+"-"+quebra[0];
								const input = document.querySelector("#date-input");
								input.value = newData;
							 </script>	
						</table>
						<table class="table">
							<thead class="thead-dark">
								<th>#</th>
								<th>DATA</th>
								<th>DESCRIÇÃO</th>
								<th>VALOR</th>
								<th>	<?php if($row == 0){ }
											else if($row > 1 ){ ?>
									<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#quitarcontas">Quitar Contas</button></th>
										<?php } ?>
							</thead>
							<tbody>
							<?php

								if ($row == 0) { ?>
								<tr><td colspan="5">O cliente <b>NÃO</b> possui débitos no estabelimento!</td></tr>
							<?php	}
								else{ $i = 1;
									while($resultado = mysqli_fetch_assoc($busca)){ ?>
										<tr><td><?php echo $i++; ?></td>	
											<td><?php 
											$conta = $resultado['id'];

											$fulldate = $resultado['data'];
											$sep = explode('-', $fulldate);
											$day = $sep[2];
											$month = $sep[1];
											$year = $sep[0];

											echo  $day."/".$month."/".$year ?></td>	
											<td><?php echo $resultado['descricao'] ?></td>	
											<td>R$ <?php echo $resultado['valor'] ?></td>
											<td><a href="detalhesconta.php?contaid=<?php echo $conta ?>">Detalhes</a></td>
										</tr>
							<?php	}
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