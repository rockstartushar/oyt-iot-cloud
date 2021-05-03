// creating feeds files
document.querySelector(".latestfeeddiv").onclick= function () {
  // var jwt = getCookie("jwt1");
  var obj = [];
  obj.feedname = document.querySelector(".feedtitle").innerHTML;

  // sending data to api here
  $.ajax({
    url: "feeds.php",
    type: "POST",
    data: {
      feedname: obj.feedname,
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
}

// Intro section data rendering
var timer=0;
setInterval(showIntroData, 2500);
function showIntroData() {
    var txt= document.querySelector(".des");
    // var txt2= document.querySelector(".des2");
    // var txt3= document.querySelector(".des3");
    var introimg = document.querySelector(".iotintro");
    switch(timer%3){
        case 0:
        txt.innerHTML='<h1>Get!!</h1><hr><h5><span>&check; </span>Sign Up with verification</h5><h5><span>&check;</span> Login with same</h5><h5><span>&check;</span> Create project & add details</h5>';
        introimg.classList.toggle("introimg1");
        if(timer>2){
          introimg.classList.toggle("introimg3"); 
        }
        break;
        case 1: 
        txt.innerHTML='<h1>Set!!</h1><hr><h5><span>&check;</span> Add your hardware devices!!</h5><h5><span>&check;</span>Select services you require </h5><h5><span>&check;</span> Configure your dashboard</h5>';
        introimg.classList.toggle("introimg1");
        introimg.classList.toggle("introimg2");
        // introimg.classList.toggle("introimg3");
        break;
        case 2: 
        txt.innerHTML='<h1>& Go...</h1><hr><h5><span>&check;</span> Real time Data visuals</h5><h5><span>&check;</span> Integration with multiple apps & Event driven services </h5><h5><span>&check;</span> & lot more to explore</h5>';
        introimg.classList.toggle("introimg2");
        introimg.classList.toggle("introimg3");        
        break;
    }
    timer++;
}
showIntroData();

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}