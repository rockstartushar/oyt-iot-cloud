<?php 
$con = mysqli_connect('localhost', 'root', '', 'test');
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
} else{
    echo "connected to database";
}

?>