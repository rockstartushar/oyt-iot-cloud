// Validation
var id = "";
console.log(getCookie("jwt1"));
validatetologin();
// On logout click
document.querySelector("#logout").onclick = function () {
  setCookie("jwt1", "", 1);
  window.location =
    "http://localhost/mfsc2/oyt%20iot%20cloud/api/login-user.php";
};
// updateaccountmodalform
var updateaccountmodal = document.querySelector(".updateaccountmodal");
var updateaccountmodalclose = document.querySelector(
  ".updateaccountmodalclose"
);
var updatebtn = document.querySelector(".updatebtn");
updatebtn.onclick = function () {
  validatetologin();
  alert("dfhi");
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
$(document).on("submit", "#update_account_form", function () {
  validatetologin();
  var jwt = getCookie("jwt1");
  var obj = [];
  obj.email = $("#email").val();
  obj.name = $("#name").val();
  obj.password = $("#password").val();
  obj.jwt = jwt;

  // sending data to api here
  $.ajax({
    url: "updateuser.php",
    type: "POST",
    data: {
      name: obj.name,
      email: obj.email,
      password: obj.password,
      jwt: obj.jwt,
    },
    success: function (result) {
      console.log(result);
      // tell the user account was updated
      // console.log(result);
      console.log(result);
      // store new jwt to coookie
      setCookie("jwt1", result.jwt1, 1);
      validatetologin();
    },

    // errors is handling here
    // show error message to user
    error: function (xhr, resp, text) {
      console.log(xhr, resp, text);
      alert(xhr.responseJSON);
      setCookie("jwt1", "", 1);
      window.location =
        "http://localhost/mfsc2/oyt%20iot%20cloud/api/login-user.php";
    },
  });
  return false;
});

// Create/add Project
// addprojectmodal
var addprojectmodal = document.querySelector(".addprojectmodal");
var addprojectmodalclose = document.querySelector(".addprojectmodalclose");
var createbtn = document.querySelector(".create");
var globlelastId;
createbtn.onclick = function () {
  validatetologin();
  addprojectmodal.style.display = "block";
};
window.onclick = function (event) {
  if (event.target == addprojectmodal) {
    alert(id);
    addprojectmodal.style.display = "none";
  }
};
addprojectmodalclose.onclick = function () {
  addprojectmodal.style.display = "none";
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
        // console.log(evt[0].id);
        
        let projects = "";
        if(globlelastId!=evt[0].id){
          evt.forEach(
          ({ id, project_name, project_des, created_at }) =>
            (projects = `<tr>
											<td pj-id="${id}">${id}</td></td>
											<td pj-id="${id}">${project_name}</td>
											<td pj-id="${id}">${project_des}</td>
											<td pj-id="${id}">${created_at}</td>
                      <td pj-id="${id}"><button onclick="showeditprojectmodal(${id})">Edit</button></td>
                      <td pj-id="${id}"><button onclick="showdeleteprojectmodal(${id})">Delete</button></td>
                      <td pj-id="${id}"><button onclick="gotodashboard(${id})">Enter</button></td>
										</tr>`)
        );
      }
        globlelastId=evt[0].id;
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
      userid: id,
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
      var len=evt.length;
      globlelastId=evt[len-1].id;
      let projects = "";
      evt.forEach(
        ({ id, project_name, project_des, created_at }) =>
          (projects += `<tr>
							<td pj-id="${id}">${id}</td>
							<td pj-id="${id}">${project_name}</td>
							<td pj-id="${id}">${project_des}</td>
							<td pj-id="${id}">${created_at}</td>
              <td pj-id="${id}"><button onclick="showeditprojectmodal(${id})">Edit</button></td>
              <td pj-id="${id}"><button onclick="showdeleteprojectmodal(${id}")>Delete</button></td>
              <td pj-id="${id}"><button onclick="gotodashboard(${id})">Enter</button></td>
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
    validatetologin();
    if (content1 !== "" && content2 !== "") {
      $("#project_name").val("");
      $("#project_des").val("");
      addprojectmodal.style.display = "none ";
      Comet.send(content1, content2);
    } else {
      $("#projectmodalerror").html("No field should be left empty.");
    }
  });
  // $("#project_des").keyup(function (evt) {
  //   if (evt.keyCode == 13) {
  //   if(content1!=="" && content2!==""){
  //     var content1 = $("#project_name").val();
  //     var content2 = $("#project_des").val();
  //     $("#project_name").val("");
  //     $("#project_des").val("");
  //     addprojectmodal.style.display = "none ";
  //     Comet.send(content1, content2);
  //   } else{
  //     $("#projectmodalerror").html("No field should be left empty.")
  //   }
  // }
  // });
  Comet.connect();
  // Comet.send();
});
// editformodalform
var editprojectmodal = document.querySelector(".editprojectmodal");
var editprojectmodalclose = document.querySelector(".editprojectmodalclose");
function showeditprojectmodal(id) {
  validatetologin();
  // alert(id);
  var projectdetails = document.querySelectorAll(`[pj-id=${CSS.escape(id)}]`);
  console.log(projectdetails[1].innerHTML);
  $("#new_project_name").val(projectdetails[1].innerHTML);
  $("#new_project_des").val(projectdetails[2].innerHTML);

  setCookie("editprojectid", id, 1);
  editprojectmodal.style.display = "block";
}
window.onclick = function (event) {
  if (event.target == editprojectmodal) {
    editprojectmodal.style.display = "none";
  }
};
editprojectmodalclose.onclick = function () {
  editprojectmodal.style.display = "none";
};
$(document).on("submit", "#editprojectmodalform", function () {
  validatetologin();
  // var jwt = getCookie("jwt1");
  var projectid = getCookie("editprojectid");
  var obj = [];
  obj.projectname = $("#new_project_name").val();
  obj.projectdes = $("#new_project_des").val();
  obj.projectid = projectid;
  // obj.jwt = jwt;

  // sending data to api here
  $.ajax({
    url: "editproject.php",
    type: "POST",
    data: {
      projectname: obj.projectname,
      projectdes: obj.projectdes,
      projectid: obj.projectid,
      // jwt: obj.jwt,
    },
    success: function (result) {
      console.log(result);
      // tell the user account was updated
      // store new jwt to coookie
      // setCookie("jwt1", result.jwt1, 1);
      validatetologin();
    },

    // errors is handling here
    // show error message to user
    error: function (xhr, resp, text) {
      console.log(xhr, resp, text);
      // alert(xhr.responseJSON);
      // setCookie("jwt1", "", 1);
      window.location =
        "http://localhost/mfsc2/oyt%20iot%20cloud/api/login-user.php";
    },
  });
  return false;
});
// Go to dashbpard
function gotodashboard(id) {
  validatetologin();
  setCookie("dashboardprojectid", id, 1);
  window.location =
    "http://localhost/mfsc2/oyt%20iot%20cloud/api/dashboard.php";
}
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
