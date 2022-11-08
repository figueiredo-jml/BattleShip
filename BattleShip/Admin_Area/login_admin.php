<?php
    session_start();
    include("../Includes/db.php");
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="caixa">
    <div class="caixa-cabecalho">
        <center>
            <h1>Admin Login</h1>
        </center>
    </div>
    <form action="#" method="post">
        <div class="form-group">
            <label>Email:</label>
            <input type="text" class="form-control" name="admin_email" required>
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" class="form-control" name="admin_pass" required>
        </div>

        <div class="text-center">
            <button name="login" value="Login" class="btn btn-primary">
                <i class="fa fa-sign-in"></i> Log in
            </button>
        </div>
    </form>

</div>

</body>
</html>

<?php
if(isset($_POST['login'])){
    $admin_email = $_POST['admin_email'];
    $admin_pass = $_POST['admin_pass'];

    #$hash_password = md5($admin_pass);
    #echo "$hash_password";
    $select_admin = "SELECT * FROM admin_accounts WHERE admin_email='$admin_email' AND admin_pass='$admin_pass'";
    $run_admin = mysqli_query($con, $select_admin);

    $check_admin = mysqli_num_rows($run_admin);

    if($check_admin==0){
        // password ou email errados!!!
        echo "
        <div class='alert alert-danger alert-dismissible fade in'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>ERRO!</strong> Password ou email errados!.
                </div>
        ";
    }
    else{
        header("Location:admin_accounts.php");
        exit();
    }
}
?>
