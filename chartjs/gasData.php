<?php
//setting header to json
header('Content-Type: application/json');

$uniq=$_SESSION['id'];

//database
define('DB_HOST', 'shareddb-m.hosting.stackcp.net');
define('DB_USERNAME', 'oytechno_vuser');
define('DB_PASSWORD', 'vuser@1417');
define('DB_NAME', 'oytechno_user');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}

//query to get data from the table
$query = "SELECT time, gas FROM ".$uniq." ORDER BY time";

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}
//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);
?>