<?php
	$request = $_REQUEST; //a PHP Super Global variable which used to collect data after submitting it from the form
	$id = $request['id']; //ID we are using it to get the admin record
	$nome = $request['nome']; //get the date of birth from collected data above
	$email = $request['email']; //get the date of birth from collected data above
	$pass = $request['pass'];
	$avatar = $request['avatar'];
	$funcao = $request['funcao'];

	$hash_password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
	$funcao = "Cliente";

	include("includes/db.php");

	// Set the INSERT SQL data
	$sql = "INSERT INTO accounts (nome, email, pass, avatar, funcao) VALUES ('".$nome."', '".$email."', '".$hash_password."', '".$avatar."', '".$funcao."')";
	$sql2 = "INSERT INTO score (id, nome, funcao, jogos, vitorias, derrotas) VALUES ('".$id."', '".$nome."', '".$funcao."', '0', '0', '0')";

	// Process the query so that we will save the date of birth
	if ($mysqli->query($sql) && $mysqli->query($sql2)) {
	  echo "Account has been successfully created.";
	} else {
	  return "Error: " . $sql . "<br>" . $mysqli->error;
	}

	// Close the connection after using it
	$mysqli->close();
?>