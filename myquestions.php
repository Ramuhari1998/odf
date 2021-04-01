<?php
    require_once('http://127.0.0.1/Nist_forum/header.php');
   // require_once('http://127.0.0.1/Nist_forum/afterlogin.php');
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
	<link rel="stylesheet" href="log.css" type="text/css" media="screen" />
<html>
<head>
<style type='text/css'>
  #lufont
  {
	  font-family: "Arial";
	  font-style: bold italic;
	  font-size: 20px;
	  color: rgb(255,255,0);
  }
</style>
</head>
<body>
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
	</table>  <br>
	<center>
   <div class="b">
 <table>

      <form action='myquestions_new.php' method='post'>
		 
      <tr rowspan='5'>
	      <td><font color='green'><b>TOPICS</b></font></td>
		  <td><select   name='topic_id'>
		           <option value="empty">Select a Topic</option>
			       <?php
				        $data=executequery('select topic_id,t_title from topic');
					   while($rec=mysqli_fetch_row($data))
					  {
							echo "<option value='$rec[0]'>$rec[1]</option>"; 
					  }
				    ?>
		        </select>
            <input type='submit' name='s1' value='click to choose subtopic'></td>		   
        </tr>
	</form>
	</table>
	<table>
	  <tr rowspan='5'>
	      <td><font color='green'><b>SUB TOPICS</b></font></td>
		  <td>
		      <select id="country">
				<option value="0">Select a subtopic</option>
			    <?php
					   while($rec=mysqli_fetch_row($data))
					  {
							echo "<option value='$rec[0]'>$rec[1]</option>"; 
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
	
</table>
</div>
</center>
<br>
<center><h2><b><u><font color='white'>MY QUESTIONS</font></u></b></h2></center>
 <?php
     $data=executequery("select material from question where que_setter_id=$uid");
	 $i=0;
    while($rec=mysqli_fetch_row($data))
    {
     $i=$i+1;		
     $material=$rec[0];	
     if($i%2==0)
	 {
	echo "<table border='5' bordercolor='maroon' align='center' height='5%' width='50%'>
     <tr bgcolor='yellow'>
		  <td id='qfont'><font color='red'><b>Question->$i ::	</b></font>$material		
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