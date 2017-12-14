<?php

	include("../connection.php");

	session_start();

	if($_SESSION["loggedIn"] != true){
		header("Location: ../login/login.html");
		exit();
	}

	$query = "SELECT * FROM task ORDER BY nome" or die("Error in the consult".mysqli_error($mysqli));
	$dados = $mysqli->query($query);

	$linha = mysqli_fetch_assoc($dados);
	$total = mysqli_num_rows($dados);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistema de tasks</title>
	<script language="Javascript">
	function confirmacao(id) {
	     var resposta = confirm("Deseja remover a task de código " + id + " ?");
	 
	     if (resposta == true) {
	          window.location.href = "delete.php?id="+id;
	     }
	}
</script>
</head>
<body>
	<div id="conteudo">
		<h1>Sistema de tasks</h1>

		<p>
			<a href="new_task.php"> Nova task </a>
		</p>

		<?php
			if($total) {
		?>

		<table border="1">
			<tr>
				<td>Código</td>
				<td>Nome</td>
			</tr>

			<?php 
							do {
			?>		

			<tr>
				<td><?php echo $linha['id'] ?></td>
				<td><a href="<?php echo "view.php?id=" . $linha['id']?>"><?php echo $linha['nome'] ?></a></td>
				<td><a href="<?php echo "update_task.php?id=" . $linha['id']?>">Editar</a></td>
				<td><a href="javascript:func()" onclick="confirmacao(<?php echo $linha['id'] ?>)">Deletar</a></td>
			</tr>

			<?php 
				} while($linha = mysqli_fetch_assoc($dados));

				mysqli_free_result($dados);
			}
			else {
				echo "Nenhuma task cadastrada";
			}

			mysqli_close($mysqli);

			?>
		</table>

		<p>
			<a href="../login/logout.php"> Logout </a>
		</p>
	</div>
</body>
</html>