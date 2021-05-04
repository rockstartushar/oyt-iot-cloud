<?php
header('Content-Type: application/json');

require "connection.php";
// $project_id=@$_COOKIE["projectid"];
// $id = @$_COOKIE["device_sno"];
$id ="";
$device_token= $_POST['device_token'];
// if (!$id) $id = 0;
// function mysqli_result($res, $row, $field=0) { 
//     $res->data_seek($row); 
//     $datarow = $res->fetch_array();
//     return $datarow[$field];
// } 
// while (mysqli_result(mysqli_query($con, "select count(*) from projectdevices where id > $id"), 0, 0) < 1) {
// 	usleep(50000);
// }

$query = mysqli_query($con,"select * from `$device_token` order by id");

$data = array();
while ($row = mysqli_fetch_assoc($query)) {
	$id = $row["id"];
	// if($row["project_id"]==$project_id){
        $data[] = $row;
    // }
}

setcookie("charts_sno", $id);

//close connection
$con->close();

//now print the data
print json_encode($data);
?>