<?php

    include("../connection.php");

    session_start();

    if($_SESSION["loggedIn"] != true){
        header("Location: ../login/login.html");
        exit();
    }

	$id = filter_input(INPUT_GET, 'id');

    $query = "SELECT * FROM task WHERE id= '$id';" or die("Error in the consult".mysqli_error($mysqli));;
    $dados = $mysqli->query($query);

    $linha = mysqli_fetch_assoc($dados);

    $query = "DELETE FROM task where id='$id';";

    unlink("../upload/".$linha['arquivo']."");

    if($mysqli->query($query)){
        header("Location: menu.php");
    }
    else {
        die('Erro: '. mysqli_error($link));
    }
?>