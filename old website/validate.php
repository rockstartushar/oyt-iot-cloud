<?php
include_once('connection.php');

function test_input($data)
{
	$data  = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($_SERVER["REQUEST_METHOD"]== "POST") {
	$email  = test_input($_POST["email"]);
	$password  = test_input($_POST["password"]);
	$stmt  = $conn->prepare("SELECT * FROM pre_life");
	$stmt->execute();
	$users = $stmt->fetchAll();
	
	foreach($users as $user) {
		if($user['email'] == $email ||
            $user['password'] == $password) {
			$_SESSION['name'] = $user['name'];
                header("Location: adminpage.php");
    }
    
        else {
        	echo $user['password'];
			echo '<br>';
			echo $password;
			echo $user['email'];
			echo '<br>';
			echo $email;
            echo "<script language='javascript'>";
            echo "alert('WRONG INFORMATION')";
            echo "</script>";
            die();
        }
	}
}