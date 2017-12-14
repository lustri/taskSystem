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
	<title>Sistema de tasks | Ver detalhes </title>
</head>
<body>
	<div id="conteudo">
		<h1> Detalhes -  <?php echo $linha['nome'] ?> </h1>
		<p>
			<b>Código:</b> <?php echo $linha['id'] ?><br/><br/>
			<b>Nome:</b> <?php echo $linha['nome'] ?><br/><br/>
			<b>Descrição:</b><br/> <?php echo $linha['descricao'] ?><br/><br/>
			<b>Arquivo:</b> <a href="<?php echo "../upload/" . $linha['arquivo']?>"><?php echo $linha['arquivo']?></a>
		</p>
		<?php 
			mysqli_free_result($dados);
			mysqli_close($mysqli);
		?>

		<p>
			<a href="menu.php"> Voltar </a>
		</p>
	</div>
</body>
</html>