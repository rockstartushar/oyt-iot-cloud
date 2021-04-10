<!DOCTYPE html>
<html>
<head>
	<title>User Personnalized PAge</title>
</head>
<body>
	<?php 
		if(session_status() == PHP_SESSION_NONE  || session_id() == '') {
    		session_start();
		}
		require_once("connection.php");
		
	?>
	<!-- Header -->
	<?php
		if(isset($_SESSION["name"])) {
    echo "Hello, " . $_SESSION['name'] . " <br> ";
	}
	else{
    // Do an action to show the user that there is no session.
    echo "no session";
}
	?>
</body>
</html>