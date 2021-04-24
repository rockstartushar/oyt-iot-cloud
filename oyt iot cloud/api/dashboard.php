<!DOCTYPE HTML>
<html lang="en">
	<head>
    <title><?php echo $fetch_info['name'] ?> | Create Projects</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="./../assets/css/main.css" />
        <link rel="stylesheet" href="./../assets/css/dashboard.css" />
	</head>
	<body>
		<!-- Navbar -->
		<div class="navbar">
			<div class="logo">
				<img width="100%" src="images/banner.jpg" alt="OYT IOT Cloud">
			</div>
			<div class="nav-list">
				<a class="nav-items" href="#">About OYT</a>
    			<a class="nav-items" href="#">Our Cloud</a>
				<div class="nav-items drop">
					<a class="nav-items explore" onclick="showexplore()" href="#">Explore Us <img style="color: white; background-color: white;" width="10px" src="images/icon/drop.png" alt=""></a>
					<div class="explore-list">
						<a class="nav-items explore-items" href="#">Our Client</a>
						<a class="nav-items explore-items" href="#">Projects</a>
						<a class="nav-items explore-items" href="#">Contact Us</a>
					</div>
				</div>
			</div>
			<div class="right-nav">
                <a class="nav-items" href="logout-user.php">Logout</a>
			</div>
			<div onclick="openNav()" class="breadcrumb">
				<a class="dash"></a>
				<a class="dash"></a>
				<a class="dash"></a>
			</div>
		</div>
        <div class="navbox">
			<a class="nav-items" href="#">About OYT</a>
			<a class="nav-items" href="#">Our Cloud</a>
			<a class="nav-items explore" onclick="showexplorebox()" href="#">Explore Us <img style="color: white; background-color: white;" width="10px" src="images/icon/drop.png" alt=""> </a>
			<div class="explorebox">
				<a class="nav-items explore-items" href="#">Our Client</a>
				<a class="nav-items explore-items" href="#">Projects</a>
				<a class="nav-items explore-items" href="#">Contact Us</a>
			</div>
			<div class="navbottom">
				<a class="nav-items" href="">Login |</a>
				<a class="nav-items" href="">Sign Up</a>
			</div>
  		</div>
          <br><br><br><br>
          <h1>Customize from scratch!..</h1>
          <p><strong>Note:- In the project/product section, you can Add__</strong></p>
          <hr>
          <div class="closedone">

          </div>
          <div class="all">
              <!-- Device section -->
              <div class="customizesection devicesec">
                  <span id="device" onclick="closeSec(id)" class="close">&times;</span>
                  <span id="device" onclick="fullScreen(id)" class="size">&#x26F6;</span>
                  <div class="devicetable"></div>
                  <h2>Add Devices</h2>
                  <b><p>Fill the form!</p></b>
                  <form action="dashboard.php" class="adddevicesform">
                      <input type="text" name="devicename" id="devicename">
                      <input type="text" name="unit" id="unit">
                      <input type="submit" value="Add">
                  </form>
                  <div class="faqs">
                    <p><b>Refer FAQs for devices section</b></p>
                    <p>Ques. </p>
                    <p>Ans</p>
                    <p>Ques. </p>
                    <p>Ans</p>
                    <p>Ques. </p>
                    <p>Ans</p>
                    <p>Ques. </p>
                    <p>Ans</p>
                    <p>Ques. </p>
                    <p>Ans</p>
                    Still, having query? find in discussion forum(for devices section):) <a href="">OYT IOT CLOUD DISCUSSION FORUM</a>
                  </div>
              </div>
              <div class="customizesection servicesec">
                  <span id="service" onclick="closeSec(id)" class="close">&times;</span>
                  <span id="service" onclick="fullScreen(id)" class="size">&#x26F6;</span>
                  <h2>Add Service Blocks</h2>
                  <div class="services">
                      <div class="servicecard">
                          <img src="images/pic03.jpg" alt="">
                          <h3>Block Name</h3>
                          <p>Options</p>
                      </div>
                      <div class="servicecard">
                          <img src="images/pic03.jpg" alt="">
                          <h3>Block Name</h3>
                          <p>Options</p>
                      </div>
                      <div class="servicecard">
                          <img src="images/pic03.jpg" alt="">
                          <h3>Block Name</h3>
                          <p>Options</p>
                      </div>
                      <div class="servicecard">
                          <img src="images/pic03.jpg" alt="">
                          <h3>Block Name</h3>
                          <p>Options</p>
                      </div>
                      <div class="servicecard">
                          <img src="images/pic03.jpg" alt="">
                          <h3>Block Name</h3>
                          <p>Options</p>
                      </div>
                  </div>
                  <div class="faqs">
                    <p><b>Refer FAQs for services section</b></p>
                    <p>Ques. </p>
                    <p>Ans</p>
                    <p>Ques. </p>
                    <p>Ans</p>
                    <p>Ques. </p>
                    <p>Ans</p>
                    <p>Ques. </p>
                    <p>Ans</p>
                    <p>Ques. </p>
                    <p>Ans</p>
                    Still, having query? find in discussion forum(for services section):) <a href="">OYT IOT CLOUD DISCUSSION FORUM</a>
                  </div> 
              </div>
              <div class="customizesection dashboardsec">
                  <span id="dashboard" onclick="closeSec(id)" class="close">&times;</span>
                  <span id="dashboard" onclick="closeSec(id)" class="size">&#x26F6;</span>
                  <h2>Dashboard</h2>
                  <div class="dashboardarea">

                  </div>
                  <div class="faqs">
                    <p><b>Refer FAQs for devices section</b></p>
                    <p>Ques. </p>
                    <p>Ans</p>
                    <p>Ques. </p>
                    <p>Ans</p>
                    <p>Ques. </p>
                    <p>Ans</p>
                    <p>Ques. </p>
                    <p>Ans</p>
                    <p>Ques. </p>
                    <p>Ans</p>
                    Still, having query? find in discussion forum(for dashboard section):) <a href="">OYT IOT CLOUD DISCUSSION FORUM</a>
                  </div>
              </div>
          </div>
              <hr>
          <div class="modal">
            <span class="close">&times;</span>
            <form action="samplepage.php" class="modalform">
                <input type="text" name="projectname" id="projectname" placeholder="Your project name">
                <textarea name="projectdescription" id="" cols="30" rows="10"></textarea>
                <input type="submit" class="submit" value="Customize your project section">
            </form>
          </div>
          <div class="help">
              <h2>OYT support to you!!</h2>
              <h3>Refer our cloud docs, to know to how to use our platform step by step(in detail)</h3>
              <p><a href="http://">OYT Cloud Docs</a></p>
              <hr>
              <h3>We also provide a place for our users to interect, discuss, & find solutions to any of there platform related problem.</h3>
              <p><b>Refer FAQs</b></p>
              <p>Ques. </p>
              <p>Ans</p>
              <p>Ques. </p>
              <p>Ans</p>
              <p>Ques. </p>
              <p>Ans</p>
              <p>Ques. </p>
              <p>Ans</p>
              <p>Ques. </p>
              <p>Ans</p>
              Still, having query? find in discussion forum:) <a href="">OYT IOT CLOUD DISCUSSION FORUM</a>
          </div>
        <div class="footer">
			oxymoratechnology.pvt.ltd.
		</div>
		<!-- Scripts -->
		<!-- Script for modal -->
            <script>
                // declaring different sections
                var devicesec = document.querySelector(".devicesec");
                var servicesec = document.querySelector(".servicesec");
                var dashboardsec = document.querySelector(".dashboardsec");
                var closedonearea = document.querySelector(".closedone");

                // showing different sections
                function showSec(id){
                    alert(id);
                    var shownsec = document.querySelector("#"+id);
                    shownsec.remove();
                    
                    switch (id) {
                        case "deviceshow": devicesec.style.display="block"; break;
                        case "serviceshow": servicesec.style.display="block"; break;
                        case "dashboardshow": dashboardsec.style.display="block"; break;
                    }
                }
                
                // Add to closedone area
                function addclosed(id) {
                    id=id.concat("show");
                    closedonearea.innerHTML+=`<a id=${id} class="closedbtn" onclick="showSec(id)">${id+" Section"}</a>`;
                }
                
                // closing different sections
                function closeSec(id) {
                    switch (id) {
                        case "device": devicesec.style.display="none"; addclosed(id); break;
                        case "service": servicesec.style.display="none"; addclosed(id); break;
                        case "dashboard": dashboardsec.style.display="none"; addclosed(id); break;
                    }
                }
    
                // fullscreen and minimize different section
                function minimize(id){
                    var local= document.querySelector("#"+id);
                    local.innerHTML="&#xf2d2;";
                }
                function fullScreen(id) {
                    switch (id) {
                        case "device": devicesec.style.width="100%"; servicesec.style.display="none"; dashboardsec.style.display="none"; minimize(id); break;
                        case "service": servicesec.style.width="100%"; devicesec.style.display="none"; dashboardsec.style.display="none";  minimize(id); break;
                        case "dashboard": dashboardsec.style.width="100%"; servicesec.style.display="none"; devicesec.style.display="none"; minimize(id); break;
                    }
                }
                
                // window.onclick= function(event) {
                //     if(event.target == modal) {
                //         modal.style.display="none";        
                //     }
                // }
                // span.onclick = function (){
                //     modal.style.display="none ";
                // }
            </script>
            <script src="./../assets/js/jquery.min.js"></script>
			<script src="./../assets/js/skel.min.js"></script>
			<script src="./../assets/js/util.js"></script>
			<script src="./../assets/js/main.js"></script>
            <script src="./../assets/js/device.js"></script>
	</body>
</html>