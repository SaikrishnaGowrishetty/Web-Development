<?php session_start();

?>
<!DOCTYPE html>
<html style="width:100%;height:100%;">
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Blog</title>
		<link rel="stylesheet" href="Portfolio.css"/>
		<style>
		img{
			width:100%;
			height:100%;
		}
		body{
		    font-size:1.2vw;
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
		<h2>Blog</h2>
		<div class="bloglayout">
			<?php

				include "connection.php";
				$sql = "SELECT `Title`,`description`,`Blog_Link`,`tag`,`comments` FROM `blogs`";
				$result = $conn->query($sql);
				$BlogName=array();
				$Description=array();
				$Links=array();
				$tags=array();
				$comments=array();
				$count=0;
				while($row=$result->fetch_assoc())
				{
				$BlogName[$count] = $row['Title'];
				$Description[$count] = $row['description'];
				$Links[$count] = $row['Blog_Link'];
				$tag[$count] = $row['tag'];
				$comments[$count] = $row['comments'];
				$count=$count+1;
				}
					
			?>
			<div class="row1">
				<div class="Blog">
					<img src="images/SQL.jpg">
				</div>
					<h3><?php echo $BlogName[0]?></h3>
					<p>
					<?php echo $Description[0]?>
					</p>
					<button type="button" onclick="window.location.href = '<?php echo $Links[0]?>';">Get In</button>
			</div>
			<div class="row1">
				<div class="Blog">
					<img src="images/Program.jpg">
				</div>
				<h3><?php echo $BlogName[1]?></h3>
				<p>
				<?php echo $Description[1]?>
				</p>
				<button type="button" onclick="window.location.href = '<?php echo $Links[1]?>';">Get In</button>
			</div>
			<div class="row1">
				<div class="Blog">
					<img src="images/Error.png">
				</div>
				<h3><?php echo $BlogName[2]?></h3>
				<p>
				<?php echo $Description[2]?>
				</p>
				<button type="button" onclick="window.location.href = '<?php echo $Links[2]?>';">Get In</button>
			</div>
		</div>
		<div class="bloglayout">
			<div class="row2">
				<div class="Blog2">
					<img src="images/BI.png">
				</div>
				<h3><?php echo $BlogName[3]?></h3>
				<p>
				<?php echo $Description[3]?>
				</p>
				<button type="button" onclick="window.location.href = '<?php echo $Links[3]?>';">Get In</button>
			</div>
			<div class="row2">
			    <div class="Blog2">
				<img src="images/dashboard.png">
				</div>
				<h3><?php echo $BlogName[4]?></h3>
				<p>
				<?php echo $Description[4]?>
				</p>
				<button type="button" onclick="window.location.href = '<?php echo $Links[4]?>';">Get In</button>
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