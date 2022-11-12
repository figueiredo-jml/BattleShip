<?php
    session_start();
    include("BattleShip/Includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Contas de Admin</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Criar nova conta de admin</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nova conta de admin</h4>
        </div>
        <form action="#" method="post">
        <div class="form-group">
            <label>Id:</label>
            <input type="text" name="admin_id" required>
        </div>
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="admin_nome" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="text" name="admin_email" required>
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="admin_pass" required>
        </div>
        <div class="form-group">
            <label>Avatar:</label>
            <input type="text" name="admin_avatar" required>
        </div>
        </div>
    </form>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default" name="submit">Criar conta</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<table class="table table-bordered">
      <thead class="alert-success">
        <tr>
          <th>Admin Id</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Pass</th>
          <th>Avatar</th>
        </tr>
      </thead>
      <tbody style="background-color:#fff;">
        <?php
          
          $query = mysqli_query($con, "SELECT * FROM `admin_accounts`") or die(mysqli_error());
          while($fetch = mysqli_fetch_array($query)){
        ?>
        <tr>
          <td><?php echo $fetch['admin_id']?></td>
          <td><?php echo $fetch['admin_nome']?></td>
          <td><?php echo $fetch['admin_email']?></td>
          <td><?php echo $fetch['admin_pass']?></td>
          <td><?php echo $fetch['admin_avatar']?></td>
        </tr>
        <?php
          if(isset($_POST['submit'])){
            $admin_id = $_POST['admin_id'];
            $admin_nome = $_POST['admin_nome'];
            $admin_email = $_POST['admin_email'];
            $admin_pass = $_POST['admin_pass'];
            $admin_avatar = $_POST['admin_avatar'];
            
                $sql = "INSERT INTO admin_accounts (admin_id, admin_nome, admin_email, admin_pass, admin_avatar) VALUES ('$admin_id', '$admin_nome', '$admin_email', '$admin_pass', '$admin_avatar')";
        
                $rv_0 = mysqli_query($con, $sql);
                if ($rv_0) {
                    echo "<script>alert('Foi registado com sucesso!')</script>";
                    $_SESSION['admin_email']=$admin_email;
                } else {
                    echo "<script>alert(Erro a registar o cliente: " . mysqli_error($con). ")</script>";
                }
            }
        }
        ?>

</body>
</html>
