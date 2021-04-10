<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
            <form action="signup-user.php" method="POST" autocomplete="">
            <h1>Do you want to explore our iot cloud? </h1>
                <h3 class="text-center">Signup to get started!</h3>
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
                    <input class="form-control button" type="submit" name="signup" value="Signup">
                </div>
                <div class="link login-link">Already a member? <a href="login-user.php">Login here</a></div>
            </form>
    </div>
</body>
</html>