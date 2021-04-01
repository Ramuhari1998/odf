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
  if(isset($_POST['sub']))
  {
	  $user_id=generateunique();
	  //echo $user_id,'<br>';
	  $user_name=$_POST['user_name'];
	  //echo $user_name,'<br>';
       $password=md5($_POST['password']);
	  //echo $password,'<br>';
  	  $user_type=$_POST['user_type'];
	  //echo $user_type,'<br>';
  	  $dob=$_POST['dob'];
	  //echo $dob,'<br>';
  	  $email=$_POST['email'];
	  //echo $email,'<br>';
	  $gender=$_POST['gender'];
	  //echo $gender,'<br>';
	   $phone_no=$_POST['phone_no'];
	   //echo $phone_no,'<br>';
	   $country=$_POST['country'];
	  //echo $country,'<br>';
	   $state=$_POST['state'];
	  //echo $state,'<br>';
	   $address=$_POST['address'];
	  //echo $address,'<br>';
	   $photo=explode('.',$_FILES['photo']['name']);	   
	   $photo=$user_id.'.'.$photo[count($photo)-1];
	   $photo_up=$_FILES['photo']['tmp_name'];
	   $path='C:/xampp/htdocs/Nist_forum/upload';
	   move_uploaded_file($photo_up,$path.'/'.$photo);
	   //echo $photo,'<br>';
	   
	   $sql = "insert into user values('$user_id','$user_name','$password','$user_type','$dob','$email','$gender',$phone_no,'$country','$state','$address','$photo','NO')";	        
	   //echo $sql,'<br>';
	   $res=executenonquery($sql);
        if($res)
		{
		  //echo "User Registered successfully";
		  header('location:http://127.0.0.1/Nist_forum/notification.php');
		} 
	  else
		  {
		  //echo "User not Registered ";
		  header('location:http://127.0.0.1/Nist_forum/signup.php');
		} 
		  
  }     
?>
