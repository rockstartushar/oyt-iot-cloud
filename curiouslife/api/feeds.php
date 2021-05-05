<?php
require "connection.php";

if(!empty($_POST["feedname"])){
    $fn=$_POST['feedname'];
    $query = mysqli_query($con,"select * from feeds where title=`$fn`");
    $data = array();
        while ($row = mysqli_fetch_assoc($query)) {
    	$id = $row["id"];
        $data[] = $row;
    }
    $fn.=".php";
    $myfile = fopen("feed.php", "w") or die("Unable to open file!");
    // $html=file_get_contents('home.php');
    fwrite($myfile, $fn);
    //close connection
    $con->close();
    //now print the data
    print json_encode($data);
}
// fclose($myfile);
// header('location: feeds.php'); 
?>