<!DOCTYPE HTML>
<html lang="en">
	<head>
    <title><?php echo $fetch_info['name'] ?> | Create Projects</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="./../assets/css/main.css" />
        <link rel="stylesheet" href="./../assets/css/dashboard.css" />
	</head>
    <style>
    #map { height: 500px; width: 400px; }</style>
	<body>
		<!-- Navbar -->
        <div class="navbar">
        <div class="logo">
            <img width="100%" src="./../images/logo.png" alt="OYT IOT Cloud">
        </div>
        <div class="nav-list">
            <a class="nav-items" href="https://www.oytechnology.com/aboutUs">About OYT</a>
            <a class="nav-items" href="ourcloud.php">Our Cloud</a>
            <div class="nav-items drop">
                <div class="explore">
                    <a class="nav-items" href="exploreus.php">Explore Us <i class="fa fa-caret-down"></i></a>
                    <div class="explore-list">
                        <a class="explore-items" href="exploreus.php#ourclient">Our Client</a>
                        <a class="explore-items" href="exploreus.php#projects">Projects</a>
                        <a class="explore-items" href="exploreus.php#contactus">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-nav">
            <a class="nav-items login" href="logout-user.php" id="logout">Logout</a>
            <a class="nav-items updatebtn">Update Account</a>
        </div>
        <div onclick="openNav()" class="breadcrumb">
            <a class="dash"></a>
            <a class="dash"></a>
            <a class="dash"></a>
        </div>
    </div>
    <div class="navbox">
        <a class="nav-items" href="https://www.oytechnology.com/aboutUs">About OYT</a>
        <a class="nav-items" href="ourcloud.php">Our Cloud</a>
        <div class="exploresm">
            <a class="nav-items" href="#">Explore Us <span style="color: white;">&#x25BC;</span></a>
            <div class="explorebox">
                <a class="explore-items" href="exploreus.php#ourclient">Our Client</a>
                <a class="explore-items" href="exploreus.php#projects">Projects</a>
                <a class="explore-items" href="exploreus.php#contactus">Contact Us</a>
            </div>
        </div>
        <div class="navbottom">
            <a class="nav-items login" href="logout-user.php">Logout</a>
            <a class="nav-items updatebtn">Update Account</a>
        </div>
    </div>
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
                  <form action="" class="adddevicesform">
                    <div class="formgroup">    
                      <input type="text" id="device_name" name="device_name" placeholder="device_name" required>
                    </div>
                    <div class="formgroup">
                      <!-- <input type="text" name="device_type" id="device_type" placeholder="device_type" required> -->
                      <select name="device_type" id="device_type">
                      <option value="Location">Location</option>
                      <option value="Temperature">Temperature</option>
                      <!-- <option value="varchar(255)">varchar(255)</option> -->
                      </select>
                    </div>
                    <div class="formgroup">
                      <input type="text" name="device_token" id="device_token" placeholder="device_token" required>
                    </div>
                    <div class="formgroup">
                      <input type="text" name="field_name" id="field_name" placeholder="field_name" required>
                    </div>
                    <div class="formgroup">
                      <!-- <input type="text" name="field_type" id="field_type" placeholder="field_type" required> -->
                      <select name="field_type" id="field_type">
                      <option value="int(11)">int(11)</option>
                      <option value="varchar(255)">varchar(255)</option>
                      <option value="varchar(255)">varchar(255)</option>
                      </select>
                    </div>
                    <div class="formgroup">
                        <input type="button" id="submitdevice" value="Add">
                    </div>
                   </form>
                   <table id="divtable">
                        <tr>
                            <th>S. No.</th>
                            <th>Project Name</th>
                            <th>Project Description</th>
                            <th>Created At</th>
                        </tr>
                    </table>
        
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
                          <img src="../images/collect-2.png" alt="">
                          <h3>Block Name</h3>
                          <p>Options</p>
                      </div>
                      <div class="servicecard">
                          <img src="../images/collect-2.png" alt="">
                          <h3>Block Name</h3>
                          <p>Options</p>
                      </div>
                      <div class="servicecard">
                          <img src="../images/collect-2.png" alt="">
                          <h3>Block Name</h3>
                          <p>Options</p>
                      </div>
                      <div class="servicecard">
                          <img src="../images/collect-2.png" alt="">
                          <h3>Block Name</h3>
                          <p>Options</p>
                      </div>
                      <div class="servicecard">
                          <img src="../images/collect-2.png" alt="">
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
                  <div class="btnctrl"></div>
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
            <script src="./../assets/js/chart.min.js"></script>
            <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
            <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAejrzy9JZIGDS4YhpU6nJCz1gZvld-W3c&callback=initMap&libraries=&v=weekly"
      async
    ></script>
	</body>
</html>