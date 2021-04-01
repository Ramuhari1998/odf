<?php
session_start();
$con=mysqli_connect('localhost','root','','dforum');
$uid='0';
if(isset($_SESSION['UID']))
   $uid=$_SESSION['UID'];
$time=time();
$res=mysqli_query($con,"select * from ostatususer");
$i=1;
$html='';
while($row=mysqli_fetch_assoc($res)){
	//echo '<br>',$row['last_login'],'---',$time,'<br>';
	$status='Offline';
	$class="btn-danger";
	//if($row['last_login']>$time){
		if($row['status']==1){
		$status='Online';
		$class="btn-success";
		//echo '<br>hello ',$row['last_login'],'---',$time,'<br>';
	}
	$html.='<tr>
                  <th scope="row">'.$i.'</th>
                  <td>'.$row['name'].'</td>
                  <td><button type="button" class="btn '.$class.'">'.$status.'</button></td>
               </tr>';
	$i++;
}
echo $html;
?>