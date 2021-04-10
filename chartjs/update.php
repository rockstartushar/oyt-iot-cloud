<?php
    $server = "localhost";
    $username = "root";
    $password="";
    $con = mysqli_connect( $server, $username, $password);
    if(!$con){
        die("Connection to this database failed due to " . mysqli_connect_error());
    }
    // echo "Success connecting to the db";
    
    $playerid=$_REQUEST["playerid"];
    $score=$_REQUEST["score"];
    $sql = "INSERT INTO  `chart_db`.`score`(`playerid`, `score`) VALUES ($playerid,$score) ORDER BY score";
    // echo $sql;

    if($con->query($sql)==true){
         echo "Successfully inserted also";
    }
    else {
        echo "ERROR: $sql <br> $con->error";
    }
    echo @$_COOKIE["message_id"];

    $con->close();

?>