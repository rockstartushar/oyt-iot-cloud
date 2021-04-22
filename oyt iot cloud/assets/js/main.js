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