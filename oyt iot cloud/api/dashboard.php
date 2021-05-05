<!DOCTYPE HTML>
<html lang="en">
	<head>
    <title><?php echo $fetch_info['name'] ?> | Create Projects</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="./../assets/css/main.css" />
		<link rel="stylesheet" href="./../assets/css/createproject.css" />
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
            <a class="nav-items username" href="createproject.php"></a>
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
    <div class="updateaccountmodal modal">
            <a class="updateaccountmodalclose modalclose">&times;</a>
            <p>Update Account</p>
            <hr>
            <!-- <div class="usericondiv"><img src="./../images/icon/user.png" alt=""></div> -->
            <form class="updateaccountmodalform modalform" id="update_account_form" action="" method="post">
            <small id="updateprojectmodalerror modalerror"></small>
                <div>
                    <input type="text" name="" id="name" placeholder="Your name" required>
                </div>
                <div>
                    <input type="email" name="" id="email" placeholder="Your email" required>
                </div>
                <div>
                    <input type="password" name="" id="password" placeholder="Your password" required>  
                </div>
                <div>
                    <button class="submit-btn" id="updateprojectbtn" type="submit">Update</button>
                </div>
            </form>
        </div>
          <h1 id="pj-name"></h1>
          <hr>
          <div class="closedone">

          </div>
          <div>
          <h2 class="devicehead1">Devices</h2>
        <div class="btnadddevicediv">
        <button class="showadddevicesmodalbtn">Add Devices</button>
        </div>  
          </div>
          <div>                  
            <table id="divtable">
            <tr>
                <th>S. No.</th>
                <th>Device Name</th>
                <th>Device Type</th>
                <th>Created At</th>
            </tr>
            </table>
        </div>

          
          <div class="btnctrl"></div>
          <div class="all">
              <!-- Device section -->
              <div class="customizesection devicesec">
                  <!-- <span id="device" onclick="closeSec(id)" class="close">&times;</span> -->
                  <span id="device" onclick="fullScreen(id)" class="size">&#x26F6;</span>
                  
                  <div class="devicetable"></div>
                  <div class="adddevicemodal modal">
                    <a class="adddevicemodalclose modalclose">&times;</a>
                    <p>Add Devices</p>
                    <hr>
                    <form class="adddevicesform modalform" action="" method="post">
                        <small id="adddevicesmodalerror modalerror"></small>
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
                </div>
                <h2 class="devicehead">Devices</h2>
                  
                   <table id="datavaluetable">
            <tr>
                <th>S. No.</th>
                <th>Field Value</th>
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
              <!-- <div class="customizesection servicesec">
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
              </div> -->
              

              <div class="customizesection dashboardsec">
                  <!-- <span id="dashboard" onclick="closeSec(id)" class="close">&times;</span> -->
                  <span id="dashboard" onclick="closeSec(id)" class="size">&#x26F6;</span>
                  <h2 class="devicehead">Dashboard</h2>
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
                  <div class="adddatamodal modal">
                    <a class="modalclose" id="adddatamodalclose">&times;</a>
                    <p>Edit Project</p>
                    <hr>
                    <form class="adddatamodalform modalform" action="" method="post">
                        <small id="adddatamodalerror modalerror"></small>
                        <div>
                            <input type="text" name="add_device_token" id="add_device_token" placeholder="Device Token" required>
                        </div>
                        <div>
                            <input type="text" name="add_field_value" id="add_field_value" placeholder="Value of Field" required>
                        </div>
                        <div>
                            <button class="submit-btn" id="adddatavalue" type="submit">Cofirm Edit</button>
                        </div>
                    </form>
                </div>
              </div>
          </div>
              <hr>
          <div class="help">
            <h2>OYT IoT Cloud Support</h2>
            <hr>
            <span>Refer <a href="oytclouddocs.php">our cloud docs</a>, to know to how to use our platform step by step(in detail)</span>
        </div>
        <div class="faqsdiv">
            <div class="support">
                <h2>OYT IoT Cloud Discussion Forum</h2>
                <hr>
            <span>We also provide a place for our users to interect, discuss, & find solutions to any of there platform related problem.</span>
            </div>
            <div id="faqs" class="openfaqsdiv">
                <a href="#faqs" class="openfaqsbtn"><span>Refer FAQs<span style="color: white;">▼</span></span></a>
            </div>
            <div class="faqs">
                <h3>FAQs on OYT IoT Cloud Platform</h3>
                <hr>
                <p class="ques">Ques. How does the Internet of Things (IoT) affect our everyday lives?</p>
                <p class="ans">Ans. What we know as “smart devices” in our everyday lives, are actually devices embedded in IoT technology which are able to manifest greater quantum of automation than those available before. IoT creates a greater network that enables different devices to interact freely with each other.</p>
                <p class="ques">Ques. How does IOT work?</p>
                <p class="ans">Ans. IoT devices are built on the concept of artificial intelligence. Since the mainstay of the IoT technology is enhanced communication, paired with intuitive performance, it incorporates sensor devices and unique data processing mechanisms. In many ways, IoT devices are an amalgamation of several advanced technologies. IoT benefits of artificial intelligence.</p>
                <p class="ques">Ques. What is the scale of use of IoT devices in contemporary times?</p>
                <p class="ans">Ans. Going by the figures deduced by a Cisco report, IoT devices are not only omnipresent but also are major contributors to the global capital. The report predicts that in the next decade, IoTs are likely to create value to the tune of 14.4 trillion USD across different industries.</p>
                <p class="ques">Ques. How does IoT influence the development of smart cities?</p>
                <p class="ans">Ans. Internet of Things relies greatly on the network engagement for the appropriate functioning of the end-user goals. The cloud platforms enable active network interactions between several “smart devices” which in turn scale up the functionalities of numerous active gadgets with IoT properties.</p>
                <p class="ques">Ques. What is the difference between business IOT and IIOT?</p>
                <p class="ans">Ans. While the Internet of Things (IoT) refer to the consumer oriented gadgets which perform tasks that provide consumer utilities like smartphones, thermostats etc., business IoT or IIOT are large scale structures or systems that are usually used at the industrial levels. For instance, fire alarms etc. Since the major difference lies in the scale of impact, a failure in IIOT is likely to affect a wider range of population. </p>
                <p>Still, having query? find answers in discussion forum:) <a href="oytiotcloudforum.php">OYT IOT CLOUD DISCUSSION FORUM</a></p>
            </div>
        </div>
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