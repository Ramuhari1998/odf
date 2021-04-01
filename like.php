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
 $url=$_REQUEST['url'];
 $answer_id=$_REQUEST['answer_id'];
 //echo $url,'<br>';
 //echo $answer_id,'<br>';
 
 
	 $res=executequery("update answer set like_user_id=like_user_id+1 where answer_id='$answer_id'");	        
	//echo $res,'<br>';
    header('location:'.$url);
 ?>