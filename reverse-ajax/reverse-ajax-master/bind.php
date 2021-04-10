<?php

require "db.php";


$id = @$_COOKIE["message_id"];
echo $id;
if (!$id) $id = 0;
function mysqli_result($res, $row, $field=0) { 
    $res->data_seek($row); 
    $datarow = $res->fetch_array();
    return $datarow[$field]; 
} 
while (mysqli_result(mysqli_query($conn, "select count(*) from messages where id > $id"), 0, 0) < 1) {
	usleep(50000);
}

$query = mysqli_query($conn,"select * from messages where id > $id order by id");
$data = "";

while ($row = mysqli_fetch_assoc($query)) {
	$id = $row["id"];
	$data .= $row["message"] . "<br />";
}

setcookie("message_id", $id);

header("HTTP/1.x 200 OK", true);
echo $data;
