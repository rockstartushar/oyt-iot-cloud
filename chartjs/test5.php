<?php

if(isset($_GET["truncate"]))
	
{
	$uniq=$_GET["uniq"];
	
	$dbuser="root";
	$dbpass="";
	$dbhost="localhost";
	$dbname="chart_db";
	
	$connect=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die("<script>alert('ERROR WHILE CONNECTING WITH DB')</script>");
	
	$operation="TRUNCATE TABLE opp1";
	
	$result=mysqli_query($connect,$operation) or die("ERROR WHILE PERFORMING OPS WITH DB");
	
	if($result)
	{
		echo "<script>alert('SUCCESSFULLY TRUNCATED')</script>";
	}
	else
	{
		echo "<script>alert('ERROR WHILE TRUNCATING')</script>";
	}
	
}


?>