<?php
    $server = "localhost";
    $username = "root";
    $password="";
    $con = mysqli_connect( $server, $username, $password);
    if(!$con){
        die("Connection to this database failed due to " . mysqli_connect_error());
    }
    // echo "Success connecting to the db";
    
    $playerid=14;
    $score=60;
    $sql = "DELETE FROM `chart_db`.`opp1`";
    // echo $sql;

    if($con->query($sql)==true){
         echo "Successfully deleted also";
    }
    else {
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();
?>