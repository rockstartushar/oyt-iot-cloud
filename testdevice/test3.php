<?php
$lan=$_POST['lan'];
$lat=$_POST['lat'];
global $lat;
global $lan;
// header("Access-Control-Allow-Origin: *");
//   header("Access-Control-Allow-Methods: POST");
//   header("Access-Control-Allow-Headers: Origin, Methods, Content-Type");
  ///
if($lan != null || $lan != ""){
  $url = 'https://www.innovativeupshot.in/cloud/test2.php?uniq=34kcduzj49peej7n9fs7&lat='.$lan.'&long='.$lat.'&update';
 
$curl = curl_init();
 
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
 
$data = curl_exec($curl);
 echo "Success";
curl_close($curl);
} else{
  echo "Value is null";
}

?>
