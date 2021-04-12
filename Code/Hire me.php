<?php session_start();

?>
<!DOCTYPE html>
<html style="width:100%;height:100%;">
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<title>Hire me</title>
		<link rel="stylesheet" href="Portfolio.css"/>
		<style>
			img{
				width:100%;
				height:100%;
			}
			p{
				text-align:center;
			}
			h1{
				text-align:center;
			}
			.Hire{
				padding:0px;
				}
			.Hire ul{
				list-style-type:none;
				width:100%;
				margin-left:-40px;
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
		<h2>Hire me</h2>
		<div class="Service">
		<?php

		include "connection.php";
		$sql = "SELECT ServiceName,Price_USD,Description FROM `hireme`";
		$result = $conn->query($sql);
		
		while($row = $result->fetch_assoc())
		{
			$Serive = $row['ServiceName'];
			$price = $row['Price_USD'];
			$Desc = explode(",",$row['Description']);
			$count = 0;
		?>
		<div class="Hire">
			<div class="Cart">
				<img src="images/greencart.jpeg"></>
			</div>
			<h1><?php echo "$".$price?></h1>
			<p>
				<?php echo $Serive?>
			</p>
			<ul>
			<?php 
				while($count<count($Desc))
				{
			?>
				<li><hr></li>
				<li>
					<?php echo $Desc[$count];
						  $count = $count+1;
					?>
				</li>
				<?php 
				}
				?>
				<li><hr></li>
				<a href="Contact.php" style="text-decoration:none"><li>Contact Us</li></a>
			</ul>
		</div>	
		<?php }?>
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