<?php
require "controllerUserData.php";
$device_name = "";
$errors = array();
$datatype = "";
$device_name = mysqli_real_escape_string($con, $_POST['device_name']);
$email = $_SESSION['email'];
$datatype = mysqli_real_escape_string($con, $_POST['datatype']);
$unit = mysqli_real_escape_string($con, $_POST['unit']);

echo $datatype;
// Attempt create table query execution
$sql = "CREATE TABLE IF NOT EXISTS projectdevices(
`id` int(11) NOT NULL auto_increment,
  `device_name` varchar(255) default NULL,
  `datatype` varchar(255) default NULL,
  `unit` varchar(255) default NULL,
  `created_at` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `created_at` (`created_at`)
)";
if (mysqli_query($con, $sql)) {
    echo "Table created successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

$project_check = "SELECT * FROM projectdevices WHERE device_name = '$device_name'";
$res = mysqli_query($con, $project_check);
if (mysqli_num_rows($res) > 0) {
    $errors['device_name'] = "Device name that you have entered is already exist!";
}
if (count($errors) === 0) {
    $insert_data = "INSERT INTO projectdevices (id, device_name, datatype, unit, created_at)
    values(NULL ,'$device_name', '$datatype','$unit', NOW())";
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