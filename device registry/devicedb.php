<?php

$conn=mysqli_connect("localhost", "root", "");
mysqli_select_db($conn,"test");
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>