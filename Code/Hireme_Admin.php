<?php session_start();

?>
<html style="width:100%;height:100%;">
	<head>
		<meta charset="UTF-8">
		<title>Hireme Admin</title>
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
		<div class="content">
			<form class="form-admin" action="Home_Edit.php" method="POST">
				<h3>Inserts a New Record</h3>
				Service Name: <input type="text" name="ServiceName">
				Price_USD: <input type="text" name="Price_USD">
				Description: <input type="text" name="Description">
				<input type="submit" name="Hireme-insert" value="Insert record">
			</form>
		<?php

			include "connection.php";
			$sql = "SELECT `ServiceID`,`ServiceName`,`Price_USD`,`Description` FROM `hireme`";
			$result = $conn->query($sql);
			echo "<table>";
			echo "<tr>";
			echo "<th>SNO.</th>";
			echo "<th>ServiceID</th>";
			echo "<th>ServiceName</th>";
			echo "<th>Price_USD</th>";
			echo "<th>Description</th>";
			echo "<th>Delete</th>";
			echo "<th>Edit</th>";
			echo "</tr>";
			$i=0;
			while($row = $result->fetch_assoc())
			{
				$ServiceID = $row['ServiceID'];
				$ServiceName = $row['ServiceName'];
				$Price_USD = $row['Price_USD'];
				$Description = $row['Description'];
				echo "<tr>";
				echo "<th>".$i=$i+1;"</th>";
				echo "<th>$ServiceID</th>";
				echo "<th>$ServiceName</th>";
				echo "<th>$Price_USD</th>";
				echo "<th>$Description</th>";
				echo "<th><a href='Home_Edit.php?Hiredel=$ServiceID'><button class='btn btn-danger'>Delete</button></a></th>";
				echo "<th><a href='Hireme_update.php?edit=$ServiceID'><button class='btn btn-success'>Edit</button></a></th>";
				echo "</tr>";
			}				
		?>
		</div>
	</body>
</html>