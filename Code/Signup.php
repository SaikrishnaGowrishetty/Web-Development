<?php session_start();

?>
<!DOCTYPE html>
<html style="width:100%;height:100%;">
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<title>SignUp</title>
		<link rel="stylesheet" href="Portfolio.css"/>
		<style>
			form .input{
				width:95%;
				margin-bottom:20px;;
				border-radius:20px;
				outline:none;
			}
			.signup-error{
				display:block;
				color:red;
			}
			.signup-success{
				display:block;
				color:green;
			}
		</style>
		<script type="text/javascript" src="pop.js"></script>
	</head>
	<header>
			<nav class="top_nav">
				<ul>
					<li><a href="Home.php">SAI KRISHNA G</a></li>
					<li><a href="About.php">About</a></li>
					<li><a href="skills.php">Skills</a></li>
					<li><a href="Portfolio.php">PortFolio</a></li>
					<li><a href="Experience.php">Experience</a></li>
					<li><a href="Education.php">Education</a></li>
					<li><a href="Blog.php">Blog</a></li>
					<li><a href="Hire me.php">Hireme</a></li>
					<li><a href="Contact.php">Contact</a></li>
					<?php
							if(isset($_SESSION['user'])){
								echo '<li>
								<form action="logout.inc.php" method="POST">
									<button type="submit" name="logout-submit" style="font-weight:Bold;padding: 1px 4px">Logout</button>
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
	<body style="width:100%;height:100%;">
		<div class="layout_signup">
			<form name="signupform" action="signup.inc.php" method="POST" onSubmit="return SignupValidation(this);">
				<h1>check in</h1>
				<?php
					if(isset($_GET['error']))
					{
						if($_GET['error']=="emptyfields")
						{
							echo '<p class ="signup-error">Fill in all the empty fields</p>';
						}
						if($_GET['error']=="Invalidemail")
						{
							echo '<p class ="signup-error">Enter a valid emailid</p>';
						}
						if($_GET['error']=="CheckPasswords")
						{
							echo '<p class ="signup-error">Passwords donot match</p>';
						}
						if($_GET['error']=="sqlerror")
						{
							echo '<p class ="signup-error">Database Connection issue</p>';
						}
						if($_GET['error']=="UserName_already_exists")
						{
							echo '<p class ="signup-error">UserName already exists</p>';
						}
					}
					elseif(isset($_GET['signup']))
					{
						if($_GET['signup']=="success")
						{
						echo '<p class ="signup-success">SignUp Successfull</p>';
						}
					}
						
				?>		
				<label>Name</label></br>
				<input type="text" class="input" name="Name" required>	
				<label>Last name</label></br>
				<input type="text" class="input" name="Lastname" required>
				<label>Email</label></br>
				<input type="text" class="input" name="Email" required>
				<label>User</label></br>
				<input type="text" class="input" name="User" required>
				<label>Password</label></br>
				<input type="password" class="input" name="Password" required>
				<label>Repeat Password</label></br>
				<input type="password" class="input" name="Repeat" required>	
				<button type="button" style="background-color:grey;">close</button>
				<button type="submit" name="signup-submit" style="float:right;">Save</button>
			</form>
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
			if(isset($_POST['login-submit']))
			{
				if(isset($_GET['error']))
				{
					echo '<script>document.querySelector(\'.bg-modal\').style.display =\'flex\';</script>';
				}
			}
		?>
	</body>
</html>