<?php
$lan=$_POST['lan'];
$lat=$_POST['lat'];

$myfile = fopen("data.txt", "w") or die("Unable to open file!");
$txt = $lan.",".$lat;
fwrite($myfile, $txt);
fclose($myfile);
?>  