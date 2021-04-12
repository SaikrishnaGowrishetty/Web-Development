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
			$BlogID=$_GET['edit'];
			$sql = "SELECT `BlogID`,`Title`,`description`,`Blog_Link`,`tag`,`comments` FROM `blogs` where BlogID='$BlogID'";
			$result = $conn->query($sql);	
			$row=$result->fetch_assoc();
				
		?>
	<form  class="form-admin" action="Home_Edit.php" method="POST">
		<h3>Updates a Record</h3>
		BlogID: <input type="text" class="input" name="BlogID" value="<?php echo $row['BlogID']?>">
		Title: <input type="text" class="input" name="Title" value="<?php echo $row['Title']?>">
		Description: <input type="text" class="input" name="Description" value="<?php echo $row['description']?>">
		Link: <input type="text" class="input" name="Blog_Link" value="<?php echo $row['Blog_Link']?>">
		Tag: <input type="text" class="input" name="tag" value="<?php echo $row['tag']?>">
		Comments: <input type="text" class="input" name="comments" value="<?php echo $row['comments']?>">
		<input type="submit" name="blog-update" value="Update">
	</form>
</body>
</html>
