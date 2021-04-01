<?php
      error_reporting(E_ALL);
	/*$con = mysqli_connect('localhost','root','');
	mysqli_select_db($con,'dforum');
	$sql = 'select * from topic';
	$data=mysqli_query($con,$sql);
	while($rec=mysqli_fetch_row($data))
	{
		echo $rec[0],'  ',$rec[1],'<br>';
	}
	mysqli_close($con);
	*/
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
      /*echo generateunique();*/	
	/*$data=executequery('select * from topic');
	 while($rec=mysqli_fetch_row($data))
	{
		echo $rec[0],'  ',$rec[1],'<br>';
	}
	*/
	/*$res=executenonquery('delete from user1');
      if($res)
		  echo "deleted successfully";
	  else
		  echo "Not deleted ";
    */	  
?>