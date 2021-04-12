	<?php session_start();

?>
<!DOCTYPE html>
<html style="width:100%;height:100%;">
<head>
	<meta charset="UTF-8">
	<title>About Admin</title>
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
			$sql = "select UserName,age,Email,Phone,Address,languages from admin";
			$result = $conn->query($sql);	
			$row=$result->fetch_assoc();
				
		?>
	<form  class="form-admin" action="Home_Edit.php" method="POST">
		<h3>Updates a Record</h3>
		Age: <input type="text" class="input" name="age" value="<?php echo $row['age']?>">
		Email: <input type="text" class="input" name="Email" value="<?php echo $row['Email']?>">
		phone: <input type="text" class="input" name="Phone" value="<?php echo $row['Phone']?>">
		Address: <input type="text" class="input" name="Address" value="<?php echo $row['Address']?>">
		Languages: <input type="text" class="input" name="languages" value="<?php echo $row['languages']?>">
		<input type="submit" name="about-update" value="Update">
	</form>
</body>
</html>
