<?php
    session_start();
    include("BattleShip/Includes/db.php");
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" name="viewport" content="width-device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
<body>
  <div class="col-md-3"></div>
  <div class="col-md-6 well">
    <h3 class="text-primary">PHP - Update Data Through Modal Dialog Using MySQLi</h3>
    <hr style="border-top:1px dotted #ccc;"/>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add user</button>
    <br /><br />
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
          <td><button class="btn btn-warning" data-toggle="modal" type="button" data-target="#update_modal<?php echo $fetch['admin_id']?>"><span class="glyphicon glyphicon-edit"></span> Edit</button></td>
        </tr>
        <?php
 
          include 'update_user.php';
 
          }
        ?>
      </tbody>
    </table>
  </div>
  <div class="modal fade" id="form_modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="save_user.php">
          <div class="modal-header">
            <h3 class="modal-title">Add User</h3>
          </div>
          <div class="modal-body">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <div class="form-group">
                <label>Firstname</label>
                <input type="text" name="firstname" class="form-control" required="required"/>
              </div>
              <div class="form-group">
                <label>Lastname</label>
                <input type="text" name="lastname" class="form-control" required="required" />
              </div>
              <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" required="required"/>
              </div>
            </div>
          </div>
          <div style="clear:both;"></div>
          <div class="modal-footer">
            <button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
            <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>  
  <div class="container">
  <h2>Modal Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
</body> 
</html>