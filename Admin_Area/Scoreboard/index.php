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
  	<title>Scoreboard</title>

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
	    <h1>Scoreboard</h1>
	    <br><br><br>

	    

	    	<div class="col-md-8">
	    		<h3>Scoreboard</h3>
	    		<div id="scoreboard"></div>
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
	<script src="../../js/scripts_score.js"></script>

</body>
  
</html>