<!-- <?php
//  require_once "controllerUserData.php"; ?> -->
<?php
// $email = $_SESSION['email'];
// $password = $_SESSION['password'];
// if ($email != false && $password != false) {
//     $sql = "SELECT * FROM usertable WHERE email = '$email'";
//     $run_Sql = mysqli_query($con, $sql);
//     if ($run_Sql) {
//         $fetch_info = mysqli_fetch_assoc($run_Sql);
//         $status = $fetch_info['status'];
//         $code = $fetch_info['code'];
//         if ($status == "verified") {
//             if ($code != 0) {
//                 header('Location: reset-code.php');
//             }
//         } else {
//             header('Location: user-otp.php');
//         }
//     }
// } else {
//     header('Location: login-user.php');
// }
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Projects of </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="./../assets/css/main.css" />
    <link rel="stylesheet" href="./../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="./../assets/css/createproject.css" />
</head>

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
            <a class="nav-items login" id="logout">Logout</a>
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
    <div class="container">
        <div class="welcome">
            <p>Welcome, <span class="username"></span></p>
            <!-- <p><button>Edit Account</button></p> -->
            <p style="text-align:left; padding-left:25px">Projects <hr></p>
        </div>
        <table id="divtable">
            <tr>
                <th>S. No.</th>
                <th></th>
                <th>Project Name</th>
                <th>Project Description</th>
                <th>Created At</th>
            </tr>
        </table>
        <div class="userprojects">
            <a class="create">Create/Add Project</a>
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
        <div class="addprojectmodal modal">
            <a class="addprojectmodalclose modalclose">&times;</a>
            <p>Create/Add Project</p>
            <hr>
            <form class="addprojectmodalform modalform" action="">
                <small id="addprojectmodalerror modalerror"></small>
                <div>
                    <input type="text" name="project_name" id="project_name" placeholder="Your project name" required>
                </div>
                <div>
                    <textarea name="project_des" id="project_des" cols="30" rows="10" placeholder="Write your project brief description" required></textarea>
                </div>
                <div>
                    <button class="submit-btn" id="createprojectbtn">Customize your project section</button>
                </div>
            </form>
        </div>
        <div class="editprojectmodal modal">
            <a class="editprojectmodalclose modalclose">&times;</a>
            <p>Edit Project</p>
            <hr>
            <form class="editprojectmodalform modalform" action="" method="post">
                <small id="editprojectmodalerror modalerror"></small>
                <div>
                    <input type="text" name="new_project_name" id="new_project_name" placeholder="Your project new name" required>
                </div>
                <div>
                    <textarea name="new_project_des" id="new_project_des" cols="30" rows="10" placeholder="Write your project new brief description" required></textarea>
                </div>
                <div>
                    <button class="submit-btn" id="editprojectbtn" type="submit">Cofirm Edit</button>
                </div>
            </form>
        </div>
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
    <script src="./../assets/js/jquery.min.js"></script>
    <script src="./../assets/js/skel.min.js"></script>
    <script src="./../assets/js/util.js"></script>
    <script src="./../assets/js/main.js"></script>
    <script src="./../assets/js/projects.js"></script>
    </body>
</html>