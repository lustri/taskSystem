<?php 

    include("../connection.php");

	$login = $_POST['login'];
	$senha = MD5($_POST['senha']);

    $query = "SELECT * FROM user WHERE login='$login';";
    $dados = $mysqli->query($query);

    $linha = mysqli_fetch_assoc($dados);
    $loginlinha = $linha['login'];

    if($login == "" || $login == null){
    	echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='user_register.html';</script>";
    }
    else {
    	
    	if($loginlinha == $login){
    		echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='user_register.html';</script>";
        	die();
    	}
    	else {
    		$query = "INSERT INTO user values(null, '$login', '$senha');";

        	if($mysqli->query($query)){
             	echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.html'</script>";
        	}
        	else {
        		echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='user_register.html'<script>";
        	    die('Erro: '. mysqli_error($mysqli));
        	}
    	}

    }

?>