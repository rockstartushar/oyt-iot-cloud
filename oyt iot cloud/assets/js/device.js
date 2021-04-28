function showServices(deviceid){
	alert(deviceid);
	$.ajax({
		url: "addChartsdata.php",
		method: "POST",
		data: {deviceid: getCookie("dashboardprojectid")},
		success: function (data, request) {
			var tm = [];
			var dataval = [];
			if(typeof(data)=='string'){
			  data=JSON.parse(data);
			}
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
         showline();
            },
			async: false,
			error: function(data) {
			    alert("Error! So, Can see your data here:- ", data);
			}
		});   
}
//createChart()
function createservices(dd){
	var devicelist=document.querySelectorAll(".device_type");
	var tr=document.querySelectorAll(".devicerow");
	console.log(tr);
	for(var i=0;i<tr.length;i++){
		document.querySelector(".btnctrl").innerHTML+=`<button onclick="showServices(${dd[i].id})">${dd[i].device_name}</button>`;
		document.querySelector(".dashboardarea").innerHTML+=`<div id="${dd[i].id}" class="servicesblock"><canvas class="${dd[i].id}"></canvas>
		<div class="${dd[i].id}">Map</div></div>`;
	}
	console.log(devicelist);
}

$(document).ready(function () {
	$.ajax({
	  url: "device1stbind.php",
	  method: "POST",
	  data: {projectid: getCookie("dashboardprojectid")},
	  success: function (evt, request) {
		if (typeof evt == "string") {
		  evt = JSON.parse(evt);
		  console.log(evt);
		}
		  console.log(evt[0]);

		// alert(typeof evt);
		let tabledata = "";
						evt.forEach(
							({
								id,
								device_name,
								device_type,
								created_at
							}) =>
							(tabledata += `<tr class="devicerow">
											<td class="${id}">${id}</td>
											<td class="${id}">${device_name}</td>
											<td class="${id} device_type">${device_type}</td>
											<td class="${id}">${created_at}</td>
										</tr>`)
						)

						// $("#destiny-area").prepend(evt + "<br />");
						document.getElementById("divtable").innerHTML = tabledata;
						document.addEventListener("DOMContentLoaded", Comet.success);
						createservices(evt);
					},
	});
});
Comet = {
			connect: function() {
				return $.ajax({
					url: "devicebind.php",
					method: "GET",
					success: function(evt, request) {
						if(typeof(evt) =="string"){
						 evt = JSON.parse(evt);
					}
						let tabledata = "";
						evt.forEach(
							({
								id,
								device_name,
								device_type,
								created_at
							}) =>
							(tabledata = `<tr>
											<td class="${id}">${id}</td>
											<td class="${id}">${device_name}</td>
											<td class="${id} device_type">${device_type}</td>
											<td class="${id}">${created_at}</td>
										</tr>`)
						)

						// $("#destiny-area").prepend(evt + "<br />");
						document.getElementById("divtable").innerHTML += tabledata;
						document.addEventListener("DOMContentLoaded", Comet.success);
						createservices();
					},
					complete: function() {
						Comet.connect();
					}
				});
			},

			send: function(...deviceData) {
				$.post("adddevices.php", {
					device_name: deviceData[0],
					device_type: deviceData[1],
					device_token: deviceData[2],
					field_name: deviceData[3],
					field_type: deviceData[4],
					projectid: deviceData[5]
				});
			}
		}

		$(document).ready(function() {
			$("#submitdevice").click(function() {
				var content1 = $("#device_name").val();
				var content2 = $("#device_type").val();
				var content3 = $("#device_token").val();
				var content4 = $("#field_name").val();
				var content5 = $("#field_type").val();
				var content6 = getCookie("dashboardprojectid");
				// if(content2=="Location"){
				// 	createMap(content1, content3, content4, content5);
				// } else if(content2=="Temperature"){
				// 	createChart(content1, content3, content4, content5);
				// }
				$("#device_name").val('');
				$("#device_type").val('');
				$("#device_token").val('');
				$("#field_name").val('');
				$("#field_type").val('');
				// alert(content1, content4);
				// alert(content5);
				Comet.send(content1, content2, content3, content4, content5, content6);
			})
			$("#device_token").keyup(function(evt) {
				if (evt.keyCode == 13) {
					var content1 = $("#device_name").val();
				var content2 = $("#device_type").val();
				var content3 = $("#device_token").val();
				var content4 = $("#field_name").val();
				var content5 = $("#field_type").val();
				var content6 = getCookie("dashboardprojectid");
				if(content2=="Location"){
					createMap();
				} else if(content2=="Temperature"){
					createChart();
				}
				$("#device_name").val('');
				$("#device_type").val('');
				$("#device_token").val('');
				$("#field_name").val('');
				$("#field_type").val('');
				Comet.send(content1, content2, content3, content4);
				}
			});

			Comet.connect();
		});