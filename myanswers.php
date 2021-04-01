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
<br><br><br>
<html>
<body>
 <?php
     $data=executequery("select material,ans_material from question,answer where question.question_id=answer.question_id and user_id=$uid");
	 $i=0;
    while($rec=mysqli_fetch_row($data))
    {
     $i=$i+1;		
     $material=$rec[0];	
     $ans_material=$rec[1];
     if($i%2==0)
	 {
	echo "<table border='5' bordercolor='maroon' align='center' height='5%' width='50%'>
     <tr bgcolor='yellow'>
		  <td id='qfont'><font color='red'><b>Question->$i ::	</b></font>$material		
	</tr>
	 <tr bgcolor='pink'>
		  <td id='qfont'>	$ans_material		
	</tr>
         </table>";
		 echo "<br>";
	 }
	 else
	 {
	echo "<table border='5' bordercolor='maroon' align='center' height='5%' width='50%'>
     <tr bgcolor='yellow'>
		  <td id='qfont'><font color='red'><b>Question->$i ::	</b></font>	$material		
	</tr>
	 <tr bgcolor='pink'>
		  <td id='qfont'>	$ans_material		
	</tr>
         </table>";
		 echo "<br>";
	 }	 	 
 }
 
?> 
</body>
</html>
<?php
    require_once('http://127.0.0.1/Nist_forum/footer.php');
?>