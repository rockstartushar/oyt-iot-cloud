<?php

use PHPUnit\Util\Json;

require "controllerUserData.php";
$device_name = "";
$errors = array();
$device_token = mysqli_real_escape_string($con, $_POST['device_token']);
$field_name = mysqli_real_escape_string($con, $_POST['field_value']);

// Set project id cookie
// setcookie("projectid", $projectid);
// Attempt create table query execution
// $sql = "CREATE TABLE IF NOT EXISTS charts(
// `id` int(11) NOT NULL auto_increment,
//   `chartname` varchar(255) default NULL,
//   `deviceId` varchar(255) default NULL,
//   `field_name` varchar(255) default NULL,
//   `field_type` varchar(255) default NULL,
//   `created_at` datetime default NULL,
//   `device_id` int(11) NOT NULL,
//   PRIMARY KEY  (`id`),
//   FOREIGN KEY (device_id) REFERENCES projectdevices(id),
//   KEY `created_at` (`created_at`)
// )";
// if (mysqli_query($con, $sql)) {
//     echo "Table created successfully.";
// } else {
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
// }

$device_check = "SELECT * FROM '$device_token'";
$res = mysqli_query($con, $device_check);
// if (mysqli_num_rows($res) > 0) {
//     $errors['device_name'] = "Device name that you have entered is already exist!";
// }
// if (count($errors) === 0) {
    $insert_data = "INSERT INTO '$device_token' (id, field_name, at) values(NULL ,'$field_value', NOW())";
    $data_check = mysqli_query($con, $insert_data);
    if ($data_check) {
        echo json_encode(
            {
                message:"dataAdded";
            }
        )
    } else{
          echo "kfew";  
    }

?>