<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <title>OYT IOT Cloud - Login Form</title>
    <!-- <link rel="stylesheet" href="./../vendor/twbs/bootstrap/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="./../assets/css/signinup.css">
    <link rel="stylesheet" href="./../assets/css/main.css">
</head>

<body>
    <div class="container">
        <div class="left-text top-text">
            <h2>OYT IoT Cloud<br> Login Page</h2>
            <p>Login with your email and password to access our services.</p>
        </div>
        <div class="main">
            <div class="login-form">
                <form action="login-user.php" method="POST" autocomplete="">
                    <h2 class="text-center">Login Form</h2>
                    <?php
                    if (count($errors) > 0) {
                    ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach ($errors as $showerror) {
                                echo $showerror;
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="email" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="password" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="forgot-link"><a href="forgot-password.php">Forgot password?</a></div>
                    <div class="form-group">
                        <button class="submit-btn" type="submit" name="login">Login</button>
                    </div>
                    <div class="signup-link">Not yet a member? <a href="signup-user.php">Signup now</a></div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>