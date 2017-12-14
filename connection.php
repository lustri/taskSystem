<?php

	$host = "localhost";
	$user = "root";
	$password = "";
	$db = "sistema";

	$mysqli = new mysqli($host, $user, $password, $db);

	if($mysqli->connect_errno)
		echo "Falha na conexão: (".$mysqli->connect_errno.") ".$mysqli->connect_error;

?>