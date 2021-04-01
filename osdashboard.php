<?php
session_start();
$con=mysqli_connect('localhost','root','','dforum');
if(!isset($_SESSION['UID'])){
//	header('location:osindex.php');
	//die();
}
$time=time();
$res=mysqli_query($con,"select * from ostatususer");
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex, nofollow">
      <title>User Status Dashboard</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <style type="text/css">
         body {
			
			 height: 100vh;
			 width: 450px;
         }
         .container  {
			 
			 border: 1px solid #9C9C9C;
			 background: linear-gradient(135deg, #71b7e6, #9b59b6);
			 padding:30px;
         }    
		 .container h2{
			margin-bottom:25px;
		 }
		 .text-info {
			color: #000 !important;
		}
      </style>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      
   </head>
   <body>
      <div class="container">
         <h2 class="text-center text-info">User Status Dashboard</h2>
		 <table class="table table-striped table-bordered">
            <thead>
               <tr>
                  <th width="5%">#</th>
                  <th width="80%">Name</th>
                  <th width="15%">Status</th>
               </tr>
            </thead>
            <tbody id="user_grid">
			   <?php 
			   $i=1;
			   while($row=mysqli_fetch_assoc($res)){
			   $status='Offline';
			   $class="btn-danger";
			   if($row['last_login']>$time){
					$status='Online';
					$class="btn-success";
			   }
			   ?>	
               <tr>
                  <th scope="row"><?php echo $i?></th>
                  <td><?php echo $row['name']?></td>
                  <td><button type="button" class="btn <?php echo $class?>"><?php echo $status?></button></td>
               </tr>
			   <?php 
			   $i++;
			   } ?>
            </tbody>
         </table>
      </div>
	  <script>
		function updateUserStatus(){
			jQuery.ajax({
				url:'osupdate_user_status.php',
				success:function(){
					
				}
			});
		}
		
		function getUserStatus(){
			jQuery.ajax({
				url:'osget_user_status.php',
				success:function(result){
					jQuery('#user_grid').html(result);
				}
			});
		}
		
		setInterval(function(){
			updateUserStatus();
		},1000);
		
		setInterval(function(){
			getUserStatus();
		},1000);
	  </script>
   </body>
</html>