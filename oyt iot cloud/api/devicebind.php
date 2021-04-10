<?php
header('Content-Type: application/json');

require "connection.php";

$id = @$_COOKIE["device_sno"];
if (!$id) $id = 0;
function mysqli_result($res, $row, $field=0) { 
    $res->data_seek($row); 
    $datarow = $res->fetch_array();
    return $datarow[$field]; 
} 
while (mysqli_result(mysqli_query($con, "select count(*) from projectdevices where id > $id"), 0, 0) < 1) {
	usleep(50000);
}

$query = mysqli_query($con,"select * from projectdevices order by id");

$data = array();
while ($row = mysqli_fetch_assoc($query)) {
	$id = $row["id"];
	$data[] = $row;
}

setcookie("device_sno", $id);

//close connection
$con->close();

//now print the data
print json_encode($data);
?>