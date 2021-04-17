<?php require_once "controllerUserData.php"; ?>
<?php
if($_SESSION['info'] == false){
    header('Location: login-user.php');  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <title>Login Form</title>
    <link rel="stylesheet" href="./../assets/css/signinup.css">
    <link rel="stylesheet" href="./../assets/css/main.css">
</head>
<body>
<div class="container">
        <div class="left-text top-text">
            <h2>OYT IoT Cloud<br> Password Changed Page</h2>
            <p>Your New Password is all set, successfully.</p>
        </div>
        <div class="main">
            <div class="login-form">
                <form action="login-user.php" method="POST">
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                        <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <button class="form-control submit-btn" type="submit" name="login-now">Login Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>  
    <div class="footer">
        oxymoratechnology.pvt.ltd.
    </div> 
</body>
</html>