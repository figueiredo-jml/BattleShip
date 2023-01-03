<?php
	$request = $_REQUEST; //a PHP Super Global variable which used to collect data after submitting it from the form
	$Id = $request['id']; //admin ID we are using it to get the admin record

	$servername = "localhost"; //set the servername
	$username = "Filiper"; //set the server username
	$password = "qwerty"; // set the server password (you must put password here if your using live server)
	$dbname = "battlechips"; // set the table name

	$mysqli = new mysqli($servername, $username, $password, $dbname);

	if ($mysqli->connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	  exit();
	}

	// Set the DELETE SQL data
	$sql = "DELETE FROM accounts WHERE id='".$Id."'";

	// Process the query so that we will save the date of birth
	if ($mysqli->query($sql)) {
	  echo "Admin has been successfully deleted.";
	} else {
	  echo "Error: " . $sql . "<br>" . $mysqli->error;
	}

	// Close the connection after using it
	$mysqli->close();
?>