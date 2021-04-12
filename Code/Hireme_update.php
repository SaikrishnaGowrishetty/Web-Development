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
			$ServiceID=$_GET['edit'];
			$sql = "SELECT `ServiceID`,`ServiceName`,`Price_USD`,`Description` FROM `hireme` where ServiceID='$ServiceID'";
			$result = $conn->query($sql);	
			$row=$result->fetch_assoc();
				
		?>
	<form  class="form-admin" action="Home_Edit.php" method="POST">
		<h3>Updates a Record</h3>
		ServiceID: <input type="text" class="input" name="ServiceID" value="<?php echo $row['ServiceID']?>">
		ServiceName: <input type="text" class="input" name="ServiceName" value="<?php echo $row['ServiceName']?>">
		Price_USD: <input type="text" class="input" name="Price_USD" value="<?php echo $row['Price_USD']?>">
		Description`: <input type="text" class="input" name="Description" value="<?php echo $row['Description']?>">
		<input type="submit" name="Hireme-update" value="Update">
	</form>
</body>
</html>
