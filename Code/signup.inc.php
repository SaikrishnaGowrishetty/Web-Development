<?php

if(isset($_POST['signup-submit'])){
		include "connection.php";
	
	$FirstName = $_POST['Name'];
	$LastName = $_POST['Lastname'];
	$Email = $_POST['Email'];
	$User = $_POST['User'];
	$Password = $_POST['Password'];
	$Repeat = $_POST['Repeat'];
	
	if(empty($FirstName) || empty($LastName)|| empty($Email) || empty($User) || empty($Password) || empty($Repeat)){
			header("Location: Signup.php?error=emptyfields&Name=".$FirstName."&Lastname=".$LastName."&Email=".$Email."&User=".$User);
			exit();
	}
	else if(!filter_var($Email,FILTER_VALIDATE_EMAIL)){
			header("Location: Signup.php?error=Invalidemail&Name=".$FirstName."&Lastname=".$LastName."&Email=".$Email."&User=".$User);
			exit();
	}
	else if($Password !== $Repeat){
			header("Location: Signup.php?error=CheckPasswords&Name=".$FirstName."&Lastname=".$LastName."&Email=".$Email."&User=".$User);
			exit();
	}
	else{
		$sql = "select Username from employersignup where Username=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: Signup.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt,"s",$User);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultcheck = mysqli_stmt_num_rows($stmt);
			
			if($resultcheck > 0){
				header("Location: Signup.php?error=UserName_already_exists&Name=".$FirstName."&Lastname=".$LastName."&Email=".$Email."&User=".$User);
				exit();
			}
			else{
				$sql = "Insert into employersignup(First_Name,Last_Name,EmailId,Username,password) values(?,?,?,?,?)";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt,$sql)){
					header("Location: Signup.php?error=sqlerror");
					exit();
				}
				else{
					
					$hashedpwd = password_hash($Password,PASSWORD_BCRYPT);
					
					mysqli_stmt_bind_param($stmt,"sssss",$FirstName,$LastName,$Email,$User,$hashedpwd);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					header("Location: Signup.php?signup=success".$resultcheck.$User);
					exit();
					
					
				}
				
				
			}
				
		}
		
	}
	
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	
}
else{
	header("Location: Signup.php");
	exit();
}

?>