validatetologin();
function showServices(device_token, field,device_type){
	$.ajax({
		url: "charts1stbind.php",
		method: "POST",
		data: {device_token: device_token},
		success: function (data, request) {
			if(device_type=="temperature") {
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
                label: field,
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
		//   console.log(`.${device_token}`);
          var ctx = $("canvas");
		// var ctx = $(`.${device_token}`);
          showline=() => {
            ctx.show();
            var lineGraph = new Chart(ctx, {
              type: 'line',
              data: chartdata
            });
            console.log(lineGraph);
          }
         showline();
		} else{
			alert("efg");
			// Initialize and add the map
function initMap() {
	// The location of Uluru
	const uluru = { lat: -25.344, lng: 131.036 };
	// The map, centered at Uluru
	const map = new google.maps.Map(document.getElementById("map"), {
	  zoom: 4,
	  center: uluru,
	});
	// The marker, positioned at Uluru
	const marker = new google.maps.Marker({
	  position: uluru,
	  map: map,
	});
  }
        }
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
	document.querySelector(".dashboardarea").innerHTML+=`<div class="servicesblock"><canvas id="mycanvas"></canvas>
	<div id="map"></div></div>`;
	console.log(tr);
	for(var i=0;i<trx.length;i++){
		document.querySelector(".btnctrl").innerHTML+=`<button onclick="showServices(\'${dd[i].device_token}\', \'${dd[i].field_name}\')">${dd[i].device_name}</button>`;
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
						createservices(evt);
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