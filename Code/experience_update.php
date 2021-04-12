	<?php session_start();

?>
<!DOCTYPE html>
<html style="width:100%;height:100%;">
<head>
	<meta charset="UTF-8">
	<title>experience Admin</title>
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
			$CompanyID=$_GET['edit'];
			$sql = "select CompanyID,CompanyName,Role,StartDate,Enddate,Job_Description from experience where CompanyID='$CompanyID'";
			$result = $conn->query($sql);	
			$row=$result->fetch_assoc();
				
		?>
	<form  class="form-admin" action="Home_Edit.php" method="POST">
		<h3>Updates a Record</h3>
		CompanyID: <input type="text" class="input" name="CompanyID" value="<?php echo $row['CompanyID']?>">
		Company Name: <input type="text" class="input" name="CompanyName" value="<?php echo $row['CompanyName']?>">
		Role: <input type="text" class="input" name="Role" value="<?php echo $row['Role']?>">
		StartDate: <input type="text" class="input" name="StartDate" value="<?php echo $row['StartDate']?>">
		EndDate: <input type="text" class="input" name="EndDate" value="<?php echo $row['Enddate']?>">
		JobDescription: <input type="text" class="input" name="Job_Description" value="<?php echo $row['Job_Description']?>">
		<input type="submit" name="experience-update" value="Update">
	</form>
</body>
</html>
