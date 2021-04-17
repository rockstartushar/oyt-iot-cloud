var modal = document.querySelector(".modal");
var close = document.querySelector(".close");
var createbtn = document.querySelector(".create");
createbtn.onclick = function () {
  modal.style.display = "block";
};
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
close.onclick = function () {
  modal.style.display = "none";
};
var openfaqsbtn = document.querySelector(".openfaqsbtn");
var faqs = document.querySelector(".faqs");
openfaqsbtn.onclick = function() {
	if(faqs.style.display == "block"){
		faqs.style.display = "none";
	} else{
		faqs.style.display = "block";
	}
}
Comet = {
  connect: function () {
    return $.ajax({
      url: "projectbind.php",
      method: "GET",
      success: function (evt, request) {
        if (typeof evt == "string") {
          evt = JSON.parse(evt);
          console.log(evt);
        }
        alert(typeof evt);
        let projects = "";
        evt.forEach(
          ({ id, project_name, project_des, created_at }) =>
            (projects = `<tr>
											<td>${id}</td>
											<td>${project_name}</td>
											<td>${project_des}</td>
											<td>${created_at}</td>
										</tr>`)
        );

        // $("#destiny-area").prepend(evt + "<br />");
        document.getElementById("divtable").innerHTML += projects;
        document.addEventListener("DOMContentLoaded", Comet.success);
      },
      complete: function () {
        Comet.connect();
      },
    });
  },

  send: function (...projectData) {
    // if(projectData[0]=="xyz")
    $.post("addprojects.php", {
      project_name: projectData[0],
      project_des: projectData[1],
    });
  },
};

$(document).ready(function () {
  $.ajax({
    url: "project1stbind.php",
    method: "GET",
    success: function (evt, request) {
      if (typeof evt == "string") {
        evt = JSON.parse(evt);
        console.log(evt);
      }
      alert(typeof evt);
      let projects = "";
      evt.forEach(
        ({ id, project_name, project_des, created_at }) =>
          (projects += `<tr>
							<td>${id}</td>
							<td>${project_name}</td>
							<td>${project_des}</td>
							<td>${created_at}</td>
						</tr>`)
      );

      // $("#destiny-area").prepend(evt + "<br />");
      document.getElementById("divtable").innerHTML += projects;
      document.addEventListener("DOMContentLoaded", Comet.success);
    },
  });
  $("#createprojectbtn").click(function () {
    var content1 = $("#project_name").val();
    var content2 = $("#project_des").val();
    $("#project_name").val("");
    $("#project_des").val("");
    modal.style.display = "none ";
    Comet.send(content1, content2);
  });
  $("#project_des").keyup(function (evt) {
    if (evt.keyCode == 13) {
      var content1 = $("#project_name").val();
      var content2 = $("#project_des").val();
      $("#project_name").val("");
      $("#project_des").val("");
      modal.style.display = "none ";
      Comet.send(content1, content2);
    }
  });
  Comet.connect();
  Comet.send();
});
