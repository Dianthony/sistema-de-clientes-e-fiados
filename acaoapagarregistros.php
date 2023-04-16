<?php
    session_start();
    require_once "conexão.php";

    if (isset($_SESSION['nome'])) {
        if ((isset($_SESSION['nome']) == true) and (isset($_SESSION['senha']) == true)){
            $nome = $_SESSION['nome'];
            $id = $_SESSION['id'];
            $senha = $_SESSION['senha'];
        }
    }
    $cs = $_POST['confsenha'];

    if($senha == $cs){
        $idc = $_POST['idcliente'];
        $sql = "DELETE FROM fiado WHERE id_cliente=$idc;";
        mysqli_query($conectar, $sql);
        header("Location: verconta.php?idcliente=$idc");
    }
    else {
        $idc = $_POST['idcliente'];
        $_SESSION['msg'] = "<div id='message'>
				<b>Atenção!</b><br>
				Senha inválida.</div>";
        header("Location: verconta.php?idcliente=$idc");
    }
?>