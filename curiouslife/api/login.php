<?php
// generate json web token
include_once 'config/core.php';
include_once 'libs/php-jwt-master/src/BeforeValidException.php';
include_once 'libs/php-jwt-master/src/ExpiredException.php';
include_once 'libs/php-jwt-master/src/SignatureInvalidException.php';
include_once 'libs/php-jwt-master/src/JWT.php';
use \Firebase\JWT\JWT;
 
// generate jwt will be here
require "controllerUserData.php";
$email = "";
$name = "";
$errors = array();
// header('location: createproject.php');
// echo file_get_contents('php://input');
$email= $_POST['email'];
$password= $_POST['password'];

$check_email = "SELECT * FROM usertable WHERE email = '$email'";
$res = mysqli_query($con, $check_email);
if (mysqli_num_rows($res) > 0) {
    $fetch = mysqli_fetch_assoc($res);
    $fetch_pass = $fetch['password'];
    if(password_verify($password, $fetch_pass)){
        $status = $fetch['status'];
        $user = $fetch['name'];
        $email = $fetch['email'];
        $id = $fetch['id'];
        if ($status == 'verified') {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            // echo $_SESSION['password'];
            $token = array(
                "iat" => $issued_at,
                "exp" => $expiration_time,
                "iss" => $issuer,
                "data" => array(
                    "id" => $id,
                    "user"=> $user,
                    "email" => $email
                )
             );
        $errors['email'] = "Successfull login";
        setcookie("userid", $id);
        // set response code
             http_response_code(200);
             // generate jwt
             $jwt = addslashes(JWT::encode($token, $key));
             echo json_encode(
                     array(
                         "message" => "Successful login.",
                         "jwt" => $jwt
                     )
                 );
            // setcookie('jwt',$jwt);
            // echo $_COOKIE[$jwt];
            // header('location: createproject.php');
        } else {
            $info = addslashes("Looks like you have not still verify your email");
            echo json_encode(
                array(
                    "message" => $info,
                    "email" => $email
                )
            );
            // $_SESSION['info'] = $info;
            // header('location: user-otp.php');
        }
    } else {
        // $errors['email'] = "Incorrect email or password!";
        $info =addslashes("Incorrect email or password!");
        echo json_encode(
            array(
                "message" => $info,
            )
        );
    }
} else {
    // $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
    $info =addslashes("Looks like you are not yet a member! Click on the bottom link to signup.");
    echo json_encode(
        array(
            "message" => $info,
        )
    );
}
// }
?>