<?php session_start();

?>
<!DOCTYPE html>
<html style="width:100%;height:100%;">
<head>
	<meta charset="UTF-8">
	<title>Eduaction Update</title>
	<link rel="stylesheet" href="Portfolio.css"/>
	<style>
		.input{
			display:block;
			margin-bottom:10px;
		}
	</style>
</head>
<body>
		<?php

			include "connection.php";
			$DegreeID=$_GET['edit'];
			$sql = "select DegreeID,DegreeName,startdate,enddate,coursename,UniversityName from education where DegreeID='$DegreeID'";
			$result = $conn->query($sql);	
			$row=$result->fetch_assoc();
				
		?>
	<form  class="form-admin" action="Home_Edit.php" method="POST">
		<h3>Updates a Record</h3>
		DegreeID: <input type="text" class="input" name="DegreeID" value="<?php echo $row['DegreeID']?>">
		DegreeName: <input type="text" class="input" name="DegreeName" value="<?php echo $row['DegreeName']?>">
		Startdate: <input type="text" class="input" name="startdate" value="<?php echo $row['startdate']?>">
		Enddate: <input type="text" class="input" name="enddate" value="<?php echo $row['enddate']?>">
		CourseName: <input type="text" class="input"name="coursename" value="<?php echo $row['coursename']?>">
		UniversityName: <input type="text" class="input" name="UniversityName" value="<?php echo $row['UniversityName']?>">
		<input type="submit" name="education-update" value="Update">
	</form>
</body>
</html>
