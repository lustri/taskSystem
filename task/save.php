<?php 

    include("../connection.php");

    session_start();

    if($_SESSION["loggedIn"] != true){
        header("Location: ../login/login.html");
        exit();
    }

	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];

    if($nome == "" || $nome == null || $descricao == "" || $descricao == null){
        echo"<script language='javascript' type='text/javascript'>alert('Os campos nome e descrição devem ser preenchidos!');window.location.href='new_task.php';</script>";
    }
    else {

        if($_FILES['arquivo']['error'] == 0){
            $extention = strtolower(substr($_FILES['arquivo']['name'], -4));
            $new_name = MD5(time()) . $extention;
            $dir = "../upload/";

            move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$new_name);

            $query = "INSERT INTO task VALUES(null, '$nome', '$descricao', '$new_name')";
        }

        if($mysqli->query($query))
            header("Location: menu.php");
        else
            die('Erro: '. mysqli_error($mysqli));
    }
?>