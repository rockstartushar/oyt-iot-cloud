<?php
date_default_timezone_set('Asia/kolkata');

//for submitting gas values

ob_start();
session_start();
ob_start();
error_reporting(0);


if(isset($_GET["submit"]))
	
{
	
$uniq=$_GET["uniq"];
$gas=$_GET["gas"];

//for inserting data into Db that is permanently stored

if($gas=="")
{
    echo "<script>alert('please Enter a value')</script>";
}
else
{
$dbuser="oytechno_vuser";
$dbpass="vuser@1417";
$dbhost="shareddb-m.hosting.stackcp.net";
$dbname="oytechno_user";

$connect=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die("<script>alert('ERROR WHILE CONNECTING TO DB')</script>");
	
// $op2= "INSERT INTO opp1 (tm,gas,UTC) VALUES ('$time','$gas','$utc')";
// $op2= "UPDATE opp1 SET tm='$time',gas='$gas',UTC='$utc' WHERE ";
$current_date = date("Y-m-d H-i-s");
$current_utc = gmdate("Y-m-d H-i-s");
$query = "INSERT INTO opp1 SET time = '$current_date', gas = '$gas', UTC= '$current_utc'";
// $time=date("d/m/Y H:i:s");
// echo $time;
if(mysqli_query($connect,$query))
	echo 'Insertion success';
else
	echo 'Insertion failed';
}
}
?>
