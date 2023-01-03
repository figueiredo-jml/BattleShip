<?php
	$servername = "localhost"; //set the servername
	$username = "Filiper"; //set the server username
	$password = "qwerty"; // set the server password (you must put password here if your using live server)
	$dbname = "battlechips"; // set the table name

	$mysqli = new mysqli($servername, $username, $password, $dbname);

	if ($mysqli->connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	  exit();
	}

if(!empty(isset($_POST['username'])) && isset($_POST['username'])){
		$usernameInput= $_POST['username'];
		checkUsername($mysqli, $usernameInput); 
	 }


	function checkUsername($mysqli, $usernameInput){
		$query = "SELECT nome FROM accounts WHERE nome='$usernameInput'";
		$result = $mysqli->query($query);
		if ($result->num_rows > 0) {
			echo "<span style='color:red'>This username is taken. Try another</span>";
		}else{
			echo "<span style='color:green'>This username is available</span>";
		}
	}

?>