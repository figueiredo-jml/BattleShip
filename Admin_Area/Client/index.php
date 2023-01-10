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
  	<title>Client Accounts</title>

	<!-- Menu -->

	<?php include(dirname(__DIR__).'/../includes/menu.php')?>
	
  	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../../plugins/bootstrap-datepicker/css/bootstrap.min.css">
  	
  	<!-- Page CSS -->
  	<link rel="stylesheet" href="../../css/styles.css">

</head>
  
<body>
   
	<div class="container">

		<br><br><br>
	    <h1>Client Accounts</h1>
	    <br><br><br>

	    <div class="row">
	    	<div class="col-md-4">
				<input id="info" class="add_account" type="button" value="Add New Client Account">
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
						<input id="client1" type="radio" name="avatar" value="client1" checked/>
						<label class="drinkcard-av client1" for="client1"></label>
						<input id="client2" type="radio" name="avatar" value="client2"/>
						<label class="drinkcard-av client2"for="client2"></label>
						<input id="client3" type="radio" name="avatar" value="client3"/>
						<label class="drinkcard-av client3" for="client3"></label>
						<input id="client4" type="radio" name="avatar" value="client4"/>
						<label class="drinkcard-av client4" for="client4"></label>
						<input id="client5" type="radio" name="avatar" value="client5"/>
						<label class="drinkcard-av client5" for="client5"></label>
						<input id="client6" type="radio" name="avatar" value="client6"/>
						<label class="drinkcard-av client6" for="client6"></label>
					</div>
				  	<button type="button" class="submit btn-submit" id="btnSubmit">Submit</button>
				</form>
	    	</div>
			</div>

	    	<div class="col-md-8">
	    		<h3>List of Clients</h3>
	    		<div id="clients-list"></div>
	    	</div>
	    </div>
	</div>

	<!-- The Modal -->
	<div class="modal" id="edit-client-modal">
	  	<div class="modal-dialog">
		    <div class="modal-content">

		      	<!-- Modal Header -->
		      	<div class="modal-header">
			        <h4 class="modal-title">Edit Client</h4>
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
							<input id="client1" type="radio" name="avatar" value="client1" checked/>
							<label class="drinkcard-av client1" for="client1"></label>
							<input id="client2" type="radio" name="avatar" value="client2"/>
							<label class="drinkcard-av client2"for="client2"></label>
							<input id="client3" type="radio" name="avatar" value="client3"/>
							<label class="drinkcard-av client3" for="client3"></label>
							<input id="client4" type="radio" name="avatar" value="client4"/>
							<label class="drinkcard-av client4" for="client4"></label>
							<input id="client5" type="radio" name="avatar" value="client5"/>
							<label class="drinkcard-av client5" for="client5"></label>
							<input id="client6" type="radio" name="avatar" value="client6"/>
							<label class="drinkcard-av client6" for="client6"></label>
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
	<script src="../../js/scripts_client.js"></script>

</body>
  
</html>
