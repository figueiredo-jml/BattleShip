<?php
	$servername = "localhost"; //set the servername
	$username = "Jose"; //set the server username
	$password = "qwerty"; // set the server password (you must put password here if your using live server)
	$dbname = "battlechips"; // set the table name

	$mysqli = new mysqli($servername, $username, $password, $dbname);

	if ($mysqli->connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	  exit();
	}

  ?>
