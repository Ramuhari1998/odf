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
	function generateunique()
	{
	    $sql="select date_format(CURRENT_TIMESTAMP,'%d%m%Y%H%i%s')";
	    $data=executequery($sql)	;
	    if($rec=mysqli_fetch_row($data))
	    {
		    return $rec[0];
	     }
	}	
?>

 <?php 
  if(isset($_POST['send']))
  {
	   $data=executequery("select count(*) from chat");
				       if($rec=mysqli_fetch_row($data))
					  {
							$cnt=intval($rec[0])+1;
					  }
	  $chat_id='chat'.$cnt;
      echo $chat_id,'<br>';	  
      session_start();		
			 //echo $_SESSION['logged_user'];
	  $chat_sender_id=$_SESSION['logged_user'];
	  echo $chat_sender_id,'<br>';
	  $chat_receiver_id=$_POST['user_name'];
	  echo $chat_receiver_id,'<br>';
	   $chat_material=$_POST['material'];
	  echo $chat_material,'<br>';
	  $sql = "insert into chat values('$chat_id','$chat_sender_id','$chat_receiver_id','$chat_material',now())";	        
	   echo $sql,'<br>';
	   $res=executenonquery($sql);
        if($res)
		{
		  // echo "message sent successfully,wait for a while ....";
		  header('location:http://127.0.0.1/Nist_forum/list_message.php');	       
		} 
	  else
		  {
		  echo "message not sent";
		 // header('location:http://127.0.0.1/Nist_forum/signup.php');
		} 
	 
  }
 ?>