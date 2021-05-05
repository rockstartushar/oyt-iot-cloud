<?php
require "connection.php";
$device_token =$_POST["export_device_token"];
$query = mysqli_query($con,"select * from `$device_token` order by id");

$data = array();
while ($row = mysqli_fetch_assoc($query)) {
	$id = $row["id"];
	// if($row["project_id"]==$project_id){
        $data[] = $row;
    // }
}
//close connection
$con->close();

//now print the data
print json_encode($data);
?>