<?php
require_once("header.php");
?>

<link rel="stylesheet" href="log.css" type="text/css" media="screen" />
<center>
<div class="b">
 <font Color='red'><h1>Invalid user id or password </h1>
 <h1>Please Relogin...</h1></font>
  <img src="http://127.0.0.1/Nist_forum/images/login_bkg.png" alt="topp" class="topp">
 <form action='login_code.php' method='post'>
   <div>
    <label for="uname"><font color='green'><b>Username</b></font></label>
    <input type="text" placeholder="Enter Username" name="email" required>
		<br>
    <label for="psw"><font color='green'><b>Password&nbsp; </b></font></label>
    <input type="password" placeholder="Enter Password" name="password" required>
		<br>
		   <input class="button" type="submit" name='sub' value='Login'>	
         <br>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div style="background-color:green;width:50%">
     <input type="reset"  value='Cancel'>
    &nbsp;&nbsp;
	<span class="psw">Forgot <a href="http://127.0.0.1/Nist_forum/forget.php">password?</a></span>
  </div>

 </form>
 </div>
</center>
<?php
    require_once('http://127.0.0.1/Nist_forum/footer.php');
?>

