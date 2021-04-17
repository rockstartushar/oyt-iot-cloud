<?php 
require_once "login.php";
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
                <form id="login_form" class="login-form">
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
                        <input class="email" id="email" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="password" id="password" type="password" name="password" placeholder="Password" autocomplete="true" required>
                    </div>
                    <div class="forgot-link"><a href="forgot-password.php">Forgot password?</a></div>
                    <div class="form-group">
                        <button class="submit-btn" type="submit">Login</button>
                    </div>
                    <div class="signup-link">Not yet a member? <a href="signup-user.php">Signup now</a></div>
                </form>
                <p id="response">

                </p>
        </div>
    </div>
    <div class="footer">
        oxymoratechnology.pvt.ltd.
    </div>
    <script src="./../assets/js/jquery.min.js"></script>
    <script src="./../assets/js/skel.min.js"></script>
    <script src="./../assets/js/util.js"></script>
    <script>
// function to make form values to json format
$.fn.serializeObject = function(){
 
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
// setCookie() is here
function setCookie(cname, cvalue, exdays){
    var d=new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
} 
// get or read cookie
function getCookie(cname){
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' '){
            c = c.substring(1);
        }
 
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
    var submit = document.querySelector(".submit-btn");
        submit.onclick= function(){ 
         var login_form=$('#login_form');
         console.log(login_form);
        var obj=[];
        obj.email=$("#email").val();
        obj.password=$("#password").val();
        console.log(obj);
     var form_data=JSON.stringify(login_form.serializeObject());
    //  console.log(form_data);
     // http request is here
            alert("hello");
     // submit form data to api
    $.ajax({
        url: "login.php",
        type : "POST",
        contentType : 'application/json',
        data : form_data,
        success : function(result){
            console.log(result.jwt,"jwt");
            // store jwt to cookie
            setCookie("jwt", result.jwt, 1);
            console.log(getCookie("jwt"));
            $('#response').html("<div class='alert alert-success'>Successful login.</div>");
        },
        // error response is here
        error: function(xhr, resp, text){
        // on error, tell the user login has failed & empty the input boxes
        $('#response').html("<div class='alert alert-danger'>Login failed. Email or password is incorrect.</div>");
        login_form.find('input').val('');
    }
    });

 return false;
}

    
    </script>
</body>
</html>