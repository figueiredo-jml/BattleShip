<?php
	include("includes/db.php");

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