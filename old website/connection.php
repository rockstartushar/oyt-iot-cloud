<?php
	$conn = "";
	try {
		$server = "localhost";
		$db = "pre_lifestyle";
    	$username = "root";
    	$password="";
	
	    	$conn = new PDO(
	    		"mysql:host=$server; dbname=pre_lifestyle",
	    		$username, $password
	    	);
	
	    	$conn->setAttribute(PDO::ATTR_ERRMODE,
	    		PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
	echo "Connection failed: " . $e->getMessage();
}
?>