<?php

    $servername = "localhost";
    $database = "battlechips";
    $username = "Filiper";
    $password = "qwerty";

    $con = mysqli_connect($servername, $username, $password, $database);

    if (!$con) {
        die("Connect failed: " . mysqli_error());
    }

?>
