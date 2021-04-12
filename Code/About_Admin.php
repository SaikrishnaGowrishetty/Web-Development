<html style="width:100%;height:100%;">
	<head>
		<meta charset="UTF-8">
		<title>About Admin</title>
		<style>
				table,tr,th {
				  border: 1px solid black;
				  padding:0;
				  margin:0;
				  border-spacing:0;
				}
		</style>
		<link rel="stylesheet" href="Portfolio.css"/>
	</head>
	<header>
		<h2>Admin Panel</h2>
	</header>
	<body style="width:100%;height:100%;">
		<div class="sidebar">
			<ul>
			<ul>
				<li><a href="Home.php">Website Home</a></li>
				<li><a href="Home_Admin.php">Home</a></li>
				<li><a href="About_Admin.php">About</a></li>
				<li><a href="skills_Admin.php">Skills</a></li>
				<li><a href="Experience_Admin.php">Experience</a></li>
				<li><a href="Education_Admin.php">Education</a></li>
				<li><a href="Blog_Admin.php">Blog</a></li>
				<li><a href="Hireme_Admin.php">Hireme</a></li>
			</ul>
			</ul>
		</div>
		<?php

					include "connection.php";
					$sql = "select UserName,age,Email,Phone,Address,languages from admin";
					$result = $conn->query($sql);
					echo "<table>";
					echo "<tr>";
					echo "<th>SNO.</th>";
					echo "<th>Age</th>";
					echo "<th>Email</th>";
					echo "<th>phone</th>";
					echo "<th>Address</th>";
					echo "<th>Languages</th>";
					echo "<th>Edit</th>";
					echo "</tr>";
					$i=0;
					while($row = $result->fetch_assoc())
					{
						$username = $row['UserName'];
						$Age = $row['age'];
						$Email = $row['Email'];
						$Phone = $row['Phone'];
						$Address = $row['Address'];
						$Languages = $row['languages'];	
						echo "<tr>";
						echo "<th>".$i=$i+1;"</th>";
						echo "<th>$Age</th>";
						echo "<th>$Email</th>";
						echo "<th>$Phone</th>";
						echo "<th>$Address</th>";
						echo "<th>$Languages</th>";
						echo "<th><a href='About_update.php?edit=$username'><button class='btn btn-success'>Edit</button></a></th>";
						echo "</tr>";
					}				
			?>
	</body>
</html>