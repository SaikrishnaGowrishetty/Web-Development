<?php session_start();

?>
<html style="width:100%;height:100%;">
	<head>
		<meta charset="UTF-8">
		<title>Blog Admin</title>
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
		<?php

			include "connection.php";
			$sql = "SELECT `BlogID`,`Title`,`description`,`Blog_Link`,`tag`,`comments` FROM `blogs`";
			$result = $conn->query($sql);
			echo "<table>";
			echo "<tr>";
			echo "<th>SNO.</th>";
			echo "<th>BlogID</th>";
			echo "<th>Blog Title</th>";
			echo "<th>Description</th>";
			echo "<th>Link</th>";
			echo "<th>Tag</th>";
			echo "<th>Comments</th>";
			echo "<th>Edit</th>";
			echo "</tr>";
			$i=0;
			while($row = $result->fetch_assoc())
			{
				$BlogID = $row['BlogID'];
				$BlogName = $row['Title'];
				$Description = $row['description'];
				$Link = $row['Blog_Link'];
				$tag = $row['tag'];
				$comments = $row['comments'];
				echo "<tr>";
				echo "<th>".$i=$i+1;"</th>";
				echo "<th>$BlogID</th>";
				echo "<th>$BlogName</th>";
				echo "<th>$Description</th>";
				echo "<th>$Link</th>";
				echo "<th>$tag</th>";
				echo "<th>$comments</th>";
				echo "<th><a href='Blog_update.php?edit=$BlogID'><button class='btn btn-success'>Edit</button></a></th>";
				echo "</tr>";
			}				
		?>
		</div>
	</body>
</html>