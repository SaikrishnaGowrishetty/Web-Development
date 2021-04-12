<?php

if(isset($_POST['update'])){
	include "connection.php";
	
	$Age = $_POST['Age'];
	$Email = $_POST['Email'];
	$Phone = $_POST['phone'];
	$Address = $_POST['Address'];
	$Languages = $_POST['Languages'];
	$About = $_POST['About'];
	$sql = "update admin set `age`=?,`Email`=?,`Phone`=?,`Address`=?,`Languages`=?,`Email`=?,`Description`=? where `Network_Name`=?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("Location: Home_Admin.php?error=sqlerror");
		exit();
	}
	else{
		
		mysqli_stmt_bind_param($stmt,"ssssss",$Age,$Email,$phone,$Address,$Languages);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		header("Location: Home_Admin.php?RecordUpdated".$resultcheck.$Network.$Username.$Link);
		exit();
		
		
	}
	
				
				
		}
		
	
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	
}
else{
	header("Location: Home_Admin.php");
	exit();
}

?>