<?php
    require_once('http://127.0.0.1/Nist_forum/header.php');
?>
<!------------------>
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
<head>

<style type='text/css'>
  #lufont
  {
	  font-family: "Arial";
	  font-style: bold italic;
	  font-size: 20px;
	  color: rgb(255,255,0);
  }
    #qfont
  {
	  font-family: "Times New Roman";
	  font-style: normal;
	  font-size: 25px;
	  color: rgb(0,0,255);
  }
  #ufont
  {
	  font-family: "Arial";
	  font-style: bold italic;
	  font-size: 20px;
	  color: rgb(255,0,0);
  }
</style>
</head>
 <table align='right'>
		<tr>
			<td align='right' id='lufont'> 
			<?php
			 session_start();		
			 //echo $_SESSION['logged_user'];
			$uid=$_SESSION['logged_user'];
		
			if(($_SESSION['logged_user'])!='')
			{
				echo "User Login As:";
				$sq = "select user_name from user where user_id='".$_SESSION['logged_user']."'";
			    $dat=executequery($sq);
				
				if($re=mysqli_fetch_row($dat))
				{
					echo "<span style='color:skyblue;'>",$re[0],'</span>';
				}	
			}	
               else
					echo "<h1>Pls Login with mailid & password....</h1>";				   
			?>	
			</td>
		</tr>
		<tr>
			<td align='right'>
				<a href='logout.php'><span style='color:#99ff66;'><b>LOGOUT</b></span></a>
			</td>
		</tr>
	</table>
<!---------          -->
 <font color='white'><center><h1>Message Sent Successfully</h1></center></font>
 <form action='message_code.php' method='post'>
<table>       
	  <tr>
	      <td><font color='white'>TO:</font>
		  <select  name='user_name'>
			   <option value=''>&nbsp;</option>
			   <?php
				        $data=executequery('select user_name,user_id from user where user_id!='.$_SESSION['logged_user']);
					   while($rec=mysqli_fetch_row($data))
					  {
							echo "<option value='$rec[1]'>$rec[0]</option>"; 
					  }
			  ?>
		      </select></td>
	   </tr>   
	   <tr><td><font color='white'>ENTER YOUR MESSAGE:</font></td></tr>
	   <tr><td><textarea rows="3" cols="50" name='material'></textarea></td></tr>
	   <td><input type='submit' id="myBtn" value='Send' name='send'>
   </td>
</table>
</form>


<?php
    require_once('http://127.0.0.1/Nist_forum/footer.php');
?>