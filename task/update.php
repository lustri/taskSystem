<?php 

    include("../connection.php");

    session_start();

    if($_SESSION["loggedIn"] != true){
        header("Location: ../login/login.html");
        exit();
    }

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $arquivo = $_POST['arquivo'];

    if($nome == "" || $nome == null || $descricao == "" || $descricao == null){
        echo"<script language='javascript' type='text/javascript'>alert('Os campos nome e descrição devem ser preenchidos!');window.location.href='update_task.php';</script>";
    }
    else {

        if($_FILES['novoArquivo']['error'] == 0){
            $extention = strtolower(substr($_FILES['novoArquivo']['name'], -4));
            $new_name = MD5(time()) . $extention;
            $dir = "../upload/";

            move_uploaded_file($_FILES['novoArquivo']['tmp_name'], $dir.$new_name);

            $query = "UPDATE task set nome='$nome', descricao='$descricao', arquivo = '$new_name' where id='$id';";

            unlink("../upload/".$arquivo."");
        }
        else {
            $query = "UPDATE task set nome='$nome', descricao='$descricao' where id='$id';";
        }

        if($mysqli->query($query)){
            header("Location: menu.php");
        }
        else {
            die('Erro: '. mysqli_error($link));
        }
    }
?>