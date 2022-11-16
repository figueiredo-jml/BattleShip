<?php

    include "../Includes/db.php";

    $id = $_GET['editId'];

    $del = mysqli_query($con,"admin_id = '$id'");

    if($del)
    {
        mysqli_close($con);
        header("location: admin_accounts.php");
        exit;	
    }
    else
    {
        echo "Error editing record";
    }
?>
