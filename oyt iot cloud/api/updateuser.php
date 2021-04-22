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
// get jwt
$data = json_decode(file_get_contents("php://input"));
//  echo $data;
// get jwt
$jwt=isset($data->jwt) ? $data->jwt : "";
//  echo $jwt;
// decoding jwt here
// if jwt is not empty
    if($jwt){
        try {

            // decode jwt
            $decoded = JWT::decode($jwt, $key, array('HS256'));
    
            // setting user property values here
            // set user property values
            $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $sql = "CREATE TABLE IF NOT EXISTS usertable(
        `id` int(11) NOT NULL auto_increment,
          `name` varchar(255) default NULL,
          `email` varchar(255) default NULL,
          `password` varchar(255) default NULL,
          `code` int(11) default(11) default NULL,
          `status` varchar(256) default NULL,
          PRIMARY KEY  (`id`)
        )";
        if (mysqli_query($con, $sql)) {
            echo "Table created successfully.";
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
    $res = mysqli_query($con, $email_check);
    if (mysqli_num_rows($res) > 0) {
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if (count($errors) === 0) {
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $update_data = "UPDATE usertable SET (name, email, password, code, status)
                        values('$name', '$email', '$encpass', '$code', '$status') WHERE id ='$id'";
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
        } else {
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }
            // update user is here
            // update the user record
            if ($user->update()) {
                // regenerate jwt is here
                // we need to re-generate jwt because user details might be different
                $token = array(
                    "iat" => $issued_at,
                    "exp" => $expiration_time,
                    "iss" => $issuer,
                    "data" => array(
                        "id" => $user->id,
                        "firstname" => $user->firstname,
                        "lastname" => $user->lastname,
                        "email" => $user->email
                    )
                );
                $jwt = JWT::encode($token, $key);
    
                // set response code
                http_response_code(200);
    
                // response in json format
                echo json_encode(
                    array(
                        "message" => "User was updated.",
                        "jwt" => $jwt
                    )
                );
            }
    
            // message if unable to update user
            else {
                // set response code
                http_response_code(401);
    
                // show error message
                echo json_encode(array("message" => "Unable to update user."));
            }
        }
    
        // catch failed decoding is here
        // if decode fails, it means jwt is invalid
        catch (Exception $e) {
    
            // set response code
            http_response_code(401);
    
            // show error message
            echo json_encode(array(
                "message" => "Access denied.",
                "error" => $e->getMessage()
            ));
        }
    }
     
    // error message if jwt is empty is here
    // show error message if jwt is empty
    else{
     
        // set response code
        http_response_code(401);
     
        // tell the user access denied
        echo json_encode(array("message" => "Access denied."));
    }
