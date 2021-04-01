<?php
    require_once('http://127.0.0.1/Nist_forum/header.php');
?>
<link rel="stylesheet" href="log.css" type="text/css" media="screen" />
<head>
<script>


			window.addEventListener('load', function() {
			document.querySelector('input[type="file"]').addEventListener('change', function() {
			if (this.files && this.files[0]) {
			var img = document.getElementById('fileToUpload'); 
			img.src = URL.createObjectURL(this.files[0]);
    }
  });
});



function allLetter(user_name)
{ 
	var letters = /^[  A-Za-z]+$/;
	if(user_name.value.match(letters))
	{
	return true;
	}
	else
	{
		alert('Username must have alphabet characters only');
		user_name.focus();
	return false;
	}
}
////////////
function password_validation(password,mx,my)
{
var password_len = password.value.length;
if (password_len == 0 ||password_len >= my || password_len < mx)
{
alert("Password should not be empty / length be between "+mx+" to "+my);
password.focus();
return false;
}
return true;
}
///////////////
function ValidateEmail(email)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(email.value.match(mailformat))
{
return true;
}
else
{
alert("You have entered an invalid email address!");
uemail.focus();
return false;
}
}
/////////////////

//////////////////
/////////////////
function formValidation()
{
var user_name = document.registration.user_name;
var password = document.registration.password;
var email = document.registration.email;
	
if(allLetter(user_name))
{
	if(password_validation(password,7,12))
	{
		if(ValidateEmail(email))
		{
		return true;
		}
	}
}
return false;
}
</script>

</head>
<html>
<center>
<div class="b">
<div>
    <h2><font color='green' size='5'><b>Registration Form</b></font></h2>
	<form action='signup_code.php' method='post' enctype='multipart/form-data' name='registration' onSubmit="return formValidation();">
	<table>
	   <tr>
	      <td align='center'><font color='green'><b>User Name:</b></font></td>
		  <td><input type='text' name='user_name' size='40' required/></td>
	   </tr>
	    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>  
	    <tr>
	      <td align='center'><font color='green'><b>Password:</b></font></td>
		  <td><input type='password' name='password' size='40'/></td>
	   </tr>
       <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr> 
		<tr>
	      <td align='center'><font color='green'><b>UserType:</b></font></td>
		  <td><select  name='user_type'>
			   <option value=''>&nbsp;</option>
		       <option value='student'>Student</option>
			   <option value='teacher'>Teacher</option>
			   <option value='alumini'>Alumini</option>
			    <option value='alumini'>Admin</option>
			   </select></td>
	   </tr>   
       <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>  
	   <tr>
	      <td align='center'><font color='green'><b>Date Of Birth:</b></font></td>
		  <td><input type='date' name='dob'/></td>
	   </tr>
       <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr> 
	   <tr>
	      <td align='center'><font color='green'><b>Email:</b></font></td>
		  <td><input type='email' name='email' size='40'/></td>
	   </tr>
       <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr> 
	   <tr>
	      <td align='center'><font color='green'><b>Gender:</b></font></td>
		  <td><input type='radio' name='gender' value='M'/><font color='green'><b>MALE</b></font>
		  <input type='radio' name='gender' value='F'/><font color='green'><b>FEMALE</b></font></td>
	   </tr>
       <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr> 
	   <tr>
	      <td align='center'><font color='green'><b>Phone Number:</b></font></td>
		  <td><input type='int' name='phone_no' size='40'/></td>
	   </tr>
       <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
	   <tr>
	      <td align='center'><font color='green'><b>Country:</b></font></td>
		  <td><input type='text' name='country' size='40'/></td>
	   </tr>
       <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
	   <tr>
	      <td align='center'><font color='green'><b>State:</b></font></td>
		  <td><input type='text' name='state' size='40'/></td>
	   </tr>
       <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
	   <tr>
	      <td align='center'><font color='green'><b>Address:</b></font></td>
		  <td><textarea rows='5' cols='40' name='address'></textarea></td>
	   </tr>
       <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
	   <tr>
	      <td align='center'><font color='green'><b>Photo:</b></font><br></td>
		  
		  
		    <td style="padding-left:70px;"><input type='file' name='photo' /></td>
	   </tr>
       <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
	    <!-- <tr>
		  <td></td>
	      <td align='center'><input type='submit' name='sub' value='Register'  />
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <input type='reset' value='Cancel'/></td>		
	   </tr> -->
	 </table>
	<div style="margin-top:-40px; margin-right:140px;">
	 <img src='http://127.0.0.1/Nist_forum/images/upload.png' id="fileToUpload" width="60" height="60">
	 </div>
	 <div style="margin-top:20px;">
	 <input class="button" type='submit' name='sub' value='Register'  /> <input class="button" type='reset' value='Cancel'/>
	 </div>
	
	</form>
</center></div></div>
</html>
<?php
    require_once('http://127.0.0.1/Nist_forum/footer.php');
?>
