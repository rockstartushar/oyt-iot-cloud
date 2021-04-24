<?php
// required headers
header("Access-Control-Allow-Origin: http://localhost/jwt-registration-system/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// files for decoding jwt is here
// required to decode jwt
include_once 'config/core.php';
include_once 'libs/php-jwt-master/src/BeforeValidException.php';
include_once 'libs/php-jwt-master/src/ExpiredException.php';
include_once 'libs/php-jwt-master/src/SignatureInvalidException.php';
include_once 'libs/php-jwt-master/src/JWT.php';
use \Firebase\JWT\JWT;
require "controllerUserData.php";
// $decoded = "";
// $oldemail = "";
// // setting user property values here
// // set user property values
// $name = "";
// $email= "";
// $password= "";
// get jwt
// $name = $_POST['name'];
// echo json_decode($name);
// echo $name;
$jwt= $_POST['jwt'];
//  echo $jwt;
// decoding jwt here
// if jwt is not empty
    if($jwt){
        try {
            // decode jwt
            $decoded = JWT::decode($jwt, $key, array('HS256'));
            $oldemail = $decoded->data->email;
            $id = $decoded->data->id;
            // setting user property values here
            // set user property values
            $name = $_POST['name'];
            $email= $_POST['email'];
            $password= $_POST['password'];
    
    // $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    // $res = mysqli_query($con, $email_check);
    // if (mysqli_num_rows($res) > 0) {
    //     $errors['email'] = "Email that you have entered is already exist!";
    // }
    $encpass = password_hash($password, PASSWORD_BCRYPT);
    if($email!==$oldemail){
            $code = rand(999999, 111111);
            $status = "notverified";
            $update_data = "UPDATE usertable SET name='$name', email='$email', password='$encpass', code='$code', status='$status' WHERE email ='$oldemail'";
            $data_check = mysqli_query($con, $update_data);
            if ($data_check) {
                $subject = "Email Verification Code";
                $message = "Your verification code is $code";
                $sender = "From: tdangayach6@gmail.com";
                if (mail($email, $subject, $message, $sender)) {
                    $info = "We've sent a verification code to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    header('location: user-otp.php');
                    exit();
                } else {
                    $errors['otp-error'] = "Failed while sending code!";
                }
            } else{
                $info = addslashes("Failed to update data");
                echo json_encode(
                array(
                    "message" => $info,
                )
                );
            }
        } else{
            $code = 0;
            $status = "verified";
            $update_data = "UPDATE usertable SET name='$name', email='$email', password='$encpass', code='$code', status='$status' WHERE email ='$oldemail'";
            $data_check = mysqli_query($con, $update_data);
            if ($data_check) {
                $token = array(
                    "iat" => $issued_at,
                    "exp" => $expiration_time,
                    "iss" => $issuer,
                    "data" => array(
                        "id" => $id,
                        "user"=> $name,
                        "email" => $email
                    )
                 );
              
                 // set response code
                 http_response_code(200);
                 // generate jwt
                 $jwt = addslashes(JWT::encode($token, $key));
                 $info = addslashes("Successful login.");
                 echo json_encode(
                         array(
                             "message" => "Successful login.",
                             "jwt" => $jwt
                         )
                     );
            } else{
                $info = addslashes("Unable to update data");
                echo json_encode(
                array(
                    "message" => $info,
                )
                );
            }
        }
    }
catch (Exception $e) {

    // set response code
    http_response_code(401);

    // show error message
    echo json_encode(array(
        "message" => "Access denied.",
        "error" => $e->getMessage()
    ));
}
} else{
    // set response code
    http_response_code(401);
 
    // tell the user access denied
    echo json_encode(array("message" => "Access denied."));
}
