<?php session_start();

?>
<!DOCTYPE html>
<html style="width:100%;height:100%;">
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<title>Contact</title>
		<link rel="stylesheet" href="Portfolio.css"/>

		<style>
			form .input{
				width:100%;
				margin-bottom:20px;;
				border-radius:20px;
				outline:none;
			}
			.formlay{
				width:50%;
			}
			.fas{
				position:relative;
				margin-top:10px;
				
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
	<div class="Wrapper">
		<h2>Contact Me</h2>
		<?php

			include "connection.php";
			$sql = "select Email,Phone,Address from admin";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			
			$Email = $row['Email'];
			$Phone = $row['Phone'];
			$Address = $row['Address'];
				
		?>
		<div class="FormEntry">
			<h3>Feel free to contact me:</h3>
			<form action="Home_Edit.php" onSubmit="return ContactValidation(this);" method="POST">
				<input type="text" class="input" name="Name" placeholder="Name" required>	
				<input type="text" class="input" name="Subject" placeholder="Subject" required>
				<input type="Email" class="input" name="Email" placeholder="Email" required>
				<textarea rows="4" class="input" name="Message">Your Message</textarea required>
				<input class="button" type="submit" name="send-enquiry" value="Send">
			</form>
		</div>
		<div class="FormEntry">
			<dl>
				<dt>ADDRESS</dt>
				<dd><?php echo $Address?></dd>
				<dt>PHONE:</dt>
				<dd><?php echo $Phone?></dd>
				<dt>Email</dt>
				<dd><?php echo $Email?></dd>
			</dl>
		</div>
	</div>
		<footer class="contact">
			<ul>
				<?php
		
					include "connection.php";
					$sql = "select Network_Name,Link from network";
					$result = $conn->query($sql);
					
					while($row = $result->fetch_assoc())
					{
						$Network = $row['Network_Name'];
						$imageattribute = "title= \"".$row['Network_Name']."\""." href= \"".$row['Link']."\"";
						
				?>
				<li><a <?php echo $imageattribute?> "><img src="images/<?php echo $row['Network_Name']; ?>.png"></a></li>
				<?php } 
				
				?>
			</ul>
		</footer>
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
	</div>
	</body>
</html>