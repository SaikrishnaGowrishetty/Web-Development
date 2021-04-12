<?php session_start();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Portfolio</title>
		<link rel="stylesheet" href="Portfolio.css"/>
		<script type="text/javascript" src="pop.js"></script>
	</head>
	<header>
			<nav class="top_nav">
				<ul>
					<li><a href="Home.php">SAI KRISHNA G</a></li>
					<li><a href="About.php">About</a></li>
					<li><a href="skills.php">Skills</a></li>
					<li><a href="portfolio.php">PortFolio</a></li>
					<li><a href="Experience.php">Experience</a></li>
					<li><a href="Education.php">Education</a></li>
					<li><a href="Blog.php">Blog</a></li>
					<li><a href="Hire me.php">Hireme</a></li>
					<li><a href="Contact.php">Contact</a></li>
					<?php
							if(isset($_SESSION['user'])){
								echo '<li>
								<form action="logout.inc.php" method="POST">
									<button type="submit" name="logout-submit" style="font-weight:Bold;padding: 1px 4px">LOGOUT</button>
								</form>
								</li>';
								if($_SESSION['user']=="Krishna546")
									echo '<li><a href="Home_Admin.php">Admin</a></li>';
							}
							else{
								echo '<li><a href="#" id="login">login</a></li>
										<li><a href="Signup.php">Signup</a></li>';
							}
						
					?>		
				</ul>
			</nav>	
	</header>
	<body>
	<h2>Portfolio</h2>
	<div class="Wrapper">
		<div class="project1">
			<a href="https://www.amazon.com/"><img src="images/OnlineShopping.jpeg"/></a>
		</div>
		<div class="project2" style="margin-bottom:30px";>
			<img src="images/Canteen.jpeg"/>
		</div>
		<div class="project3">
			<img src="images/parking.jpeg"/>
		</div>
		<div class="project4">
			<img src="images/Hotel management.jpeg"/>
		</div>
	</div>
		<div class="bg-modal">
			<div class="modal-content" style="color:black">
				<h2 style="float:left;">Log In<span class="close">+</span></h2>
				<?php
					if(isset($_GET['error']))
					{
						if($_GET['error']=="emptyfields")
						{
							echo '<p class ="login-error">Fill in all the empty fields</p>';
						}
						if($_GET['error']=="wrongpassword")
						{
							echo '<p class ="login-error">wrong password</p>';
						}
						if($_GET['error']=="sqlerror")
						{
							echo '<p class ="login-error">Database Connection issue</p>';
						}
						if($_GET['error']=="nouser")
						{
							echo '<p class ="login-error">User not registered</p>';
						}
					}
						
				?>		
				<form name="loginform" action="login.inc.php" onSubmit="return LoginValidation(this);" method="POST" style="clear:both;">
					<label>User:</label>
					<input type="text" class="input" name="Name" required>
					<label>Password</label>
					<input type="password" class="input" name="Password" required>
					<button type="submit" name="login-submit" style="float:right;">Get In</button>
				</form>
			</div>
		</div>
		<?php
			if(isset($_GET['error']))
			{
				echo '<script>document.querySelector(\'.bg-modal\').style.display =\'flex\';</script>';
			}
		?>
	</body>
</html>	