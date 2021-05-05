// dropdown Explore
var list=document.querySelector(".explore-list");
var explorebtn=document.querySelector(".explore");
explorebtn.addEventListener("mouseover", function(){
    list.style.display="flex";
});
explorebtn.addEventListener("mouseout", function(){
    list.style.display="none";
});
var explorebtnsm=document.querySelector(".exploresm");

var listsm=document.querySelector(".explorebox");
explorebtnsm.addEventListener("mouseover", function(){
    listsm.style.display="flex";
});
explorebtnsm.addEventListener("mouseout", function(){
    listsm.style.display="none";
});

// dropdown navbox
var menu = document.querySelector(".breadcrumb");
function openNav(){
    var list = document.querySelector(".navbox");
    if(list.style.display=="flex"){
        list.style.display="none";
        menu.innerHTML=`<a class="dash"></a><a class="dash"></a><a class="dash"></a>`;
        // menu.style.marginTop="30px";
        menu.style.fontSize="1em";
        menu.style.margin="1em 1em";
    } else {
        list.style.display="flex";
        menu.innerHTML="X";
        menu.style.fontSize="2em";
        menu.style.margin="0.4em 0.5em";
        
    }
}
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

// setCookie() & getCookie() defined here
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }

        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
// validate token function
function validatetologin() {
    var jwt = getCookie("jwt1");
    $.post(
      "validate_token.php",
      JSON.stringify({
        jwt: jwt,
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
          // $("#username").html(result.data.user);
          for(var i=0; i<document.querySelectorAll(".username").length;i++){
            document.querySelectorAll(".username")[i].innerHTML=result.data.user;
          }
          $("#name").val(result.data.user);
          $("#email").val(result.data.email);
          $("title").html(`${result.data.user} | Projects`);
          id = result.data.id;
        }
      })
      .fail(function (result) {
        // $("#response").html(response.message);
        window.location =
          "http://localhost/mfsc2/oyt%20iot%20cloud/api/login-user.php";
      });
  }
  