<?php
// ob_start();
// error_reporting(0);
// session_start();
// ob_start();

// $uniq=$_SESSION['id'];

// if($uniq == "")
// {
// 	$uniq=$_SESSION['id1'];
// }
// else
// {
// 	$uniq=$_SESSION['id'];
// }

$uniq="opp1";
//$uniq is the table name
global $uniq;

global $uniq2;

setcookie("visits",$count,time()+3600,"/","",0);
setcookie("time",$lvisit,time()+3600,"/","",0);


?>


<!DOCTYPE html>


<html lang="en">
	<head>
	    
	     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	    
	    <meta http-equiv="Content-Type" content="text/html; charset=euc-jp"/>
		
		<title>OYT CLOUD</title>
		
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body>
			<header id="header">
				<h1><a href="index.html"><img src="IMG/oxy.png" height=80px width=100px></a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="afterlogin.php">Dashboard</a></li>
						<li><a href="map.php">Map</a></li>
						<li><a href="data.php">IoT data entry</a></li>
						<li><a href="logout.php">Logout</a></li>
						<li><a href="https://www.oytechnology.com">About Us</a></li>
					</ul>
				</nav>
			</header>

			<section id="main" class="wrapper">
				<div class="container">
					<header class="major">
						<h2>GAS CHARTS</h2>
						<div class="visual">
    					  <canvas id="mycanvas"></canvas>
    					</div>
					</header>
				</div>
			</section>		
			<script type="text/javascript" src="js/jquery.min.js"></script>
			<script type="text/javascript" src="js/Chart.min.js"></script>
    <script type="text/javascript">     
	dataobj = {
	    lastdata: 1
	  };
	function setChart() {
	  $.ajax({
	    url: "http://localhost/mfsc/chartjs/gasData.php",
	    method: "GET",
	    success: function (data) {
	      var time = [];
	      var gas = [];
	      for(var i in data) {
	        time.push(data[i].time);
	        gas.push(data[i].gas);
	      }
	      var chartdata = {
	        labels: time,
	        datasets : [
	          {
	            label: 'Gas Latest Data',
	            color: 'rgba(36,173,227,.6)',
	            fontColor: 'white',
	            backgroundColor: 'rgba(36,173,227,.6)',
	            borderColor: '#fff',
	            hoverBackgroundColor: 'rgba(36,173,227,1)',
	            hoverBorderColor: 'rgba(36,173,227,1)',
	            data: gas
	          }
	        ]
	      };
	      var ctx = $("#mycanvas");
	      showline=()=> {
	        if(window.lineGraph != null){
	        	console.log("Bar destroyed");
    			window.lineGraph.destroy();
			}
	        var lineGraph = new Chart(ctx, {
	          type: 'line',
	          data: chartdata
	        });
	      } 
	      if(dataobj['lastdata']!=data.length){
	            showline();
	        	dataobj['lastdata']=data.length;
	    } else{
	          console.log("Wait for update");
	      }
	    },
	    async: false,
	    error: function(data) {
	      console.log("Error in fetching data");
	    }
	  });
	}
	setChart();
	var setChart  = setInterval(setChart,2000);
  </script>
  <div id="line_top_x" align="center" style="width:auto; padding-left:15; padding-left: 5px; "><br></br></div>
		
		
	<br></br>	
	
	
	
	<div class=links>
	
	<ul>
		
	<li>Entry link for GAS</li>

	<textarea wrap="off" cols=100 rows=1>http://www.cloud.oytechnology.com/test4.php?uniq=<?php echo $uniq; ?>&gas=&submit</textarea>
		
	<li>TRUNCATING GAS</li>
	
	<textarea wrap="off" cols=100 rows=1>http://www.cloud.oytechnology.com/test5.php?uniq=<?php echo $uniq ?>&truncate</textarea>
	
	</div>
		
	</ul>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<div class="row">
						<section class="4u$ 12u$(medium) 12u$(small)" style="align-content: center; align-items: center; ">
							<h3>Contact Us</h3>
							<ul class="icons">
								<li><a href="#" class="icon rounded fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon rounded fa-facebook"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon rounded fa-instagram"><span class="label">Pinterest</span></a></li>
								<li><a href="#" class="icon rounded fa-google-plus"><span class="label">Google+</span></a></li>
							