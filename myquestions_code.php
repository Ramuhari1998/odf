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
  if(isset($_POST['Post']))
  {
	   $data=executequery("select count(*) from question");
				       if($rec=mysqli_fetch_row($data))
					  {
							$cnt=intval($rec[0])+1;
					  }
	  $question_id='quen'.$cnt;
      echo $question_id,'<br>';	  
	  $topic_id=$_POST['topic_id'];
	  echo $topic_id,'<br>';
	 $subt_id=$_POST['subt_id'];
	  echo $subt_id,'<br>';	  
	  $material=$_POST['material'];
	  echo $material,'<br>';
	  session_start();
       $que_setter_id=$_SESSION['logged_user'];
	  echo $que_setter_id,'<br>';	 
	 $sql = "insert into question values('$question_id','$subt_id','$material','sub','$que_setter_id','not approved',now(),0)";	        
	   echo $sql,'<br>';
	   $res=executenonquery($sql);
        if($res)
		{
		  //echo "question saved successfully";
		 header('location:http://127.0.0.1/Nist_forum/forum.php');
		} 
	  else
		  {
		  echo "question not saved successfully ";
		  //header('location:http://127.0.0.1/Nist_forum/signup.php');
		}  				  
  }     
?>