<?php
require "controllerUserData.php";
$project_name = "";
$errors = array();
$project_des = "";
$project_name = mysqli_real_escape_string($con, $_POST['project_name']);
$email = $_SESSION['email'];
$project_des = mysqli_real_escape_string($con, $_POST['project_des']);
echo $project_des;
// Attempt create table query execution
$sql = "CREATE TABLE IF NOT EXISTS userproject(
`id` int(11) NOT NULL auto_increment,
  `project_name` varchar(255) default NULL,
  `project_des` varchar(255) default NULL,
  `created_at` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `created_at` (`created_at`)
)";
if (mysqli_query($con, $sql)) {
    echo "Table created successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

$project_check = "SELECT * FROM userproject WHERE project_name = '$project_name'";
$res = mysqli_query($con, $project_check);
if (mysqli_num_rows($res) > 0) {
    $errors['project_name'] = "Device name that you have entered is already exist!";
}
if (count($errors) === 0) {
    $insert_data = "INSERT INTO userproject (id, project_name, project_des, created_at)
    values(NULL ,'$project_name', '$project_des', NOW())";
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