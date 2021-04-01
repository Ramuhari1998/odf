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
			// setcookie('logged_user','null');	
			session_start();
			$sq = "select user_name from user where user_id='".$_SESSION['logged_user']."'";			
			$_SESSION['logged_user']='';
			$dat=executequery($sq);
			if($re=mysqli_fetch_row($dat))
			{
					$uname=$re[0];
			}
			  $sql = "delete from chats where uname='".$uname."'";	
                  //echo $sql;		  
			  $res=executenonquery($sql);
			  $con = mysqli_connect('localhost','root','');
	            mysqli_select_db($con,'dforum');
	
			$res=mysqli_query($con,"update ostatususer set status=0 where id=".$_SESSION['UID']);
			
			//$_SESSION['UID']='';
			unset($_SESSION['UID']);
			header('location:http://127.0.0.1/Nist_forum/login.php');
			//die();
?>