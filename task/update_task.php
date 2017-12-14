<?php

	include("../connection.php");

	session_start();

	if($_SESSION["loggedIn"] != true){
		header("Location: ../login/login.html");
		exit();
	}

	$id = filter_input(INPUT_GET, 'id');
	
    $query = "SELECT * FROM task WHERE id='$id';" or die("Error in the consult".mysqli_error($mysqli));
	$dados = $mysqli->query($query);

	$linha = mysqli_fetch_assoc($dados);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema de tasks | Alterar task</title>
</head>
<body>
	<div id="conteudo">
		<h1> Alterar task </h1>
		<p>
		<form action="update.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $linha['id'] ?>"/>
			Nome: <input type="text" name="nome" value ="<?php echo $linha['nome'] ?>"/><br/><br/>
			Descrição:<br/> <textarea rows="4" cols="45" name="descricao"><?php echo $linha['descricao']?></textarea><br/><br/>
			<input type="hidden" name="arquivo" value="<?php echo $linha['arquivo'] ?>" />
			Arquivo: <a href="<?php echo "../upload/" . $linha['arquivo']?>"><?php echo $linha['arquivo']?></a><br/><br/>
			Deseja escolher outro arquivo? <br/><br/><input type="file" name="novoArquivo"/><br/><br/>
			<input type="submit" value="Salvar"/>
		</form>	
		</p>
		<p>
			<a href="menu.php"> Voltar </a>
		</p> 
	</div>
</body>
</html>