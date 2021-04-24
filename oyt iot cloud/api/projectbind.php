<?php
header('Content-Type: application/json');

require "connection.php";
$userid=@$_COOKIE["userid"];
$id = @$_COOKIE["register_id"];
if (!$id) $id = 0;
function mysqli_result($res, $row, $field=0) { 
    $res->data_seek($row); 
    $datarow = $res->fetch_array();
    return $datarow[$field]; 
}
$i =0;

while (mysqli_result(mysqli_query($con, "select count(*) from userproject where id > $id"), 0, 0) < 1) {
    usleep(50000);
}
$query = mysqli_query($con,"select * from userproject order by id");

$data = array();
while ($row = mysqli_fetch_assoc($query)) {
	$id = $row["id"];
	if($row["userid"]==$userid){
        $data[] = $row;
    }   
}

setcookie("register_id", $id);

//close connection
$con->close();

//now print the data
print json_encode($data);
?>