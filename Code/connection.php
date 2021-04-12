<?php
	
	$servername = "localhost:3306";
	$dbUsername = "saikrish_sai546";
	$dbPassword = "Sunitharavi@123";
	$dbname = "saikrish_Krishna";
	
	$conn = mysqli_connect($servername,$dbUsername,$dbPassword,$dbname);
	
	if(!$conn){
		die("Connection failed: ".mysqli_connect_error());
	}
	
?>