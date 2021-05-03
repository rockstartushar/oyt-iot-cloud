<?php
require "controllerUserData.php";
$device_name = "";
$errors = array();
$device_type = "";
$device_name = mysqli_real_escape_string($con, $_POST['device_name']);
$device_type = mysqli_real_escape_string($con, $_POST['device_type']);
$device_token = mysqli_real_escape_string($con, $_POST['device_token']);
$field_type = mysqli_real_escape_string($con, $_POST['field_type']);
$field_name = mysqli_real_escape_string($con, $_POST['field_name']);
$projectid = mysqli_real_escape_string($con, $_POST['projectid']);

// Set project id cookie
setcookie("projectid", $projectid);
echo $device_type;
// Attempt create table query execution
$sql = "CREATE TABLE IF NOT EXISTS projectdevices(
`id` int(11) NOT NULL auto_increment,
  `device_name` varchar(255) default NULL,
  `device_type` varchar(255) default NULL,
  `device_token` varchar(255) default NULL,
  `field_name` varchar(255) default NULL,
  `field_type` varchar(255) default NULL,
  `created_at` datetime default NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  FOREIGN KEY (project_id) REFERENCES userproject(id),
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
    $insert_data = "INSERT INTO projectdevices (id, device_name, device_type, device_token, field_name, field_type, created_at, project_id) values(NULL ,'$device_name', '$device_type','$device_token', '$field_name', '$field_type', NOW(), $projectid)";
    $data_check = mysqli_query($con, $insert_data);
    if ($data_check) {
        if($field_type =="varchar(255)"){
            $sql = "CREATE TABLE IF NOT EXISTS `$device_token`(
            `id` int(11) NOT NULL auto_increment,
              `field_name` varchar(255) default NULL,
              `at` datetime default NULL,
              PRIMARY KEY  (`id`),
              KEY `at` (`at`)
            )";
        } else{
            $sql = "CREATE TABLE IF NOT EXISTS `$device_token`(
                `id` int(11) NOT NULL auto_increment,
                  `field_name` int(11) default NULL,
                  `at` datetime default NULL,
                  PRIMARY KEY  (`id`),
                  KEY `at` (`at`)
                )";
        }
            if (mysqli_query($con, $sql)) {
                echo "Device data Table created successfully.";
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
            }
        echo "Project created succesfully";
    } else {
        echo "Project not created";
    }
} else {
    $errors['db-error'] = "Failed while inserting data into database!";
    echo $errors['db-error'];
}

?>