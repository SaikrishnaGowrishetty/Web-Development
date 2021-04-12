<?php session_start();

?>
<html style="width:100%;height:100%;">
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<title>Experience Admin</title>
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
				Company Name: <input type="text" name="CompanyName">
				Role: <input type="text" name="Role">
				StartDate: <input type="text" name="StartDate">
				EndDate: <input type="text" name="EndDate">
				JobDescription: <input type="text" name="Job_Description">
				<input type="submit" name="experience-insert" value="Insert record">
			</form>
		<?php

			include "connection.php";
			$sql = "select * from experience";
			$result = $conn->query($sql);
			echo "<table>";
			echo "<tr>";
			echo "<th>SNO.</th>";
			echo "<th>CompanyID</th>";
			echo "<th>CompanyName</th>";
			echo "<th>Role</th>";
			echo "<th>StartDate</th>";
			echo "<th>Enddate</th>";
			echo "<th>JobDescription</th>";
			echo "<th>delete</th>";
			echo "<th>edit</th>";
			echo "</tr>";
			$i=0;
			while($row = $result->fetch_assoc())
			{
				$CompanyID = $row['CompanyID'];
				$Company = $row['CompanyName'];
				$Role = $row['Role'];
				$StartDate = $row['StartDate'];
				$Enddate = $row['Enddate'];
				$Job_Description = $row['Job_Description'];
				echo "<tr>";
				echo "<th>".$i=$i+1;"</th>";
				echo "<th>$CompanyID</th>";
				echo "<th>$Company</th>";
				echo "<th>$Role</th>";
				echo "<th>$StartDate</th>";
				echo "<th>$Enddate</th>";
				echo "<th>$Job_Description</th>";
				echo "<th><a href='Home_Edit.php?workdel=$CompanyID'><button class='btn btn-danger'>Delete</button></a></th>";
				echo "<th><a href='experience_update.php?edit=$CompanyID'><button class='btn btn-success'>Edit</button></a></th>";
				echo "</tr>";
			}				
		?>
		</div>
	</body>
</html>