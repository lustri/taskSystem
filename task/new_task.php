<?php

	session_start();

	if($_SESSION["loggedIn"] != true){
		header("Location: ../login/login.html");
		exit();
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema de tasks | Nova task</title>
</head>
<body>
	<div id="conteudo">
		<h1> Nova task </h1>
		<p>
			<form action="save.php" method="POST" enctype="multipart/form-data">
				Nome: <input type="text" name="nome"/> <br/><br/>
				Descrição:<br/> <textarea rows="4" cols="45" name="descricao"></textarea><br/><br/>
				Arquivo: <input type="file" required name="arquivo"/><br/><br/>
				<input type="submit" value="Adicionar"/>
			</form>
		</p>
		<p>
			<a href="menu.php"> Voltar </a>
		</p>
	</div>
</body>
</html>