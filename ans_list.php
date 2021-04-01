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
    function geturl()
	{	
	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];       
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    
      //echo $url;
	  return $url;
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
    #ufont
  {
	  font-family: "Arial";
	  font-style: bold italic;
	  font-size: 20px;
	  color: rgb(255,0,0);
  }
   #qfont
  {
	  font-family: "Times New Roman";
	  font-style: normal;
	  font-size: 15px;
	  color: rgb(0,0,255);
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
	</table><br><br><br>
    <!------------------>
  <?php 
   if(isset($_REQUEST['question_id']))
  {
	  $question_id=$_REQUEST['question_id'];
	  //echo $question_id,'<br>';
	       
	  $data=executequery("select user_name,date_time,material,photo from question,user where user_id=que_setter_id and question_id='$question_id'");
	 if($rec=mysqli_fetch_row($data))
	{
	   $user_name=$rec[0];	
        $date_time=$rec[1];	
        $material=$rec[2];
        $photo='http://127.0.0.1/Nist_forum/upload/'.$rec[3];	
	   echo "<table border='5' bordercolor='maroon' align='center' height='10%' width='50%' >
	<tr bgcolor='white'>
	       <td width='1%'><img src='$photo' height='50' width='50'/></td>		    
	<td width='30%' id='ufont'>  <b>Question::$material </b><br>
	    by <b>$user_name</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   $date_time	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
	</table><br>";        	
	}	
	  $sql = "select ans_material,user_id,answer_id ,like_user_id from answer where question_id='$question_id'";
	  $data=executequery($sql);
	  while($rec=mysqli_fetch_row($data))
     {
	   $ans_material = $rec[0];
	   $answer_id=$rec[2];
	   $like_user_id=$rec[3];
	   $sq = "select user_name from user where user_id='$rec[1]'";
	   $dat=executequery($sq);			
	   if($re=mysqli_fetch_row($dat))
	  {
		$user_name  = $re[0];
	  } 
	  if(strlen($user_name)<100)
	  {
		  $temp='';
		  for($i=1;$i<=100-strlen($user_name);$i++)
			  $temp=$temp.'&nbsp;';
		  $user_name=trim($user_name).$temp;
	  }
	   if(strlen($ans_material)<180)
	  {
		  $temp='';
		  for($i=1;$i<=180-strlen($ans_material);$i++)
			  $temp=$temp.'&nbsp;';
		  $ans_material=trim($ans_material).$temp;
	  }
	  $url=geturl();
	   //echo $url;
	   echo "<table border='0' bordercolor='maroon' align='center' height='5%' width='50%'>
     	<tr bgcolor='white'>
		<td id='qfont'>$user_name</td>
        <td></td>		
        </tr>	
	   <tr bgcolor='yellow'>
		 <td id='qfont'>$ans_material</td>
		  <td align='right'><a href='http://127.0.0.1/Nist_forum/like.php?url=$url&answer_id=$answer_id'>LIKES=$like_user_id<img src='http://127.0.0.1/Nist_forum/images/thumbs.png' height='50' width='50'/></a></td>		
     	</tr>		   	
  </table>";	  
	}
  }     
?>
<!------------------>

	
