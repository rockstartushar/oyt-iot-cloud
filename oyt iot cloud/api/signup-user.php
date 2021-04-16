<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <title>OYT IOT Cloud - Signup Form</title>
    <link rel="stylesheet" href="./../assets/css/signinup.css">
    <link rel="stylesheet" href="./../assets/css/main.css">
</head>
<body>
    <div class="container">
        <div class="left-text top-text">
            <h2>OYT IoT Cloud<br> Signup Page</h2>
            <p>Do you want to explore our iot cloud? Signup Fast!</p>
        </div>
        <div class="main">
            <form class="signup-form" action="signup-user.php" method="POST" autocomplete="">
            <h1></h1>
                <h2 class="text-center">Signup Form</h2>
                <p class="text-center">It's quick and easy.</p>
                <?php
                if(count($errors) == 1){
                    ?>
                    <div class="alert alert-danger text-center">
                        <?php
                        foreach($errors as $showerror){
                            echo $showerror;
                        }
                        ?>
                    </div>
                    <?php
                }elseif(count($errors) > 1){
                    ?>
                    <div class="alert alert-danger">
                        <?php
                        foreach($errors as $showerror){
                            ?>
                            <li><?php echo $showerror; ?></li>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
                <div class="form-group">
                    <input class="form-control" type="text" name="name" placeholder="Full Name" required value="<?php echo $name ?>">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required>
                </div>
                <div class="form-group">
                    <button class="form-control submit-btn" type="submit" name="signup">Signup</button>
                </div>
                <div class="link login-link">Already a member? <a href="login-user.php">Login here</a></div>
            </form>
    </div>
</body>
</html>