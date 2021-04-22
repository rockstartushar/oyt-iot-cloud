<?php
require_once "controllerUserData.php";
?>
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
            <form id="login_form" class="login-form" action="" method="post">
                <h2 class="text-center">Login Form</h2>
                <p id="response">
                </p>
                <div class="form-group">
                    <input class="email" id="email" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                </div>
                <div class="form-group">
                    <input class="password" id="password" type="password" name="password" placeholder="Password" autocomplete="true" required>
                </div>
                <div class="forgot-link"><a href="forgot-password.php">Forgot password?</a></div>
                <div class="form-group">
                    <button class="submit-btn" type="submit">Login</button>
                    <!-- <input type="submit" value="submit"> -->
                </div>
                <div class="signup-link">Not yet a member? <a href="signup-user.php">Signup now</a></div>
            </form>
        </div>
    </div>
    <div class="footer">
        oxymoratechnology.pvt.ltd.
    </div>
    <script src="./../assets/js/jquery.min.js"></script>
    <script src="./../assets/js/skel.min.js"></script>
    <script src="./../assets/js/util.js"></script>
    <script src="./../assets/js/main.js"></script>
    <script>
        // function to make form values to json format
        $.fn.serializeObject = function() {
            var o = {};
            var a = this.serializeArray();
            $.each(a, function() {
                if (o[this.name] !== undefined) {
                    if (!o[this.name].push) {
                        o[this.name] = [o[this.name]];
                    }
                    o[this.name].push(this.value || '');
                } else {
                    o[this.name] = this.value || '';
                }
            });
            return o;
        };

        function validatetologin() {
            var jwt1 = getCookie("jwt1");
            $.post("validate_token.php", JSON.stringify({
                jwt: jwt1
            })).done(function(result) {
                // console.log(result,"jwt");
                if (typeof(result) == "string") {
                    result = JSON.parse(result);
                }
                if (result.message == "Access granted.") {
                    window.location="http://localhost/mfsc2/oyt%20iot%20cloud/api/createproject.php";
                }
                console.log(result.message);
            })
            .fail(function(result){
                $('#response').html(response.message);
            });
        }
            $(document).on('submit', '#login_form', function() {
                var login_form = $('#login_form');
                console.log(login_form);
                var obj = [];
                obj.email = $("#email").val();
                obj.password = $("#password").val();
                console.log(obj);
                var form_data = [{
                    "email": "test7@gmail.com",
                    "password": "test7"
                }]
                form_data = JSON.stringify(form_data);

                console.log(typeof form_data, form_data);
                $.ajax({
                    url: "login.php",
                    type: "POST",
                    data: {
                        email: obj.email,
                        password: obj.password
                    },
                    success: function(result) {
                        // console.log(result,"jwt");
                        if (typeof(result) == "string") {
                            result = JSON.parse(result);
                        }
                        if (result.message == "Successful login.") {
                            console.log(result.jwt, "vdcy", result.message);
                            // store jwt to cookie
                            setCookie("jwt1", result.jwt, 1);
                            setCookie("error", result.message, 1);
                            // console.log(getCookie("jwt1"));
                            // console.log(getCookie("error"));
                            $('#response').html("Successful login.");
                            validatetologin();
                        } else if (result.message == "Incorrect email or password!") {
                            setCookie("error", result.message, 1);
                            console.log(getCookie("error"));
                            $('#response').html("Incorrect email or password!");
                        }
                    },
                    // error response is here
                    error: function(xhr, resp, text) {
                        // on error, tell the user login has failed & empty the input boxes
                        $('#response').html("Login failed. Email or password is incorrect.");
                        login_form.find('input').val('');
                    }
                });
                return false;
            });
    </script>
</body>

</html>