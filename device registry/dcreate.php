<?php

//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'chart_db');

//get connection
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$conn){
  die("Connection failed: " . $mysqli->error);
}

 // header("HTTP/1.x 501 Internal Error", true);

$playerid = @$_COOKIE["message_id"];
 if (!$playerid) $playerid = 90;
// echo mysqli_query($conn, "select count(*) from score where playerid > $playerid");
function mysqli_result($res, $row, $field=0) { 
    $res->data_seek($row);
    $datarow = $res->fetch_array(); 
    return $datarow[$field]; 
}
 while (mysqli_result(mysqli_query($conn, "select count(*) from score where playerid > $play