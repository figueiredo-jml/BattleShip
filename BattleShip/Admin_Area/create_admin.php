<?php
  require_once '../Includes/db.php';
 
  if(ISSET($_POST['submit'])){
    $admin_nome = $_POST['admin_nome'];
    $admin_email = $_POST['admin_email'];
    $admin_pass = $_POST['admin_pass'];

    $admin_avatar = $_FILES['admin_avatar']['name'];

    $admin_imagem_temp = $_FILES['admin_avatar']['tmp_name'];

    $rv_0 = move_uploaded_file($admin_imagem_temp, "Images/$admin_avatar");


    if($rv_0) {
      $hash_password = md5($admin_pass);

      mysqli_query($con, "INSERT INTO `admin_accounts` VALUES('', '$admin_nome', '$admin_email', '$hash_password', '$admin_avatar')") 
        or die(mysqli_error());
  
      header("location: admin_accounts.php");
    }
  }
?>