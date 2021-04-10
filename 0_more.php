<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP  tutorial</title>
</head>
<body>
    <div class="cotainer">
    <h1>Me learing PHP</h1>
    <p>Your hariol party status</p>
    <?php
        $age = 6;
        if($age==50){
            echo "areh a toh karlo hariol party.";
        } else if($age>=27){
            echo "ahi hi samay hai karlo party.";
        } else if($age==6){
            echo "Areh waah ohot sahi time for haribol party.";
        } else {
            echo "lucky yrr! Hariol!!";
        }
        $a=0;
        echo "<br>";
        $lang = array("Py","C++", "C","Js", "Node");
        echo $lang[0];
        echo count($lang);
        while ($a < count($lang)) {
            echo "<br> The value of a is: ";
            echo $lang[$a];
            $a++;
        }
        foreach ($lang as $value ) {
            echo "<br> The value of a is: ";
            echo $value;
        }
        function print5(){
            echo "<br>5";
        }
        print5();
        function print_number($number){
            echo "<br>Your number is: ";
            echo $number;
        }
        print_number(55);
    ?>
    </div>
</body>
</html>