
dataobj = {
    lastdata: 1
  };
function setChart() {
  $.ajax({
    url: "http://localhost/mfsc/chartjs/data.php",
    method: "GET",
    success: function (data) {
      console.log(data);
      console.log(data.length);
      console.log(dataobj['lastdata']);
      var player = [];
      var score = [];

      for(var i in data) {
        player.push("Player " + data[i].playerid);
        score.push(data[i].score);
      }
      var chartdata = {
        labels: player,
        datasets : [
          {
            label: 'Player Score',
            color: 'rgba(36,173,227,.6)',
            fontColor: 'white',
            backgroundColor: 'rgba(36,173,227,.6)',
            borderColor: '#fff',
            hoverBackgroundColor: 'rgba(36,173,227,1)',
            hoverBorderColor: 'rgba(36,173,227,1)',
            data: score
          }
        ]
      };

      var ctx1 = $("#mycanvas1");
      var ctx2 = $("#mycanvas2");
      var ctx3 = $("#mycanvas3");

      showbar=()=> {
        ctx2.hide();
        ctx3.hide();
        ctx1.show();
        var barGraph = new Chart(ctx1, {
          type: 'bar',
          data: chartdata,
          
        });
      }
      showline=()=> {
        ctx2.show();
        ctx1.hide();
        ctx3.hide();
        var lineGraph = new Chart(ctx2, {
          type: 'line',
          data: chartdata
        });
        console.log(lineGraph);
      }
      showpie=()=>{
        ctx3.show();
       ctx1.hide();
       ctx2.hide();
       console.log(ctx3.is(":visible"));
        var pieGraph = new Chart(ctx3, {
          type: 'pie',
          data: chartdata
        });
      }
      if(dataobj['lastdata']!=data.length){
        if (ctx3.is(":visible")) {
          showpie();
        } else if(ctx2.is(":visible")) {
            showline();
        } else {
            showbar();
        } 
        dataobj['lastdata']=data.length;
    } else{
          console.log("Wait for update");
      }
    },

    async: false,
    error: function(data) {
      console.log(data);
    }
  });
}
setChart();
 var setChart  = setInterval(setChart,2000);