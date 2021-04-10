<?php

if(isset($_GET["truncate"]))
	
{
	$uniq=$_GET["uniq"];
	
	$dbuser="oytechno_vuser";
	$dbpass="vuser@1417";
	$dbhost="shareddb-m.hosting.stackcp.net";
	$dbname="oytechno_user";
	
	$connect=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die("<script>alert('ERROR WHILE CONNECTING WITH DB')</script>");
	
	$operation="TRUNCATE TABLE ".$uniq."";
	
	$result=mysqli_query($connect,$operation) or die("ERROR WHILE PERFORMING OPS WITH DB");
	
	if($result === TRUE)
	{
		echo "<script>alert('SUCCESSFULLY TRUNCATED')</script>";
	}
	else
	{
		echo "<script>alert('ERROR WHILE TRUNCATING')</script>";
	}
	
}


?>