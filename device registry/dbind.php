<?php
header('Content-Type: application/json');

require "devicedb.php";

$id = @$_COOKIE["register_id"];
if (!$id) $id = 0;
function mysqli_result($res, $row, $field=0) { 
    $res->data_seek($row); 
    $datarow = $res->fetch_array();
    return $datarow[$field]; 
}
while (mysqli_result(mysqli_query($conn, "select count(*) from device_registry where id > $id"), 0, 0) < 1) {
	usleep(50000);
}

$query = mysqli_query($conn,"select * from device_registry order by id");

$data = array();
while ($row = mysqli_fetch_assoc($query)) {
	$id = $row["id"];
	$data[] = $row;
}

setcookie("register_id", $id);
$query = sprintf("SELECT * FROM device_registry ORDER BY id");

//execute query
$result = $conn->query($query);
//loop through the returned data

foreach ($result as $row) {
  $data[] = $row;
}
//free memory associated with result
$result->close();

//close connection
$conn->close();

//now print the data
print json_encode($data);
?>