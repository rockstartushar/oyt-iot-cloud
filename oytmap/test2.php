<?php

//for giving the latest lat,long,satcon and altitude values

ob_start();
session_start();
ob_start();

//for updating to single but latest entry in that particular field

if(isset($_GET["update"]))
{

$uniq=$_GET["uniq"];
	
$lat=$_GET["lat"];
$long=$_GET["long"];

date_default_timezone_set('Asia/kolkata');
$time=date('d/m/Y H:i:s');

$utc=gmdate('d/m/Y H:i:s');  //GMT/ UTC time set


$dbuser1="oytechno_vishu2";
$dbpass1="vishu2@1417";
$dbhost1="shareddb-m.hosting.stackcp.net";
$dbname1="oytechno_vishu2";

$connect5=mysqli_connect($dbhost1,$dbuser1,$dbpass1,$dbname1) or die("<script>alert('ERROR WHILE CONNECTING WITH DB')</script>");

$ops5="UPDATE userdetails SET time='$time', UTC='$utc', lat='$lat', longi='$long' WHERE id='$uniq' ";

$result5=mysqli_query($connect5,$ops5);

if($result5 === TRUE)
{
	echo "<script>alert('LATEST VALUES INSERTED SUCCESSFULLY')</script>";
}
else
{
	echo "<script>alert('CANNT UPDATE TO LATEST VALUES)</script>";
}

}



// using mysqli_num_rows to get last row no and through that last rows fetch the last value ,,,, it will be in an array Now use this tis array value index and store it in a variable now display the same in chart.

?>