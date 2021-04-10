<?php
$insert=false;
if(isset($_POST['name']))
    $server = "localhost";
    $username = "root";
    $password="";

    $con = mysqli_connect($server, $username, $password);
    if(!$con){
        die("Connection to this database failed due to " . mysqli_connect_error());
    }
    // echo "Success connecting to the db";
    
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $sql = "INSERT INTO  `pre_lifestyle`.`pre_life` ( `name`, `age`, `gender`, `email`, `phone`, `password`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$password', current_timestamp());";
    // echo $sql;

    if($con->query($sql)==true){
        // echo "Successfully inserted";
        $insert = true;
    }
    else {
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curious Life | LIFESTYLE ToolKit</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&family=Raleway:wght@500&family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Hey! We r your lifestyle helper!!</h1>
        <p>Enter your details, for analysis purpose. <br> <strong>Note:</strong> This information is used for analysis and arranging guidelines matter & Getting this website ready specifically for you! </p>
        <?php
        if($insert == true)
            echo "<p>Thanks for submitting your form. We are happy to see you joining us for transforming yourself with spiritual life.</p>"
        ?>
        <form action="signup.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your genter">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="number" name="phone" id="phone" placeholder="Enter your phone">
            <input type="password" name="password" id="password" placeholder="Enter your password">
            <input type="password" name="cpassword" id="cpassword" placeholder="Re-enter your password">
            <br>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>