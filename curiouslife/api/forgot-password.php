<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <title>OYT IoT Cloud - Forgot Password</title>
    <link rel="stylesheet" href="./../assets/css/signinup.css">
    <link rel="stylesheet" href="./../assets/css/main.css">
</head>
<body>
<div class="container">
        <div class="left-text top-text">
            <h2>OYT IoT Cloud<br> Forgot Password Page</h2>
            <p>Don't worry! You will get a new password, now!</p>
        </div>
        <div class="main">
            <div class="forgot-code-form">
                <form action="forgot-password.php" method="POST" autocomplete="">
                    <h2 class="text-center">Forgot Password Form</h2>
                    <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                    <div class="form-group">
                        <input class="email" type="email" name="email" placeholder="Enter your email address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <button class="forgot-submit" type="submit" name="check-email">Continue</button>
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