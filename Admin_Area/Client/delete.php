<?php
	$request = $_REQUEST; //a PHP Super Global variable which used to collect data after submitting it from the form
	//$Id = $request['id']; //admin ID we are using it to get the admin record
	$nome = $request['nome'];

	include("../../includes/db.php");

	// Set the DELETE SQL data
	$sql = "DELETE FROM score WHERE nome='".$nome."'";
	$sql2 = "DELETE FROM accounts WHERE nome='".$nome."'";

	// Process the query so that we will save the date of birth
	if ($mysqli->query($sql)) {
		if ($mysqli->query($sql2)) {
	  	echo "Client has been successfully deleted.";
		} 
	}else {
	  echo "Error: " . $sql . "<br>" . $mysqli->error;
	}

	// Close the connection after using it
	$mysqli->close();
?>