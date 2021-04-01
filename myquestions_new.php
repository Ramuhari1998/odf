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
      if(isset($_POST['s1']))
	{
		$topic_id=$_POST['topic_id'];
	}
					
?>
	<link rel="stylesheet" href="log.css" type="text/css" media="screen" />
<html>
<head>
 </head>
<body>
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
<center>
<div class="b">
<table>
  	 <form action="myquestions_code.php" method="post">
      <tr rowspan='5'>
	      <td><font color='green'><b>TOPICS</b></font></td>
		  <td><select   name='topic_id'>
			       <?php
				        $data=executequery("select topic_id,t_title from topic where topic_id='".$topic_id."'");
					   while($rec=mysqli_fetch_row($data))
					  {
							echo "<option value='$rec[0]'>$rec[1]</option>"; 
					  }									  
				    ?>
		        </select>
		    	
        </tr>
	  <tr rowspan='5'>
	      <td><font color='green'><b>SUB TOPICS</b></font></td>
		  <td>
		      <select name='subt_id'>
				<option value="0">Select a subtopic</option>
			    <?php
				     if(isset($_POST['s1']))
					{
						$topic_id=$_POST['topic_id'];
						$sql="select subt_id,s_title from subtopic where topic_id="."'".$topic_id."'";
						$data=executequery($sql);
					   while($rec=mysqli_fetch_row($data))
						{
							echo "<option value='$rec[0]'>$rec[1]</option>"; 
						}
					}
				?>		
			  </select>
		   </td>     
     </tr>
	 <tr>
	   <td><font color='green'><b>ENTER YOUR QUESTION</b></font></td>
	   <td><textarea rows="5" cols="60" name='material'></textarea>
	   </span></td>
	   </tr>
	   <tr>
	      	<td></td><td align='center'><input class="button" type="submit" name="Post" value="Post">&nbsp;&nbsp;&nbsp;&nbsp;<input class="button" type="reset" value="Clear"></td>
	  </tr>
	  </form>
   </table>
   </div>
   </center>
</body>

</html>

<?php
    require_once('http://127.0.0.1/Nist_forum/footer.php');
?>