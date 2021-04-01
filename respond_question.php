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
  #qfont
  {
	  font-family: "Times New Roman";
	  font-style: normal;
	  font-size: 15px;
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
<style type='text/css'>
  #lufont
  {
	  font-family: "Arial";
	  font-style: bold italic;
	  font-size: 20px;
	  color: rgb(255,255,0);
  }
</style>
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
    <br><br><br>
<?php
     $data=executequery("select user_name,date_time,material,photo from question,user where user_id=que_setter_id");
	 $i=0;
    while($rec=mysqli_fetch_row($data))
    {
     $i=$i+1;		
     $user_name=$rec[0];	
     $date_time=$rec[1];	
     $material=$rec[2];
     $photo='http://127.0.0.1/Nist_forum/upload/'.$rec[3];	 
	 if($i%2==0)
	 {
	echo "<table border='5' bordercolor='maroon' align='center' height='10%' width='50%' >
	<tr bgcolor='white'>
	       <td width='1%'><img src='$photo' height='50' width='50'/></td>		    
	<td width='30%' id='ufont'>  <b>Question$i :</b><br>
	    by <b>$user_name</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   $date_time	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
	</table>
	<table border='5' bordercolor='maroon' align='center' height='5%' width='50%'>
     <tr bgcolor='yellow'>
		<td id='qfont'>	$material		
		<br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href=''><b>Reply</b></a></td>
      
    </tr>
  </table>";
	 }
	 else
	 {
	echo "<table border='5' bordercolor='maroon' align='center' height='10%' width='50%' >
	<tr style='background-color:rgb(200,200,200);'>
	       <td width='1%'><img src='$photo' height='50' width='50'/></td>		    
	<td width='30%' id='ufont'>  <b>Question$i :</b><br>
	    by <b>$user_name</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   $date_time	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
	</table>
	<table border='5' bordercolor='maroon' align='center' height='5%' width='50%'>
     <tr style='background-color:rgb(153,255,153);'>
		<td id='qfont'>	$material 
		<br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href=''><b>Reply</b></a></td>
	</tr>	 
	 </table>";
	 }	
     echo "<br>";	 
 }
?>  
