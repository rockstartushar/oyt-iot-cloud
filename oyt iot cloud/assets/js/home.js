// Intro section data rendering
var timer=1;
setInterval(showIntroData, 5000);
function showIntroData() {
    var txt= document.querySelector(".des");
    var introimg = document.querySelector(".iotintro");
    switch(timer){
        case 1:
        txt.innerHTML='<p>Get!!</p><hr><li><span>&check; </span>Sign Up with verification</li><li><span>&check;</span> Login with same</li><li><span>&check;</span> Create project & add details</li>';
        introimg.style.backgroundImage="url('../../images/intro1.jpg')";
        break;
        case 2: 
        txt.innerHTML='<p>Set!!</p><hr><li><span>&check;</span> Add your hardware devices!!</li><li><span>&check;</span>Select services you require </li><li><span>&check;</span> Configure your dashboard</li>';
        introimg.style.backgroundImage="url('../../images/intro2.jpg')";
        break;
        case 3: 
        txt.innerHTML='<p>& Go...</p><hr><li><span>&check;</span> Real time Data visuals</li><li><span>&check;</span> Integration with multiple apps & Event driven services </li><li><span>&check;</span> & lot more to explore</li>';timer=0;
        introimg.style.backgroundImage="url('../../images/intro3.jpg')";
        break;
    }
    timer++;
}
showIntroData();