	<?php session_start();

?>
<!DOCTYPE html>
<html style="width:100%;height:100%;">
<head>
	<meta charset="UTF-8">
	<title>Skill Admin</title>
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
			$SkillID=$_GET['edit'];
			$sql = "select SkillID,SkillName,Level from skills where SkillID='$SkillID'";
			$result = $conn->query($sql);	
			$row=$result->fetch_assoc();
				
		?>
	<form  class="form-admin" action="Home_Edit.php" method="POST">
		<h3>Updates a Record</h3>
		SkillID: <input type="text" class="input" name="SkillID" value="<?php echo $row['SkillID']?>">
		SkillName: <input type="text" class="input" name="SkillName" value="<?php echo $row['SkillName']?>">
		Level: <input type="text" class="input" name="Level" value="<?php echo $row['Level']?>">
		<input type="submit" name="skill-update" value="Update">
	</form>
</body>
</html>
