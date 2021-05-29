
<?php

ob_start();
session_start();
ob_start();
error_reporting(0);

$uniq = $_SESSION["id"];

if ($uniq == "") {
  $uniq = $_SESSION["id1"];
} else {
  $uniq = $_SESSION["id"];
}


//$uniq is the table name
global $uniq;

setcookie("visits", $count, time() + 3600, "/", "", 0);
setcookie("time", $lvisit, time() + 3600, "/", "", 0);

?>

<?php



$time = date('d-m-Y h:m:s');
$lat = $_GET["lat"];
$long = $_POST["long"];

// global $long;
// global $lat;
echo "hrll";
echo $lat;
echo $long;
?>


<html>

<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta http-equiv="refresh" content="30">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="materialize/css/materialize.css">
  <link rel="stylesheet" type="text/css" href="materialize/css/materialize.min.css">

  <script type="text/css" src="materialize/js/materialize.js"></script>
  <script type="text/css" src="materialize/js/materialize.min.js"></script>

  <title>OYT CLOUD ©</title>
  <link rel='stylesheet' type='text/css' href='tomtomexamples/sdk/map.css' />
  <script src='tomtom/tomtom.min.js'></script>
  <style>
    #map {
      height: 100%;
      width: 100%;
    }
  </style>

</head>

<body>



  <nav>
    <div class="nav-wrapper" style="background-color:grey;">
      <a href="afterlogin.php" class="brand-logo" align=left;><img src="IMG/oxy.png" height=55px width=70px align="left"></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="index.php">Home</a></li>
        <li><a href="afterlogin.php">Dashboard</a></li>
        <li><a href="gas.php">GAS map</a></li>
        <li><a href="data.php">IoT Data Entry</a></li>
        <li><a href="logout.php">Log-out</a></li>
      </ul>
    </div>
  </nav>



  <div id="map">

    <script>
      var oxymora = [<?php echo $lat; ?>, <?php echo $long; ?>]; //map init
      var map = tomtom.L.map('map',

        {
          key: 'AsE8VTR69t4Tpd3huAQREenIjDregcvY',
          basePath: 'tomtom',
          center: oxymora,
          zoom: 5
        }
      );
      //marker
      var marker = tomtom.L.marker(oxymora).addTo(map);
      marker.bindPopup('Current Location');
    </script>

  </div>



  <div class="row">
    <div class="col s12 m6">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text" style="width:100vh; ">
          <span class="card-title">Updation link for lat and long</span>
          <p> for showing the live location</p>
        </div>
        <div class="card-action">
          <a href="http://www.cloud.oytechnology.com/test2.php?uniq=<?php echo $uniq ?>&lat=&long=&update" target="_blank">http://www.cloud.oytechnology.com<br>/test2.php?uniq=<?php echo $uniq ?><br>&lat=&long=&update</a>
        </div>
      </div>
    </div>
  </div>


  <footer class="page-footer" style="background-color: black;">
    <div class="container">
      <div class="row">

        <h3 class="white-text" align=center>&copyOxYmora Pvt. Ltd.<br> <img src="IMG/oxy.png" height="170px" width="220px"></h3>

        <div class="col l6 s12">

          <p class="grey-text text-lighten-4">
          </p>

          <h4>Contact Us</h4>


          <a href="#"><img src="IMG/md_5a9797d302f17.png" height=100px width=100px></a>
          <br>

          <a href="#"><img src="IMG/sm_5a9794da1b10e.png" height=100px width=100px></a>
          <br>
          <a href="#"><img src="IMG/1024px-Google_Plus_logo_2015.svg.png" height=100px width=100px></a>
          <br>
          <a href="#"><img src="IMG/Instagram_icon.png" height=80px width=80px></a>
          <br>
          <a href="#"><img src="IMG/square-linkedin-512.png" height=80px width=80px></a>

        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text"></h5>
          <ul class="tabular">
            <li>
              <h3><i class="medium material-icons">home</i></h3>

              269,3rd Floor,SHRIRAJ TOWER,
              Mahavir Nagar-2nd, Mahaveer Nagar 2,
              Maharani Farm, Phase-II, Durgapura,
              Jaipur, Rajasthan 302018

            </li>
            <li>
              <h3><i class="medium material-icons">contact_mail</i></h3>
              <a href="#">contact@oytechnology.com<br>support@oytechnology.com</a>
            </li>
            <li>
              <h3> <i class="medium material-icons">contact_phone</i></h3>
              +916376064674<br>
              +918285524418<br>
              +919664227881<br>
              +917976251595
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container" align="center">
        <hr>
        &copy OxYmora Technologies 2018-2019
      </div>
    </div>
  </footer>


</body>

</html>
map.php
Displaying map.php.