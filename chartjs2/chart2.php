<?php
    $server = "localhost";
    $username = "root";
    $password="";
    $con = mysqli_connect( $server, $username, $password);
    if(!$con){
        die("Connection to this database failed due to " . mysqli_connect_error());
    }
    // echo "Success connecting to the db";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <head>
    <title>ChartJS - BarGraph</title>
    <style type="text/css">
      #chart-container, #mycanvas {
        width: 494px;
        height: 247px;
        background: white;
      }
      .ctrl{
        background: grey;
        padding:       20px;
      }
      .visual{
        background: white;
      }
    </style>
    <script type="text/javascript" src="js/jquery.min.js"></script>
  </head>

  <body>
      <script type="text/javascript" charset="utf-8">
  dataobj = {
      lastdata: 1,
      showDatafro: -1,
    };
     function showfilter() {
      alert(dataobj['showDatafro']);
      dataobj['showDatafro']=$('.filtval').value();
      alert(dataobj['showDatafro']);
    }
//     function setChart() {
//   $.ajax({
//     url: "data2.php",
//     method: "GET",
//     success: function (data) {
//           var tm = [];
//           var dataval = [];
//           if(typeof(data)=='string'){
//             data=JSON.parse(data);
//           }
//           //filteredata= data.$filter();
//           // for(var i=dataobj['showDatafro']dataobj['showDatafro']; i<dataobj['showDatafro']+9; i++) {
//           for(i in data) {
//             tm.push(data[i].at);
//             dataval.push(data[i].datavalue);
//           };
//       //     $(".data").html(data);
//       //     var chartdata = {
//       //       labels: tm,
//       //       datasets : [
//       //         {
//       //           label: 'Device Data',
//       //           color: 'rgba(36,173,227,.6)',
//       //           fontColor: 'white',
//       //           backgroundColor: 'rgba(36,173,227,.6)',
//       //           borderColor: '#fff',
//       //           hoverBackgroundColor: 'rgba(36,173,227,1)',
//       //           hoverBorderColor: 'rgba(36,173,227,1)',
//       //           data: dataval
//       //         }
//       //       ]
//       //     };
//       //     var ctx = $("#mycanvas");    
//       //     showline=() => {
//       //       ctx.show();
//       //       var lineGraph = new Chart(ctx, {
//       //         type: 'line',
//       //         data: chartdata
//       //       });
//       //       console.log(lineGraph);
//       //     }
//       // // if(dataobj['lastdata']!=data.length){
//       //    showline();
//         // dataobj['lastdata']=data.length;
//     // } else{
//     //       console.log("Wait for update");
//     //   }
//             },
//     async: false,
//     error: function(data) {
//       alert("Error! So, Can see your data here:- ", data);
//     }
//   });
// }
//                      setChart();
    Comet= {
      connect: function() {
      return $.ajax({
        url: "data2.php",
        method: "GET",
        success: function (data, request) {
          var tm = [];
          var dataval = [];
          if(typeof(data)=='string'){
            data=JSON.parse(data);
          }
          //filteredata= data.$filter();
          // for(var i=dataobj['showDatafro']dataobj['showDatafro']; i<dataobj['showDatafro']+9; i++) {
          for(i in data) {
            tm.push(data[i].at);
            dataval.push(data[i].datavalue);
          };
          $(".data").html(data);
          var chartdata = {
            labels: tm,
            datasets : [
              {
                label: 'Device Data',
                color: 'rgba(36,173,227,.6)',
                fontColor: 'white',
                backgroundColor: 'rgba(36,173,227,.6)',
                borderColor: '#fff',
                hoverBackgroundColor: 'rgba(36,173,227,1)',
                hoverBorderColor: 'rgba(36,173,227,1)',
                data: dataval
              }
            ]
          };
          var ctx = $("#mycanvas");    
          showline=() => {
            ctx.show();
            var lineGraph = new Chart(ctx, {
              type: 'line',
              data: chartdata
            });
            console.log(lineGraph);
          }
      // if(dataobj['lastdata']!=data.length){
         showline();
        // dataobj['lastdata']=data.length;
    // } else{
    //       console.log("Wait for update");
    //   }
            },
            complete: function() {
                      Comet.connect();
                    }
                  });
                },
            send: function(data) {
                    console.log("data:", data );
                    $.post("update.php", {datavalue: data});
                }
              }
          $(document).ready(function() {
        $("#sender-button").click(function() {
          var dataval = $("#data-val").val();
          $("#data-val").val('');
          console.log("3");
          Comet.send(dataval);
        })
        $("#data-val").keyup(function(evt) {
          if (evt.keyCode == 13) {
            var dataval = $("#data-val").val();
            $("#data-val").val('');
            Comet.send(dataval);
          }
        });
        Comet.connect();
      });
        console.log(Comet);

  </script>
  <div class="form">
    <input id="data-val" type="number"></input>
    <button id="sender-button">Submit Data</button>
  </div>
    <div class="ctrl">
      <button onclick="showline()">line chart</button>
      <input text="number" id="filtval" placeholder="From"></input>
      <button id="filtbtn" onclick="showfilter()">Filter</button>
    </div>
    <div class="data">
      
    </div>
    <div class="visual">
      <canvas id="mycanvas"></canvas>
    </div>
    <!-- javascript -->
    <script type="text/javascript" src="js/Chart.min.js"></script>
  </body>
</html>