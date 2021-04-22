// Validation
function validatetologin() {
  var jwt1 = getCookie("jwt1");
  $.post(
    "validate_token.php",
    JSON.stringify({
      jwt: jwt1,
    })
  )
  .done(function (result) {
    // console.log(result,"jwt");
    if (typeof result == "string") {
      result = JSON.parse(result);
    }
    if (result.message == "Access granted.") {
      console.log(result.data.user);
      console.log(result);
      $("#username").html(result.data.user);
      $("#name").val(result.data.user);
      $("#email").val(result.data.email);
      $("title").html(`${result.data.user} | Projects`);
    }
  })
  .fail(function (result) {
    // $("#response").html(response.message);
    window.location =
      "http://localhost/mfsc2/oyt%20iot%20cloud/api/login-user.php";
  });
}
validatetologin();
// On logout click
document.querySelector("#logout").onclick =function(){
  setCookie("jwt1", "", 1);
  window.location =
        "http://localhost/mfsc2/oyt%20iot%20cloud/api/login-user.php";
}
// addprojectmodal
var addprojectmodal = document.querySelector(".addprojectmodal");
var addprojectmodalclose = document.querySelector(".addprojectmodalclose");
var createbtn = document.querySelector(".create");
createbtn.onclick = function () {
  validatetologin();
  addprojectmodal.style.display = "block";
};
window.onclick = function (event) {
  if (event.target == addprojectmodal) {
    addprojectmodal.style.display = "none";
  }
};
addprojectmodalclose.onclick = function () {
  addprojectmodal.style.display = "none";
};
// updateaccountmodalform
var updateaccountmodal = document.querySelector(".updateaccountmodal");
var updateaccountmodalclose = document.querySelector(".updateaccountmodalclose");
var updatebtn = document.querySelector(".updatebtn");
updatebtn.onclick = function () {
  validatetologin();
  updateaccountmodal.style.display = "block";
};
window.onclick = function (event) {
  if (event.target == updateaccountmodal) {
    updateaccountmodal.style.display = "none";
  }
};
updateaccountmodalclose.onclick = function () {
  updateaccountmodal.style.display = "none";
};
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
                      <td><button>Edit</button></td>
                      <td><button>Delete</button></td>
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
      // alert(typeof evt);
      let projects = "";
      evt.forEach(
        ({ id, project_name, project_des, created_at }) =>
          (projects += `<tr>
							<td>${id}</td>
							<td>${project_name}</td>
							<td>${project_des}</td>
							<td>${created_at}</td>
              <td><button>Edit</button></td>
              <td><button>Delete</button></td>
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
    addprojectmodal.style.display = "none ";
    Comet.send(content1, content2);
  });
  $("#project_des").keyup(function (evt) {
    if (evt.keyCode == 13) {
      var content1 = $("#project_name").val();
      var content2 = $("#project_des").val();
      $("#project_name").val("");
      $("#project_des").val("");
      addprojectmodal.style.display = "none ";
      Comet.send(content1, content2);
    }
  });
  Comet.connect();
  Comet.send();
});
