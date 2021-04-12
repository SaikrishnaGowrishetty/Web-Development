<?php session_start();

?>
<!DOCTYPE html>
<html style="width:100%;height:100%;">
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    
		
		<title>About</title>
		<link rel="stylesheet" href="Portfolio.css"/>
		<style>
			h2{
				text-align:left;
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
	<body style="width:100%;height:100%;">
			<?php

			include "connection.php";
			$sql = "select Description,age,Email,Phone,Address,languages from admin";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			
			$Descr = $row['Description'];
			$Age = $row['age'];
			$Email = $row['Email'];
			$Phone = $row['Phone'];
			$Address = $row['Address'];
			$Languages = $row['languages'];	
				
		?>
		<div class="Wrapper">
			<section class="About">
				<h2>About</h2>
				<p><?php echo $Descr?>
				</p>
			</section>
			<section class="Basic">
				<h2>Basic Information</h2>
				<dl>
					<dt>AGE:</dt>
					<dd><?php echo $Age?></dd>
					<dt>EMAIL:</dt>
					<dd><?php echo $Email?></dd>
					<dt>PHONE:</dt>
					<dd><?php echo $Phone?></dd>	
					<dt>ADDRESS:</dt>
					<dd><?php echo $Address?></dd>
					<dt>LANGUAGE:</dt>
					<dd><?php echo $Languages?></dd>
				</dl>
			</section>
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