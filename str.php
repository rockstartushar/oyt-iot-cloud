<?php
    $str = "<br>this is a string.";
    echo $str;
    $lenn = strlen($str);
    echo " <br>the length of this string is: " . $lenn . ". Thankyou <br>" ;
    echo " <br>the length of this string is: " . str_word_count($str) . ". Thankyou <br>" ;   
    echo " <br>the reverse of this string is: " . strrev($str) . ". Thankyou <br>" ;
    echo " <br>the pos of this string is: " . strpos($str, "this") . ". Thankyou <br>" ;
    echo " <br>the reverse of this string is: " . str_replace("string","strg",$str) . " Thankyou <br>" ;
?>