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
<font color='white'><center><h1><u>Message Sent Successfully</u></h1></center></font>
<?php
     $data=executequery("select user_name,chat_material,date_time from chat,user where user_id=chat_receiver_id and chat_sender_id=$uid");
	 $i=0;
    while($rec=mysqli_fetch_row($data))
    {
     $i=$i+1;		
     $user_name=$rec[0];	
     $chat_material=$rec[1];	
     $date_time=$rec[2];
       	 
	 if($i%2==0)
	 {
	echo "<table border='5' bordercolor='maroon' align='center' height='10%' width='50%' >
	<tr bgcolor='white'>
	       <td width='1%'>$user_name</td>		    
	<td width='30%' id='ufont'>  <b>MESSAGE$i :</b><br>
	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   $date_time	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
	</table>
	<table border='5' bordercolor='maroon' align='center' height='5%' width='50%'>
     <tr bgcolor='yellow'>
		<td id='qfont'>	$chat_material		
		<br>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</tr>
  </table>";
	 }
	 else
	 {
	echo "<table border='5' bordercolor='maroon' align='center' height='10%' width='50%' >
	<tr style='background-color:rgb(200,200,200);'>
	       <td width='1%'>$user_name</td>		    
	<td width='30%' id='ufont'>  <b>MESSAGE$i :</b><br>
	   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   $date_time	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
	</table>
	<table border='5' bordercolor='maroon' align='center' height='5%' width='50%'>
     <tr style='background-color:rgb(153,255,153);'>
		<td id='qfont'>	$chat_material 
		<br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</tr>	 
	 </table>";
	 }	
     echo "<br>";	 
 }
?>

<?php
    require_once('http://127.0.0.1/Nist_forum/footer.php');
?>