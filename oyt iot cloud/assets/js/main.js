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
        menu.style.marginTop="30px";
    } else {
        list.style.display="flex";
        menu.innerHTML="&times;";
        menu.style.marginTop="18px";
    }
}