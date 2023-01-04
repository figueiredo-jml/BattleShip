<?php
    session_start();

	include("includes/db.php");

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

                //echo '<script>alert("Incorrect password")</script>';
                header('Location: index.html');


            }
        } else {
            // Incorrect username

            //echo '<script>alert("Incorrect username")</script>';
            header('Location: index.html');

        }


        $stmt->close();
    }
    ?>
