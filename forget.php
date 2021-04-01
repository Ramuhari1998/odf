<?php
    require_once('http://127.0.0.1/Nist_forum/header.php');
	
?>
<?php
      error_reporting(E_ALL);
	function executequery($sql)
	{
		$con = mysqli_connect('localhost','root','');
	      mysqli_select_db($con,'dforum');
		$data=mysqli_query($con,$sql);
		mysqli_close($con);	
           return $data;		
	}
	function executenonquery($sql)
	{
		$con = mysqli_connect('localhost','root','');
	      mysqli_select_db($con,'dforum');
		$result=mysqli_query($con,$sql);
		mysqli_close($con);	
           return $result;		
	}	
?>
<?php
 if(isset($_POST['rotp']))
  {
	  $email=$_POST['email'];
	  setcookie('email',$email);
	  //echo $email,'<br>';
	  //$to_email = "dunnasekhar786@gmail.com";
	$subject = "OTP FOR RECONFIGURE PASSWORD.";
	$body = "otp is valid for 10 mins: 10112";
	$headers = "From:ramuhari1998@gmail.com";

	if (mail($email, $subject, $body, $headers)) {
		echo "<center><b><h1><font color='white'>OTP successfully sent</font></h1></b></center>";
	}
	else {
		echo "Email sending failed...";
	}
  }

if(isset($_POST['sub']))
  {
	  $email=$_COOKIE['email'];
	  $password=$_POST['password'];
	  //echo $password,'<br>';
	  $pass=$_POST['pass'];
	  //echo $pass,'<br>';
	  $otp=$_POST['otp'];
	  if($otp=='10112' && $password==$pass)
	  {
		    $password=md5($password);
		    $sql = "update user  set password='$password' where email='$email'";	        
	   //echo $sql,'<br>';
	   $res=executenonquery($sql);
	  }
	  header('location:http://127.0.0.1/Nist_forum/login.php');
	  //echo $otp,'<br>';
  }
  
  ?>
<center>
<table>
<form action="" method="POST">
<tr><td>
<font color='white'>ENTER YOUR MAIL ID:</font></td>
<td><input type="email" placeholder="Enter Your Mail ID" name="email" required></td>
</tr>

       <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr> 
	   
<tr><td>
<td><input type="submit" value="REQUEST FOR OTP" name="rotp"></td>
</tr>
</form>
<form action="" method="POST">
<tr><td>
<font color='white'>ENTER NEW PASSWORD:</font></td>
<td><input type="password" placeholder="Enter New Password" name="password" required></td>
</tr>

       <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr> 
	   
<tr><td>
<font color='white'>CONFIRM NEW PASSWORD:</font></td>
<td><input type="password" placeholder="Confirm new Password" name="pass" required></td>
</tr>

       <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr> 
	   
<tr><td>
<font color='white'>ENTER OTP:</font></td>
<td><input type="text" name="otp" required></td>
</tr>

       <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr> 
	  
<tr>
 <td></td> 
 <td><input type="submit" name="sub">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" value='Cancel'></td></tr>
</table>
</form>
</center>


<?php
    require_once('http://127.0.0.1/Nist_forum/footer.php');
?>
