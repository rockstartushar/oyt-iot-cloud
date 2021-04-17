<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <title>Code Verification</title>
    <link rel="stylesheet" href="./../assets/css/signinup.css">
    <link rel="stylesheet" href="./../assets/css/main.css">
</head>
<body>
<div class="container">
        <div class="left-text top-text">
            <h2>OYT IoT Cloud<br> Email Verification Page</h2>
            <p>You are just one step away from using our IoT Cloud services.</p>
        </div>
        <div class="main">
            <div class="otp-form">
                <form action="user-otp.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Code Verification</h2>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="number" name="otp" placeholder="Enter verification code" required>
                    </div>
                    <div class="form-group">
                        <button class="form-control submit-btn" type="submit" name="check">Submit</button>
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