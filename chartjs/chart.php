<!DOCTYPE html>
<html>
  <head>
    <title>ChartJS - BarGraph</title>
    <style type="text/css">
      #chart-container, #mycanvas1, #mycanvas2, #mycanvas3 {
        width: 494px;
        height: 247px;
        background: white;
      }
      #mycanvas2, #mycanvas3 {
        display: none;
      }
      .ctrl{
        background: grey;
        padding: 20px;
      }
      .visual{
        background: white;
      }
    </style>
  </head>
  <body>
    <div class="ctrl">
      <button onclick="showbar()">bar chart</button>
      <button onclick="showline()">line chart</button>
      <button onclick="showpie()">pie chart</button>
    </div>
    <div class="data"></div>
    <div class="visual">
      <canvas id="mycanvas1"></canvas>
      <canvas id="mycanvas2"></canvas>
      <canvas id="mycanvas3"></canvas>
    </div>

    <!-- javascript -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
  </body>
</html>