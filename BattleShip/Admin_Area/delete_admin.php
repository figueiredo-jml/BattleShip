<?php
  require_once '../Includes/db.php';
 
  if(ISSET($_REQUEST['delId'])){

    mysqli_query($con, "DELETE FROM `admin_accounts` WHERE admin_id = delId") 
      or die(mysqli_error());
 
    header("location: admin_accounts.php");
  }
?>



<?php
include_once("../Includes/db.php");;
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
    $sqldb = new PDO("mysql:host=localhost;dbname=battlechips","Filiper","qwerty");
    $sql = $sqldb->prepare("DELETE FROM admin_accounts WHERE admin_id = ?");
    try {
        $sql->bindParam(1, $_REQUEST['delId']);
        $sql->execute();
    }
    catch (PDOException $e) {
        throw new RuntimeException("[".$e->getCode()."] : ". $e->getMessage());
    }
    header('Location: admin_accounts.php');
    exit;
}
?>
