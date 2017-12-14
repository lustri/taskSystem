<?php 
	$login = $_POST['login'];
	$entrar = $_POST['entrar'];
	$senha = MD5($_POST['senha']);

	include("../connection.php");

    if(isset($entrar)){

    	$query = "SELECT * FROM user WHERE login='$login' AND senha='$senha';";
		$dados = $mysqli->query($query);

		if(mysqli_num_rows($dados)<=0){
			echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.html';</script>";
			die();
		}
		else {

			session_start();

			$_SESSION["loggedIn"] = true;
          	header("Location: ../task/menu.php");
		}
    }

?>
