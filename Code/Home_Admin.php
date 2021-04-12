<html style="width:100%;height:100%;">
	<head>
		<meta charset="UTF-8">
		<title>Home Admin</title>
		<link rel="stylesheet" href="Portfolio.css"/>
		<style>
				table,tr,th {
				  border: 1px solid black;
				  padding:0;
				  margin:0;
				  border-spacing:0;
				}
		</style>
	</head>
	<header>
		<h2>Admin Panel</h2>
	</header>
	<body style="width:100%;height:100%;">
		<div class="sidebar">
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
		</div>
		<div class="content">
			<form class="form-admin" action="Home_Edit.php" method="POST">
				<h3>Inserts a New Record</h3>
				Network_Name: <input type="text" name="Network">
				UserName: <input type="text" name="UserName">
				Link: <input type="text" name="Link">
				<input type="submit" name="insert" value="Insert record">
			</form>
		<?php

			include "connection.php";
			$sql = "select Network_Name,Link,UserName from network";
			$result = $conn->query($sql);
			echo "<table>";
			echo "<tr>";
			echo "<th>SNO.</th>";
			echo "<th>Network_Name</th>";
			echo "<th>Link</th>";
			echo "<th>UserName</th>";
			echo "<th>Delete</th>";
			echo "<th>Edit</th>";
			echo "</tr>";
			$i=0;
			while($row = $result->fetch_assoc())
			{
				$Network = $row['Network_Name'];
				$User = $row['UserName'];
				$Link = $row['Link'];
				echo "<tr>";
				echo "<th>".$i=$i+1;"</th>";
				echo "<th>$Network</th>";
				echo "<th>$Link</th>";
				echo "<th>$User</th>";
				echo "<th><a href='Home_Edit.php?Networkdel=$Network'><button class='btn btn-danger'>Delete</button></a></th>";
				echo "<th><a href='Admin_update.php?edit=$Network'><button class='btn btn-success'>Edit</button></a></th>";
				echo "</tr>";
			}				
		?>
		</div>
	</body>
</html>