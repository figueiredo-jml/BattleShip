<?php
    session_start();
    include("../Includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Accounts</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
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
        <form action="create_admin.php" method="POST">
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

        <p>Por favor escolha o avatar que preferir</p>
        <div class="av-selector">
          <input id="a1" type="radio" name="admin_avatar" value="a1" />
          <label class="drinkcard-av a1" for="a1"></label>
          <input id="a2" type="radio" name="admin_avatar" value="a2" />
          <label class="drinkcard-av a2"for="a2"></label>
        </div>
        </div>
   
        <div class="modal-footer">
          <button type="submit" class="btn btn-default" name="submit" >Criar conta</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>

  </div>
   </form>
</div>

<table class="table table-bordered">
      <thead class="alert-success">
        <tr>
          <th>Admin Id</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Pass</th>
          <th>Avatar</th>
          <th>Editar</th>
          <th>Apagar</th>
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
          <td><a href="edit_admin.php?editId=' . $fetch['admin_id'] . '" class="text-primary"><i class="bi bi-pencil-square"></i></a></td>
          <td><a href="delete_admin.php?delId=' . $fetch['admin_id'] . '" class="text-danger"><i class="bi bi-trash"></i></a></td>
        </tr>
        <?php
          }
        ?>

</body>
</html>