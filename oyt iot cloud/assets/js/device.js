validatetologin();
document.querySelector("#pj-name").innerHTML=getCookie("pjname")
// document.querySelector(".username").innerHTML=getCookie("pjname")

var count=0;
function showServices( device_token, field, device_type){
	// console.log("hellooooooooo",device_token.target);
	document.querySelectorAll(".active").forEach(element => {
		element.classList.remove("active");
		element.classList.add("notactive");
	});
	document.getElementById(`${device_token}`).classList.add("active");
	document.getElementById(`${device_token}`).classList.remove("notactive");
	if(count==0){
		document.querySelector(".dashboardarea").innerHTML+=`<button id="adddatamanuallymodalshowbtn" onclick="adddatamanually(\'${device_token}\')">Add Data Manually</button>`;
		count++;
	}
	$.ajax({
		url: "charts1stbind.php",
		method: "POST",
		data: {device_token: device_token},
		success: function (data, request) {
			if(device_type=="Temperature") {
				document.querySelector("#map").style.display="none";
				document.querySelector("#chart").style.display="block";
				var tm = [];
			var dataval = [];
			if(typeof(data)=='string'){
			  data=JSON.parse(data);
			}
			console.log(data);
			for(i in data) {
				tm.push(data[i].at);
				dataval.push(data[i].field_name);
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
			alert("map");
			document.querySelector("#map").style.display="block";
				document.querySelector("#chart").style.display="none";
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
		$(document).ready(function () {
			$.ajax({
			  url: "export.php",
			  method: "POST",
			  data: {export_device_token: device_token},
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
										field_name,
										at
									}, index) =>
									(tabledata += `<tr class="devicerow">
													<td class="${id}">${index+1}</td>
													<td class="${id}">${field_name}</td>
													<td class="${id}">${at}</td>
												</tr>`)
								)
		
								// $("#destiny-area").prepend(evt + "<br />");
								document.getElementById("datavaluetable").innerHTML += tabledata;
								document.addEventListener("DOMContentLoaded", Comet.success);
							},
			});
		});
}
//createChart()
function createservices(dd){
	var devicelist=document.querySelectorAll(".device_type");
	var tr=document.querySelectorAll(".devicerow");
	document.querySelector(".dashboardarea").innerHTML+=`<div class="servicesblock"><div id="chart"><canvas id="mycanvas"></canvas></div>
	<div id="map"></div></div>`;
	console.log(tr);
	for(var i=0;i<tr.length;i++){
		document.querySelector(".btnctrl").innerHTML+=`<button id="${dd[i].device_token}" class="notactive" onclick="showServices( \'${dd[i].device_token}\', \'${dd[i].field_name}\', \'${dd[i].device_type}\')">${dd[i].device_name}</button>`;
	}
	console.log(devicelist);
}
// add data manually form
var adddatamodal = document.querySelector(".adddatamodal");
document.querySelector("#adddatamodalclose").onclick=function(){
	adddatamodal.style.display="none";
}
window.onclick = function (event) {
	if (event.target == adddatamodal) {
	  adddatamodal.style.display = "none";
	}
};
function adddatamanually(device_token){
	validatetologin();
	var adddatamodalclose = document.querySelector(".adddatamodalclose");
	adddatamodal.style.display="block";
	$("#add_device_token").val(device_token);
	window.onclick = function (event) {
	  if (event.target == adddatamodal) {
	    adddatamodal.style.display = "none";
	  }
	};
Comet = {
  connect: function () {
    return $.ajax({
      url: "addchartsdata.php",
      method: "GET",
      success: function(evt, request) {
        if (typeof evt == "string") {
          evt = JSON.parse(evt);
          console.log(evt);
        }
        // console.log(evt[0].id);
        document.addEventListener("DOMContentLoaded", Comet.success);
      },
      complete: function () {
        Comet.connect();
      },
    });
  },

  send: function (...deviceDataValue) {
    // if(projectData[0]=="xyz")
    $.post("addchartsdata.php", {
		device_token: deviceDataValue[0],
		field_value: deviceDataValue[1],
    });
  },
};
$("#createprojectbtn").click(function () {
    var content1 = $("#project_name").val();
    var content2 = $("#project_des").val();
    validatetologin();
    if (content1 !== "" && content2 !== "") {
      $("#project_name").val("");
      $("#project_des").val("");
      adddatamodal.style.display = "none ";
      Comet.send(content1, content2);
    } else {
      $("#projectmodalerror").html("No field should be left empty.");
    }
  });
}
// Add charts data automatically, whenever new data is updated.
// Show device modal
document.querySelector(".showadddevicesmodalbtn").onclick=function(){
	document.querySelector(".adddevicemodal").style.display="block";
}
document.querySelector(".adddevicemodalclose").onclick=function(){
	document.querySelector(".adddevicemodal").style.display="none";
}
// window.onclick=function(){
// 	document.querySelector(".adddevicemodal").style.display="none";
// }
// Device list from the 1st time
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
							}, index) =>
							(tabledata += `<tr class="devicerow">
											<td class="${id}">${index+1}</td>
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
							}, index) =>
							(tabledata += `<tr class="devicerow">
											<td class="${id}">${index+1}</td>
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
			const btns = document.querySelectorAll(".btnctrl button")
			console.log("btns are:," ,btns)
			btns.forEach(btn => {
				btn.onclick=(e)=>{
					btn.classList.toggle("active")
				}
				
			});
			
// faq toggle
var openfaqsbtn = document.querySelector(".openfaqsbtn");
var faqs = document.querySelector(".faqs");
openfaqsbtn.onclick = function () {
  if (faqs.style.display == "block") {
    faqs.style.display = "none";
  } else {
    faqs.style.display = "block";
  }
};
	 	