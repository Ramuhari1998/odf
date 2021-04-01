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
 <?php 
  if(isset($_POST['sub']))
  {
	  $email=$_POST['email'];
	  //echo $email,'<br>';
       $password=md5($_POST['password']);
	 // echo $password,'<br>';
	  
	  $sql = "select count(*) from user where email='$email' and password='$password' and status='YES'";
	  $data=executequery($sql);
	 if($rec=mysqli_fetch_row($data))
	{
		if($rec[0]=='1')
		{
			$sq = "select user_id from user where email='$email' and password='$password' and status='YES'";
			$dat=executequery($sq);
			if($re=mysqli_fetch_row($dat))
			{
			 //setcookie('logged_user',$re[0]);
			 session_start();
			 $_SESSION['logged_user']=$re[0];
			}
			 //echo "success";
			 $sql="select * from ostatususer where id='".$_SESSION['logged_user']."'";
			 $con = mysqli_connect('localhost','root','');
	            mysqli_select_db($con,'dforum');
	
			 $res=mysqli_query($con,$sql);
			$count=mysqli_num_rows($res);
			if($count>0)
			{
				
				$row=mysqli_fetch_assoc($res);
				$_SESSION['UID']=$row['id'];
				$time=time()+10;
				$res=mysqli_query($con,"update ostatususer set status=1 where id=".$_SESSION['UID']);
				//$res=mysqli_query($con,"update ostatususer set last_login=$time where id=".$_SESSION['UID']);
				//header('location:osdashboard.php');
				//die();
			}
			  header('location:http://127.0.0.1/Nist_forum/forum.php');
		}
		 else
			 header('location:http://127.0.0.1/Nist_forum/notify_relog.php');	
	}
  }     
?>
