<?php
    require_once('http://127.0.0.1/Nist_forum/header.php');    	
?>
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
<style type='text/css'>
  #lufont
  {
	  font-family: "Arial";
	  font-style: bold italic;
	  font-size: 20px;
	  color: rgb(255,255,0);
  }
</style>
 <table align='right'>
		<tr>
			<td align='right' id='lufont'> 
			<?php
			 session_start();		
			 //echo $_SESSION['logged_user'];
			if(($_SESSION['logged_user'])!='')
			{
				echo "User Login As:";
				$sq = "select user_name from user where user_id='".$_SESSION['logged_user']."'";
			    $dat=executequery($sq);
				
				if($re=mysqli_fetch_row($dat))
				{
					echo "<span style='color:skyblue;'>",$re[0],'</span>';
				}	
			}	
               else
					echo "<h1>Pls Login with mailid & password....</h1>";				   
			?>	
			</td>
		</tr>
		<tr>
			<td align='right'>
				<a href='logout.php'><span style='color:#99ff66;'><b>LOGOUT</b></span></a>
			</td>
		</tr>
	</table>
<?php 
if (isset($_POST['submit'])){ 
/* Attempt MySQL server connection. Assuming 
you are running MySQL server with default 
setting (user 'root' with no password) */
$link = mysqli_connect("localhost", 
			"root", "", "dforum"); 

// Check connection 
if($link === false){ 
	die("ERROR: Could not connect. "
		. mysqli_connect_error()); 
} 

// Escape user inputs for security 
$un= mysqli_real_escape_string( 
	$link, $_REQUEST['uname']); 
$m = mysqli_real_escape_string( 
	$link, $_REQUEST['msg']); 
date_default_timezone_set('Asia/Kolkata'); 
$ts=date('y-m-d h:ia'); 

// Attempt insert query execution 
$sql = "INSERT INTO chats (uname, msg, dt) 
		VALUES ('$un', '$m', '$ts')"; 
if(mysqli_query($link, $sql)){ 
	; 
} else{ 
	echo "ERROR: Message not sent!!!"; 
} 
// Close connection 
mysqli_close($link); 
} 
?> 
<html> 
<head> 

 <link rel="stylesheet" href="Group_chat.css" type="text/css" media="screen" />
 </head>
<body onload="show_func()"> 
<div>

      
<div id="container"> 
	<main> 
		<header> 
			<img src="http://127.0.0.1/Nist_forum/images/ico_star.png" alt=""> 
			<div> 
				<h2><b>GROUP CHAT</b></h2> 
			</div> 
			<img src="http://127.0.0.1/Nist_forum/images/ico_star.png" alt=""> 
		</header> 

<script> 
function show_func(){ 

var element = document.getElementById("chathist"); 
	element.scrollTop = element.scrollHeight; 

} 
</script> 

<form id="myform" action="Group_chat.php" method="POST" > 
<div class="inner_div" id="chathist"> 
<?php 
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$db_name = "dforum"; 
$con = new mysqli($host, $user, $pass, $db_name); 

$query = "SELECT * FROM chats"; 
$run = $con->query($query); 
$i=0; 

while($row = $run->fetch_array()) : 
if($i==0){ 
$i=5; 
$first=$row; 
?> 
<div id="triangle1" class="triangle1"></div> 
<div id="message1" class="message1"> 
<span style="color:white;float:right;"> 
<?php echo $row['msg']; ?></span> <br/> 
<div> 
<span style="color:black;float:left; 
font-size:10px;clear:both;"> 
	<b><?php echo $row['uname']; ?></b>, 
		<?php echo $row['dt']; ?> 
</span> 
</div> 
</div> 
<br/><br/> 
<?php 
} 
else
{ 
if($row['uname']!=$first['uname']) 
{ 
?> 
<div id="triangle" class="triangle"></div> 
<div id="message" class="message"> 
<span style="color:white;float:left;"> 
<?php echo $row['msg']; ?> 
</span> <br/> 
<div> 
<span style="color:black;float:right; 
		font-size:10px;clear:both;"> 
<b><?php echo $row['uname']; ?></b>, 
		<?php echo $row['dt']; ?> 
</span> 
</div> 
</div> 
<br/><br/> 
<?php 
} 
else
{ 
?> 
<div id="triangle1" class="triangle1"></div> 
<div id="message1" class="message1"> 
<span style="color:white;float:right;"> 
<?php echo $row['msg']; ?> 
</span> <br/> 
<div> 
<span style="color:black;float:left; 
		font-size:10px;clear:both;"> 
<b><?php echo $row['uname']; ?></b>, 
	<?php echo $row['dt']; ?> 
</span> 
</div> 
</div> 
<br/><br/> 
<?php 
} 
} 
endwhile; 
?> 
</div> 
	<footer> 
		<table> 
		<tr> 
		<th> 
			<input class="input1" type="text"
					id="uname" name="uname"
					value='<?php
					$sq = "select user_name from user where user_id='".$_SESSION['logged_user']."'";
			    $dat=executequery($sq);
				
				if($re=mysqli_fetch_row($dat))
				{
					echo $re[0];
				}?>'> 
		</th> 
		<th> 
			<textarea id="msg" name="msg"
				rows='3' cols='50'
				placeholder="Type your message"> 
			</textarea></th> 
		<th> 
			<b><input class="input2" type="submit"
			id="submit" name="submit" value="send"> </b>
		</th>				 
		</tr> 
		</table>				 
	</footer> 
</form> 
</main>	 
</div> 

<div>
<iframe src="http://127.0.0.1/Nist_forum/osdashboard.php" style="position: absolute;
						top: 40%; border:none;
						left: 900px;height:650px;width:467px;" title="iframe"></iframe></div>
 
</body> 
</html> 
<?php
    require_once('http://127.0.0.1/Nist_forum/footer.php');
 ?>