
window.onload = function()
{
	document.getElementById('login').addEventListener('click',
	function(){
		document.querySelector('.bg-modal').style.display = 'flex';
	}
	);

	document.querySelector('.close').addEventListener('click',
	function(){
		document.querySelector('.bg-modal').style.display = 'none';
	}
	);

}

function LoginValidation(f)
{
	  var user = f.Name.value;
	  var pwd = f.Password.value;
	  if (user == "" && pwd=="") {
		alert("Name  and password must be filled out");
		return false;
	  }
	  else if(user == "") 
	  {
		alert("Name must be filled out");
		return false;
	  }
	  else if(pwd == ""){
		alert("Password must be filled out");
		return false;
	  }
	  else{
		return true;
	  }
	  
}

function SignupValidation(f)
{
	  var FirstName = f.Name.value;
	  var Lastname = f.Lastname.value;
	  var Email = f.Email.value;
	  var User = f.User.value;
	  var Password = f.Password.value;
	  var Repeat = f.Repeat.value;
	  var specialcharactercheck =  /[!@#$%^&*]/g;
	  var Upperlettercheck =  /[A-Z]/g;
	  var Numbercheck =  /[0-9]/g;
	  /*****checking for empty fields*****/
	  if (FirstName == "" || Lastname=="" || Email=="" || User=="" || Password=="" || Repeat=="") {
		alert("Please fill all the fields");
		return false;
	  }

	 /*****checking vaild email*****/
	 else if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(Email)== false)
	 {
		alert("You have entered an invalid email address!");
		return false;
	 }

	else if(User.length < 6 || User.length > 10){
			alert("UserName should be between 6 and 10 characters");
			return false;
	}
	
	else if(Password.length < 6 || Password.length > 10){
			alert("Password should be between 6 and 10 characters");
			return false;
	}
	else if(Password.match(specialcharactercheck)== null){
		alert("Password should have atleast one special character");
		return false;
	}
	else if(Password.match(Upperlettercheck)== null){
		alert("Password should have atleast one Capital letter");
		return false;
	}
	else if(Password.match(Numbercheck)== null){
		alert("Password should have atleast one number");
		return false;
	}
	else if(Password!=Repeat){
		alert("Passwords donot match");
		return false;
		
	}
	else
	{
		return true;
	}

}


function ContactValidation(f)
{
	  var Name = f.Name.value;
	  var Subject = f.Subject.value;
	  var Email = f.Email.value;
	  var Message = f.Message.value;
	  
	  /*****checking for empty fields*****/
	  if (Name == "" || Subject=="" || Email=="" || Message=="") {
		alert("Please fill all the fields");
		return false;
	  }
	  
	 /*****checking vaild email*****/
	 else if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(Email)== false)
	 {
		alert("You have entered an invalid email address!");
		return false;
	 }
	  else if(Message.length>1000){
		alert("Message should be less than 1000 characters");
		return false;
	  }
	  else{
		return true;
	  }
	  
}



