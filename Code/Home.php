<?php session_start();

?>
<!DOCTYPE html>
<html style="width:100%;height:100%;">
	<head>
	    
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<title>Home</title>
		<link rel="stylesheet" href="Portfolio.css"/>
		<style>
			p{
				text-align:center;
			}
			body{
					background-image: url("images/Background.jpg");
					background-size:100%;
					color: #FFFFFF;
				}
			img {
				overflow: hidden;
				border-radius: 50%;
			}
			.login-error{
				color:red;
			}

		</style>
		<script type="text/javascript" src="pop.js"></script>
	</head>
	<body style="width:100%;height:100%;">
		<header style="background-color:transparent">
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
		<section>
		<P class ="Dp"><img src="images/Dp.jpeg"/></p>
		<h2 style="text-align:center;margin-bottom:-0.5em;">Saikrishna Gowrishetty</h2>
		<p>
			Web Developer, Business Intelligence Developer<br/></br>
			<a href="Hire me.php" class="button">Hire Me</a>
			<a href="images/Resume.pdf" class="button" download>Download CV</a>
		</p>
		<?php
			if(isset($_SESSION['user'])){
				echo '<p>you are loggedin </p>';
			}
			else{
				echo '<p>you are logged out</p>';
			}
		
		?>
		</section>
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
		<script>

		</script>
		<?php
			if(isset($_GET['error']))
			{
				echo '<script>document.querySelector(\'.bg-modal\').style.display =\'flex\';</script>';
			}
		?>
	</body>
</html>	