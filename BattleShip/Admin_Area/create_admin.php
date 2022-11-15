<?php
  require_once '../Includes/db.php';
 
  if(ISSET($_POST['submit'])){
    $admin_nome = $_POST['admin_nome'];
    $admin_email = $_POST['admin_email'];
    $admin_pass = $_POST['admin_pass'];
    $admin_avatar = $_POST['admin_avatar'];

    mysqli_query($con, "INSERT INTO `admin_accounts` VALUES('', '$admin_nome', '$admin_email', '$admin_pass', '$admin_avatar')") 
      or die(mysqli_error());
 
    header("location: admin_accounts.php");
  }
?>