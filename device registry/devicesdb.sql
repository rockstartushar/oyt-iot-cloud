<?php

//for submitting gas values

ob_start();
session_start();
ob_start();
error_reporting(0);


if(isset($_GET["submit"]))
	
{
	
$uniq=$_GET["uniq"];
$gas=$_GET["gas"];
	
date_default_timezone_set('Asia/kolkata');
	
$time=date('d/m/Y H:i:s');

$utc=gmdate('d/m/Y H:i:s');

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
	
$