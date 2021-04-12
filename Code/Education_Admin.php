<?php session_start();

?>
<html style="width:100%;height:100%;">
	<head>
		<meta charset="UTF-8">
		<title>Education Admin</title>
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
				DegreeName: <input type="text" name="DegreeName">
				Startdate: <input type="text" name="startdate">
				Enddate: <input type="text" name="enddate">
				CourseName: <input type="text" name="coursename">
				UniversityName: <input type="text" name="UniversityName">
				<input type="submit" name="education-insert" value="Insert record">
			</form>
		<?php

			include "connection.php";
			$sql = "select DegreeID,DegreeName,startdate,enddate,coursename,UniversityName from education";
			$result = $conn->query($sql);
			echo "<table>";
			echo "<tr>";
			echo "<th>SNO.</th>";
			echo "<th>DegreeID</th>";
			echo "<th>DegreeName</th>";
			echo "<th>StartDate</th>";
			echo "<th>Enddate</th>";
			echo "<th>CourseName</th>";
			echo "<th>UniversityName</th>";
			echo "<th>Delete</th>";
			echo "<th>Edit</th>";
			echo "</tr>";
			$i=0;
			while($row = $result->fetch_assoc())
			{
				$DegreeID = $row['DegreeID'];
				$StartDate = $row['startdate'];
				$degreename = $row['DegreeName'];
				$EndDate = $row['enddate'];
				$coursename = $row['coursename'];
				$UniversityName = $row['UniversityName'];
				echo "<tr>";
				echo "<th>".$i=$i+1;"</th>";
				echo "<th>$DegreeID</th>";
				echo "<th>$StartDate</th>";
				echo "<th>$degreename</th>";
				echo "<th>$EndDate</th>";
				echo "<th>$coursename</th>";
				echo "<th>$UniversityName</th>";
				echo "<th><a href='Home_Edit.php?educationdel=$DegreeID'><button class='btn btn-danger'>Delete</button></a></th>";
				echo "<th><a href='Education_update.php?edit=$DegreeID'><button class='btn btn-success'>Edit</button></a></th>";
				echo "</tr>";
			}				
		?>
		</div>
	</body>
</html>