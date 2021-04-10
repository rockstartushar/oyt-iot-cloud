<!DOCTYPE html>
<html>
  <head>
    <title>ChartJS - BarGraph</title>
    <style type="text/css">
      #mycanvas{
      	margin: 200px auto;
      	background: black;
      	width: 640px;

      }
      .ctrl{
      	color: yellow;
      	z-index: 100;
      }
    </style>
  </head>
  <body>

  	
      <div id="mycanvas1"></div> 
      <div id="mycanvas2"></div> 
      
    <div class="ctrl">
      <button onclick="showbar()">bar chart</button>
      <button onclick="showline()">line chart</button>
  	  <button onclick="showpie()">pie chart</button>
  	</div>

    <!-- javascript -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
  </body>
</html>