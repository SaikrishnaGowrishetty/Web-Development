<?php ob_start(); ?>
<?php

include "connection.php";

if(isset($_POST['insert'])){
	
	
	$Network = $_POST['Network'];
	$Username = $_POST['UserName'];
	$Link = $_POST['Link'];
		$sql = "select Network_Name from network where Network_Name=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: Signup.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt,"s",$Network);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultcheck = mysqli_stmt_num_rows($stmt);
			if($resultcheck > 0){
				header("Location: Home_Admin.php?error=Network already added");
				exit();
			}
			else{
				$sql = "Insert into network(Network_Name,UserName,link) values(?,?,?)";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt,$sql)){
					header("Location: Home_Admin.php?error=sqlerror");
					exit();	
				}
				else{
					
					mysqli_stmt_bind_param($stmt,"sss",$Network,$Username,$Link);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					header("Location: Home_Admin.php?RecordAdded");
					
					
				}
				
				
			}
				
		}
		
	
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	exit();
}

if(isset($_GET['Networkdel'])){
	
	
	$Network = $_GET['Networkdel'];
	mysqli_query($conn,"Delete from network where Network_Name='$Network'");
	header("Location: Home_Admin.php?".$Network);
	exit();
}

if(isset($_POST['NetworkUpdate'])){
	
	
	$Network = $_POST['Network'];
	$Username = $_POST['UserName'];
	$Link = $_POST['Link'];
	mysqli_query($conn,"update network set UserName='$Username',Link='$Link' where Network_Name='$Network'");
	header("Location: Home_Admin.php");
	exit();
}

if(isset($_POST['about-update'])){
	
	
	$Age = $_POST['age'];
	$Email = $_POST['Email'];
	$Phone = $_POST['Phone'];
	$Address = $_POST['Address'];
	$Languages = $_POST['languages'];
	mysqli_query($conn,"update admin set age='$Age',Email='$Email',Phone='$Phone',Address='$Address',languages='$Languages'");
	header("Location: About_Admin.php");
	exit();
}

/****Skillls****/
if(isset($_POST['skill-insert'])){
	
	
	$SkillName = $_POST['Skill'];
	$Level = $_POST['Level'];
	mysqli_query($conn,"Insert into skills(SkillName,Level)values('$SkillName',$Level)");
	header("Location: skills_Admin.php?".$SkillName.$Level);
	exit();
}

if(isset($_GET['delskill'])){
	
	
	$SkillID = $_GET['delskill'];
	mysqli_query($conn,"Delete from skills where SkillID='$SkillID'");
	header("Location: skills_Admin.php?");
	exit();
}

if(isset($_POST['skill-update'])){
	
	$SkillID = $_POST['SkillID'];
	$SkillName = $_POST['SkillName'];
	$Level = $_POST['Level'];
	mysqli_query($conn,"update skills set Level='$Level',SkillName='$SkillName' where SkillID='$SkillID'");
	header("Location: skills_Admin.php");
	exit();
}

/****experience****/
if(isset($_POST['experience-insert'])){
	
	
	$Company = $_POST['CompanyName'];
	$Role = $_POST['Role'];
	$StartDate = $_POST['StartDate'];
	$Enddate = $_POST['EndDate'];
	$Job_Description = $_POST['Job_Description'];
	mysqli_query($conn,"Insert into experience(CompanyName,Role,StartDate,Enddate,Job_Description)
	values('$Company','$Role','$StartDate','$Enddate','$Job_Description')");
	header("Location: Experience_Admin.php?");
	exit();
}

if(isset($_GET['workdel'])){
	
	
	$CompanyID = $_GET['workdel'];
	mysqli_query($conn,"Delete from experience where CompanyID='$CompanyID'");
	header("Location: Experience_Admin.php?");
	exit();
}

if(isset($_POST['experience-update'])){
	
	$CompanyID = $_POST['CompanyID'];
	$Company = $_POST['CompanyName'];
	$Role = $_POST['Role'];
	$StartDate = $_POST['StartDate'];
	$Enddate = $_POST['EndDate'];
	$Job_Description = $_POST['Job_Description'];
	mysqli_query($conn,"update experience set CompanyName='$Company',Role='$Role',StartDate='$StartDate',Enddate='$Enddate',Job_Description='$Job_Description' 
	where CompanyID='$CompanyID'");
	header("Location: Experience_Admin.php");
	exit();
}

/********Education*********/

if(isset($_POST['education-insert'])){
	
	
	$StartDate = $_POST['startdate'];
	$degreename = $_POST['DegreeName'];
	$EndDate = $_POST['enddate'];
	$coursename = $_POST['coursename'];
	$UniversityName = $_POST['UniversityName'];
	mysqli_query($conn,"Insert into education(DegreeName,StartDate,Enddate,coursename,UniversityName)
	values('$degreename','$StartDate','$EndDate','$coursename','$UniversityName')");
	header("Location: Education_Admin.php?");
	exit();
}


if(isset($_GET['educationdel'])){
	
	$DegreeID = $_GET['educationdel'];
	mysqli_query($conn,"Delete from education where DegreeID='$DegreeID'");
	header("Location: Education_Admin.php?");
	exit();

}

if(isset($_POST['education-update'])){
	
	$DegreeID = $_POST['DegreeID'];
	$StartDate = $_POST['startdate'];
	$DegreeName = $_POST['DegreeName'];
	$EndDate = $_POST['enddate'];
	$coursename = $_POST['coursename'];
	$UniversityName = $_POST['UniversityName'];
	mysqli_query($conn,"update education set DegreeName='$DegreeName',startdate='$StartDate',coursename='$coursename',
	enddate='$EndDate',UniversityName='$UniversityName' where DegreeID='$DegreeID'");
	header("Location: Education_Admin.php");
	exit();
}


/******Blog*****/

if(isset($_POST['blog-update'])){
	
	$BlogID = $_POST['BlogID'];
	$BlogName = $_POST['Title'];
	$Description = $_POST['Description'];
	$Link = $_POST['Blog_Link'];
	$tag = $_POST['tag'];
	$comments = $_POST['comments'];
	mysqli_query($conn,"update blogs set BlogID='$BlogID',Title='$BlogName',description='$Description',
	Blog_Link='$Link',tag='$tag',comments='$comments' where BlogID='$BlogID'");
	header("Location: Blog_Admin.php");
	exit();
}


/*********Hire me*********/

if(isset($_GET['Hiredel'])){
	
	$ServiceID = $_GET['Hiredel'];
	mysqli_query($conn,"Delete from hireme where ServiceID='$ServiceID'");
	header("Location: Hireme_Admin.php?");
	exit();

}

if(isset($_POST['Hireme-insert'])){
	
	
	$ServiceName = $_POST['ServiceName'];
	$Price_USD = $_POST['Price_USD'];
	$Description = $_POST['Description'];
	mysqli_query($conn,"Insert into hireme(ServiceName,Price_USD,Description)
	values('$ServiceName','$Price_USD','$Description')");
	header("Location: Hireme_Admin.php?");
	exit();
}

if(isset($_POST['Hireme-update'])){
	
	$ServiceID = $_POST['ServiceID'];
	$ServiceName = $_POST['ServiceName'];
	$Price_USD = $_POST['Price_USD'];
	$Description = $_POST['Description'];
	mysqli_query($conn,"update hireme set ServiceName='$ServiceName',Price_USD='$Price_USD',
	Description='$Description' where ServiceID='$ServiceID'");
	header("Location: Hireme_Admin.php");
	exit();
}


/*******send email******/

if(isset($_POST['send-enquiry'])){

	$name = $_POST['Name'];
	$subject = $_POST['Subject'];
	$email = $_POST['Email'];
	$message = $_POST['Message'];
	
	$email_from = "g.sai546@gmail.com";
    $email_subject = $subject;
    $email_body = "You have received a new message from the user ". $name.
                            "\n Here is the message: ".$message;


	$to = "g.sai546@gmail.com";
    $headers = "From:".$email_from." Reply-To:". $email;
    mail($to,$email_subject,$email_body,$headers);

    header("Location: Contact.php?emailsuccess".$headers.$email_from.$to.$email_subject);
	
	
}


else{
	header("Location: Home_Admin.php");
	exit();
}

?>