<?php
    require_once('http://127.0.0.1/Nist_forum/header.php');
?>
<!----------------        -->

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

<style type='text/css'>
  #lufont
  {
	  font-family: "Arial";
	  font-style: bold italic;
	  font-size: 20px;
	  color: rgb(255,255,0);
  }
 
</style>
<link rel="stylesheet" href="log.css" type="text/css" media="screen" />
 <table align='right'>
		<tr>
			<td align='right' id='lufont'> 
			<?php
			 session_start();		
			 //echo $_SESSION['logged_user'];
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
<html>
<body>
<?php
     $question_id=$_REQUEST['question_id'];
	$sq = "select material from question where question_id='".$_REQUEST['question_id']."'";
     $dat=executequery($sq);				
	if($re=mysqli_fetch_row($dat))
	{
		$material=$re[0];
	}	 
?>
<center>
<div class="b">
<table>
<form action='myanswers_code.php' method='post'>
<tr><tr><font color='green'><b>YOUR QUESTION</b></font><br/><textarea rows='3' cols='60' readonly><?php  echo $material; ?></textarea>
     <input type='hidden' name='question_id' value='<?php  echo $question_id; ?>'/>
<span id='b' style="color: red;"></span></tr><br/>
</tr>
<tr><tr><font color='green'><b>ENTER YOUR ANSWER</b></font><br/><textarea rows="3" cols="60" name='ans_material'></textarea>
<span id='b' style="color: red;"></span></tr><br/>
<tr><td><input class="button" type="submit" value="Post"></td><td><input class="button" type="reset" value="Clear"></td></tr>
</table>
</div>
</center>
</form>
</body>
</html>
<?php
    require_once('http://127.0.0.1/Nist_forum/footer.php');
?>