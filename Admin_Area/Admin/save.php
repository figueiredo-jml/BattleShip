<?php
	$request = $_REQUEST; //a PHP Super Global variable which used to collect data after submitting it from the form
	//$admin_id = $request['admin_id']; //admin ID we are using it to get the admin record
	$nome = $request['nome']; //get the date of birth from collected data above
	$email = $request['email']; //get the date of birth from collected data above
	$pass = $request['pass'];
	$avatar = $request['avatar'];
	$funcao = $request['funcao'];

	$hash_password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
	$funcao = "Admin";

	$servername = "localhost"; //set the servername
	$username = "Filiper"; //set the server username
	$password = "qwerty"; // set the server password (you must put password here if your using live server)
	$dbname = "battlechips"; // set the table name

	$mysqli = new mysqli($servername, $username, $password, $dbname);

	if ($mysqli->connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	  exit();
	}

	// Set the INSERT SQL data
	$sql = "INSERT INTO accounts (nome, email, pass, avatar, funcao) VALUES ('".$nome."', '".$email."', '".$hash_password."', '".$avatar."', '".$funcao."')";

	// Process the query so that we will save the date of birth
	if ($mysqli->query($sql)) {
	  echo "Admin has been successfully created.";
	} else {
	  return "Error: " . $sql . "<br>" . $mysqli->error;
	}

	// Close the connection after using it
	$mysqli->close();
?>