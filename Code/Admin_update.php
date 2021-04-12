<?php session_start();

?>
<!DOCTYPE html>
<html style="width:100%;height:100%;">
<head>
	<meta charset="UTF-8">
	<title>Home Admin</title>
	<link rel="stylesheet" href="Portfolio.css"/>
</head>
<body>
		<?php

			include "connection.php";
			$Network=$_GET['edit'];
			$sql = "select Network_Name,Link,UserName from network where Network_Name='$Network'";
			$result = $conn->query($sql);	
			$row=$result->fetch_assoc();
				
		?>
	<form  class="form-admin" action="Home_Edit.php" method="POST">
		<h3>Updates a Record</h3>
		Network_Name: <input type="text" name="Network" value="<?php echo $row['Network_Name']?>">
		UserName: <input type="text" name="UserName" value="<?php echo $row['UserName']?>">
		Link: <input type="text" name="Link" value="<?php echo $row['Link']?>">
		<input type="submit" name="NetworkUpdate" value="Update">
	</form>
</body>
</html>
