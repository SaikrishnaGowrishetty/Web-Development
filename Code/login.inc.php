<?php ob_start(); ?>
<?php session_start();

?>
<!DOCTYPE html>
<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script type="text/javascript" src="pop.js"></script>
	</head>
	<body>
	<?php
	if(isset($_POST['login-submit'])){
		include "connection.php";
		
		$User = $_POST['Name'];
		$Password = $_POST['Password'];
		
		if(empty($User) || empty($Password)){
				header("Location: Home.php?error=emptyfields");
				exit();
		}
		else{
			$sql = "select UserName,PASSWORD from admin where UserName=?
					UNION
					select UserName,PASSWORD from employersignup where UserName=?
					";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				header("Location: Home.php?error=sqlerror");
				exit();
			}
			else{
				mysqli_stmt_bind_param($stmt,"ss",$User,$User);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				if($row=mysqli_fetch_assoc($result))
				{
					$pwdcheck=password_hash($row['PASSWORD'],PASSWORD_BCRYPT);
					if(password_verify($Password,$pwdcheck))
					{
						session_start();
						$_SESSION['user']= $row['UserName'];
						header("Location: Home.php?login=success");
						exit();
					}
					else
					{
						header("Location: Home.php?error=wrongpassword".$row['PASSWORD'].$Password);
						exit();
					}
				}
				else
				{
					header("Location: Home.php?error=nouser");
					exit();
				}
					
			}
			
		}
		
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
		
	}
	else{
		header("Location: Home.php");
		exit();
	}

	?>
	</body>
</html>