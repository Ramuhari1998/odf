<?php
    require_once('http://127.0.0.1/Nist_forum/header.php');
?>
<link rel="stylesheet" href="log.css" type="text/css" media="screen" />

<body>
<center>
<div class="b">
  <div class="imgcontainer">
    <img src="http://127.0.0.1/Nist_forum/images/login_bkg.png" alt="topp" class="topp">
  </div>
<form action="login_code.php" method="post">

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
	<span class="psw">Forgot <a href="forget.php">password?</a></span>
  </div>
</form>
 <div>
</center>
</body>

<?php
    require_once('http://127.0.0.1/Nist_forum/footer.php');
?>





<!--
<form action='login_code.php' method='post'>
    <table width="80%" style="padding-left:200px; float:left; padding-right:20px;" cellpadding="0px" border="0">
				<tr>
					<tr><td class="lebel" align="center"> 
						User Id :								
						<input type="textbox" id="txtLoginNameID" name="email" value="" class="PageTextBox"/>
					</td></tr>
					<tr><td class="lebel"  align="center"> 
						Password &nbsp;&nbsp; :	
						<input type="Password" id="txtPasswordID" name="password" value="" class="PageTextBox"/>
					</td></tr>
					<td  align="center">
						&nbsp;
						<input type="submit" name="sub" id="btnGoID" value="Login" class="PageTextBox"/>
					</td>
				</tr>                           
			</table>
			</form>
-->










