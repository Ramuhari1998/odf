<?php
session_start();
$con=mysqli_connect('localhost','root','','dforum');
$uid=$_SESSION['UID'];
$time=time()+10;
$res=mysqli_query($con,"update ostatususer set last_login=$time where id=$uid");
?>