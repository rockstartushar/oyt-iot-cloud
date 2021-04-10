<!DOCTYPE HTML>
<html lang="en">
	<head>
    <title><?php echo $fetch_info['name'] ?> | Create Projects</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />
	</head>
    <style>
        .userprojects{
            padding: 20px;
        }
        .create{
            margin: 20px;
            padding: 20px;
            border: 2px solid black;
            color: white;
            border-radius: 10px;
            background-color: brown;
        }
        .modal {
            display: none;
            position: fixed;
            left: 10%;
            top: 10%;
            background-color: white;
            width: 70%;
        }
        span{
            float: right;
            color: black;
            font-size: larger;
            padding: 10px;
        }
        .modalform{
            text-align: left;
            margin: 20px auto;
            display: flex;
            flex-direction: column;
        }
        .modalform input, textarea {
            padding: 10px;
            margin: 5px;
        }
        .modalform .submit {
            color: white;
            background-color: red;
            padding: 10px 10px;
        }
    </style>
	<body>
		<!-- Navbar -->
		<div class="navbar">
			<div class="logo">
				<img width="100%" src="../images/banner.jpg" alt="OYT IOT Cloud">
			</div>
			<div class="nav-list">
				<a class="nav-items" href="#">About OYT</a>
    			<a class="nav-items" href="#">Our Cloud</a>
				<div class="nav-items drop">
					<a class="nav-items explore" onclick="showexplore()" href="#">Explore Us <img style="color: white; background-color: white;" width="10px" src="../images/icon/drop.png" alt=""></a>
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
			<a class="nav-items explore" onclick="showexplorebox()" href="#">Explore Us <img style="color: white; background-color: white;" width="10px" src="../images/icon/drop.png" alt=""> </a>
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
          
          <h1>Welcome <?php echo $fetch_info['name'] ?></h1>
          <hr>
          <div class="userprojects">
              <a class="create">Create Project</a>          
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
            <script>var modal = document.querySelector(".modal");
                var span = document.querySelector("span");
                var createbtn = document.querySelector(".create");
                createbtn.onclick = function (){
                    modal.style.display="block";
                }
                window.onclick= function(event) {
                    if(event.target == modal) {
                        modal.style.display="none";        
                    }
                }
                span.onclick = function (){
                    modal.style.display="none ";
                }
            </script>
            <script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
	</body>
</html>