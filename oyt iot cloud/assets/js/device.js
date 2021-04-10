alert("1");
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
								datatype,
								unit,
								created_at
							}) =>
							(tabledata = `<tr>
											<td>${id}</td>
											<td>${device_name}</td>
											<td>${datatype}</td>
											<td>${unit}</td>
											<td>${created_at}</td>
										</tr>`)
						)

						// $("#destiny-area").prepend(evt + "<br />");
						document.getElementById("divtable").innerHTML += tabledata;
						document.addEventListener("DOMContentLoaded", Comet.success);
					},
					complete: function() {
						Comet.connect();
					}
				});
			},

			send: function(...deviceData) {
				$.post("adddevices.php", {
					device_name: deviceData[0],
					datatype: deviceData[1],
					unit: deviceData[2]
				});
			}
		}

		$(document).ready(function() {
			$("#submitdevice").click(function() {
				var content1 = $("#device_name").val();
				var content2 = $("#datatype").val();
				var content3 = $("#unit").val();
				$("#device_name").val('');
				$("#datatype").val('');
				$("#unit").val('');
				Comet.send(content1, content2, content3);
			})
			$("#unit").keyup(function(evt) {
				if (evt.keyCode == 13) {
					var content1 = $("#device_name").val();
					var content2 = $("#datatype").val();
					var content3 = $("#unit").val();
					$("#device_name").val('');
					$("#datatype").val('');
					$("#unit").val('');
					Comet.send(content1, content2, content3);
				}
			});

			Comet.connect();
		});