<?php
	$request = $_REQUEST; //a PHP Super Global variable which used to collect data after submitting it from the form
	$id = $request['id']; //admin ID we are using it to get the admin record
	$nome = $request['nome']; //get the date of birth from collected data above
	$email = $request['email']; //get the date of birth from collected data above
	$pass = $request['pass'];
	$avatar = $request['avatar'];

	$hash_password = password_hash($_POST['pass'], PASSWORD_DEFAULT);

	include("../../includes/db.php");

	// Set the INSERT SQL data
	$sql = "UPDATE accounts SET nome='".$nome."', email='".$email."', pass='".$hash_password."', avatar='".$avatar."' WHERE id='".$id."'";
	
	// Process the query so that we will save the date of birth
	if ($mysqli->query($sql)) {
	  echo "Admin has been sucessfully updated.";
	} else {
	  return "Error: " . $sql . "<br>" . $mysqli->error;
	}

	// Close the connection after using it
	$mysqli->close();
?>