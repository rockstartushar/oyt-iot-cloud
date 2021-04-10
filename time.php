<?php
date_default_timezone_set('Asia/kolkata');

//for submitting gas values

// ob_start();
// session_start();
// ob_start();
// error_reporting(0);

//for inserting data into Db that is permanently stored

$dbuser="root";
$dbpass="";
$dbhost="localhost";
$dbname="test";

$connect=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
 // or die("<script>alert('ERROR WHILE CONNECTING TO DB')</script>");
$current_date = date("Y-m-d H-i-s");
$query = "INSERT INTO tt SET te = '$current_date'";
// $time=date("d/m/Y H:i:s");
// echo $time;
if(mysqli_query($connect,$query))
	echo 'insertion success';
else
	echo 'insertion failed';




// $op2= "UPDATE opp1 SET tm='$time',gas='$gas',UTC='$utc' WHERE ";

// $result2= mysqli_query($connect,$op2) or die("<script>alert('ERROR WHILE STORING DATA IN DB')</script>");

// if($result2 === TRUE )
// {
// 	echo "<script>alert('SUCCESSFULLY INSERTED DATA')</script>";
// }
// else
// {
// 	echo "<script>alert('DATA NOT INSERTED')</script>";
// }

?>