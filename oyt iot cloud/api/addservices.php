<?php
require "controllerUserData.php";
$service_name = "";
$errors = array();
$service_des = "";
$service_name = mysqli_real_escape_string($con, $_POST['device_name']);
$email = $_SESSION['email'];
$service_des = mysqli_real_escape_string($con, $_POST['service_des']);
$service_times = mysqli_real_escape_string($con, $_POST['service_times']);

echo $service_des;
// Attempt create table query execution
$sql = "CREATE TABLE IF NOT EXISTS userservices(
`id` int(11) NOT NULL auto_increment,
  `service_name` varchar(255) default NULL,
  `service_des` varchar(255) default NULL,
  `service_times` int(11) default NULL,
  `created_at` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `created_at` (`created_at`)
)";
if (mysqli_query($con, $sql)) {
    echo "Table created successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

$project_check = "SELECT * FROM userservices WHERE device_name = '$device_name'";
$res = mysqli_query($con, $project_check);
if (mysqli_num_rows($res) > 0) {
    $errors['service_name'] = "Device name that you have entered is already exist!";
}
if (count($errors) === 0) {
    $insert_data = "INSERT INTO userservices (id, service_name, service_des, service_times, created_at)
    values(NULL ,'$service_name', '$service_des','$service_times', NOW())";
    $data_check = mysqli_query($con, $insert_data);
    if ($data_check) {
        echo "Project created succesfully";
    } else {
        echo "Project not created";
    }
} else {
    $errors['db-error'] = "Failed while inserting data into database!";
    echo $errors['db-error'];
}

?>