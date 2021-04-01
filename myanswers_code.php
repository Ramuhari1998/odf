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
  session_start(); 
  	   $data=executequery("select count(*) from answer");
				       if($rec=mysqli_fetch_row($data))
					  {
							$cnt=intval($rec[0])+1;
					  }
  $answer_id='ans'.$cnt;
  //echo $answer_id,'<br>';	  
  $user_id=$_SESSION['logged_user'];
  //echo $_SESSION['logged_user'],'<br>';
  $ans_material=$_REQUEST['ans_material'];
  //echo $_REQUEST['ans_material'],'<br>';
  $question_id=$_REQUEST['question_id'];
  //echo $_REQUEST['question_id'],'<br>';
  $sql = "insert into answer values('$answer_id','$user_id','$ans_material','$question_id',now(),0)";	        
	   echo $sql,'<br>';
	   $res=executenonquery($sql);
        if($res)
		{
		  //echo "answer saved successfully";
		   header('location:http://127.0.0.1/Nist_forum/forum.php');
		} 
	  else
		  {
		  echo "answer not saved successfully ";
		  //header('location:http://127.0.0.1/Nist_forum/signup.php');
		}  				  
        	 $res=executequery("update question set view_user_id=view_user_id+1 where question_id='$question_id'");	        

  
?>