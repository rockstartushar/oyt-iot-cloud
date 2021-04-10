<?php
    $server = "localhost";
    $username = "root";
    $password="";
    $con = mysqli_connect( $server, $username, $password);
    if(!$con){
        die("Connection to this database failed due to " . mysqli_connect_error());
    }
    // echo "Success connecting to the db";
    
    $datavalue=$_REQUEST["datavalue"];
    $sql1 = "INSERT INTO  `test`.`data_table`(`datavalue`,`at`) VALUES ($datavalue, NOW()) ORDER BY datavalue";
    // echo $sql;
    if($con->query($sql1)==true){
         echo "Successfully inserted also";
    }
    else {
        echo "ERROR: $sql <br> $con->error";
    }
    echo @$_COOKIE["id"];
    $con->close();
?>