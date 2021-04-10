<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
</head>
<body>
    <div class="container">
        This is my first php website.
        <?php
        echo " Hello yaar ]...Jai shree krishna";
// Secret algo:::
    /*
    // This is a multiline 
    // comment.
    */
    $variable1=32;
    $variable2=21;
    echo $variable1;
    echo $variable2;
    Echo $variable1+$variable2;
    //Operators in PHP
    // Arithmetic operator
    echo "<br>";
    echo "value of variable1 + variable2 = ";
    echo $variable1+$variable2;
    echo "<br>";
    // Assignment operator
    $varNew=$variable1*$variable2;
    echo $varNew;
    // Comparison operator
    echo "<h1>Comparison</h1>";
    echo "<br>";
    echo "The value of 1==4 is";
    echo var_dump(1==4);
    echo "<br>";
    echo "The value of 1!=4 is";
    echo var_dump(1!=4);
    // Increment operator
     $variable2--;
     $variable2++;
     $variable2++;
      $variable2++;
    echo --$variable2;
    echo $variable2--;
    // Logical operator
    // and &&
    // or ||
    // zor
    // !
    $myVar = (true xor true);
    echo var_dump($myVar);
    ?>
    <br>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed dolore repellendus explicabo placeat porro iure veniam facere molestias voluptatum blanditiis ea eveniet ab in quia corporis beatae, dolorum ipsa deserunt!
    </div>
    <div>
        <?php 
        // Datatypes
        // 1. String 
        // 2. Integer
        // 3. Float
        // 4. Boolean
        // 5. Array
        // 6. Object
        $var="This is a string";
        echo var_dump($var);
        ?>
    </div>
</body>
</html>