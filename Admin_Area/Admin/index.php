<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../../index.html');
	exit;
}
?>

<!doctype html>
<html lang="en">
<head>
  	<title>Admin Accounts</title>

	<!-- Menu -->

	<?php include(dirname(__DIR__).'/../Includes/menu.php')?>

  	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../../plugins/bootstrap-datepicker/css/bootstrap.min.css">
  	
  	<!-- Page CSS -->
  	<link rel="stylesheet" href="../../css/styles.css">

</head>
  
<body>
   
	<div class="container">

		<br><br><br>
	    <h1>Admin Accounts</h1>
	    <br><br><br>

	    <div class="row">
	    	<div class="col-md-4">
				<input id="info" class="add_account" type="button" value="Add New Admin Account">
				<br><br>

				<div id="myDiv" class="col-md-12">
			    <form action="save.php" id="form">
				<input class="form-control" type="hidden" name="funcao">
			    	<div class="form-group">
					    <label for="nome">Nome</label>
					    <input class="form-control" type="text" name="nome" id="username">
						<div id="usernameStatus"></div>
					</div>
				  	<div class="form-group">
					    <label for="email">Email</label>
					    <input class="form-control" type="email" name="email">
				  	</div>
				  	<div class="form-group">
					    <label for="pass">Password</label>
					    <input class="form-control" type="password" name="pass">
				  	</div>
				  	<div class="av-selector">
						<input id="admin1" type="radio" name="avatar" value="admin1" checked/>
						<label class="drinkcard-av admin1" for="admin1"></label>
						<input id="admin2" type="radio" name="avatar" value="admin2"/>
						<label class="drinkcard-av admin2"for="admin2"></label>
						<input id="admin3" type="radio" name="avatar" value="admin3"/>
						<label class="drinkcard-av admin3" for="admin3"></label>
						<input id="admin4" type="radio" name="avatar" value="admin4"/>
						<label class="drinkcard-av admin4" for="admin4"></label>
						<input id="admin5" type="radio" name="avatar" value="admin5"/>
						<label class="drinkcard-av admin5" for="admin5"></label>
						<input id="admin6" type="radio" name="avatar" value="admin6"/>
						<label class="drinkcard-av admin6" for="admin6"></label>
					</div>
				  	<button type="button" class="submit btn-submit" id="btnSubmit">Submit</button>
				</form>
	    	</div>
			</div>

	    	<div class="col-md-8">
	    		<h3>List of Admins</h3>
	    		<div id="admins-list"></div>
	    	</div>
	    </div>
	</div>

	<!-- The Modal -->
	<div class="modal" id="edit-admin-modal">
	  	<div class="modal-dialog">
		    <div class="modal-content">

		      	<!-- Modal Header -->
		      	<div class="modal-header">
			        <h4 class="modal-title">Edit Admin</h4>
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
		      	</div>

		      	<!-- Modal body -->
		      	<div class="modal-body">
		        	<form action="update.php" id="edit-form">
		        		<input class="form-control" type="hidden" name="id">
						<input class="form-control" type="hidden" name="funcao">
				    	<div class="form-group">
						    <label for="nome">Nome</label>
						    <input class="form-control" type="text" name="nome">
					  	</div>
					  	<div class="form-group">
						    <label for="email">Email</label>
						    <input class="form-control" type="email" name="email">
					  	</div>
					  	<div class="form-group">
						    <label for="pass">Password</label>
						    <input class="form-control" type="password" name="pass">
					  	</div>
					  	<div class="av-selector">
							<input id="admin1" type="radio" name="avatar" value="admin1" checked/>
							<label class="drinkcard-av admin1" for="admin1"></label>
							<input id="admin2" type="radio" name="avatar" value="admin2"/>
							<label class="drinkcard-av admin2"for="admin2"></label>
							<input id="admin3" type="radio" name="avatar" value="admin3"/>
							<label class="drinkcard-av admin3" for="admin3"></label>
							<input id="admin4" type="radio" name="avatar" value="admin4"/>
							<label class="drinkcard-av admin4" for="admin4"></label>
							<input id="admin5" type="radio" name="avatar" value="admin5"/>
							<label class="drinkcard-av admin5" for="admin5"></label>
							<input id="admin6" type="radio" name="avatar" value="admin6"/>
							<label class="drinkcard-av admin6" for="admin6"></label>
						</div>
					  	<button type="button" class="btn btn-primary" id="btnUpdateSubmit">Update</button>
					  	<button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
					</form>


		      	</div>

		    </div>
	  	</div>
	</div>


	<!-- Must put our javascript files here to fast the page loading -->
	
	<!-- jQuery library -->
	<script src="../../plugins/bootstrap-datepicker/locales/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="../../plugins/bootstrap-datepicker/locales/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="../../plugins/bootstrap-datepicker/locales/bootstrap.min.js"></script>
	<!-- Page Script -->
	<script src="../../js/scripts_admin.js"></script>

</body>
  
</html>