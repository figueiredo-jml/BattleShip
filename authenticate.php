<?php
    session_start();

	$servername = "localhost"; //set the servername
	$username = "Filiper"; //set the server username
	$password = "qwerty"; // set the server password (you must put password here if your using live server)
	$dbname = "battlechips"; // set the table name

	$mysqli = new mysqli($servername, $username, $password, $dbname);

	if ($mysqli->connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	  exit();
	}

    // Now we check if the data from the login form was submitted, isset() will check if the data exists.
    if ( !isset($_POST['nome'], $_POST['pass']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}

    // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
    if ($stmt = $mysqli->prepare('SELECT id, pass FROM accounts WHERE nome = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $stmt->bind_param('s', $_POST['nome']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $hash_password);
            $stmt->fetch();
            // Account exists, now we verify the password.
            // Note: remember to use password_hash in your registration file to store the hashed passwords.
            //$hash_password = md5($pass);
            if (password_verify($_POST['pass'], $hash_password)) {
                // Verification success! User has logged-in!
                // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['nome'] = $_POST['nome'];
                $_SESSION['id'] = $id;
                header('Location: Game/game.php');
            } else {
                // Incorrect password
                echo 'Incorrect username and/or password!';
            }
        } else {
            // Incorrect username
            echo 'Incorrect username and/or password!';
        }


        $stmt->close();
    }
    ?>
