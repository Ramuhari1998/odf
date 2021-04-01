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
<?php
      $sq = "select answer_id,like_user_id from answer";
	 $dat=executequery($sq);
     $dataPoints1 = array();	 
	 while($rec=mysqli_fetch_row($dat))
	{
	   $answer_id=$rec[0];	
        $like_user_id=$rec[1];
	   array_push( $dataPoints1,array("label"=>$answer_id, "y"=>$like_user_id));	
	}
	//print_r($arr_id);
	//print_r($arr_like);
	//echo json_encode($arr_id);
   ?>  
<?php
      $sq = "select question_id,view_user_id from question";
	 $dat=executequery($sq);
     $dataPoints2 = array();	 
	 while($rec=mysqli_fetch_row($dat))
	{
	   $question_id=$rec[0];	
        $view_user_id=$rec[1];
	   array_push( $dataPoints2,array("label"=>$question_id, "y"=>$view_user_id));	
	}
  ?>  
<?php
 
$dataPoints = array( 
	array("label"=>"Chrome", "y"=>64.02),
	array("label"=>"Firefox", "y"=>12.55),
	array("label"=>"IE", "y"=>8.47),
	array("label"=>"Safari", "y"=>6.08),
	array("label"=>"Edge", "y"=>4.29),
	array("label"=>"Others", "y"=>4.59)
)
 
?>
<!DOCTYPE HTML>
<html>
<head>

<script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	title: {
		text: "STATISTICS OF ANSWERS"
	},
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
var chart = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	title: {
		text: "STATISTICS OF QUESTIONS"
	},
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer2" style="height: 370px; width: 100%;"></div>
<div id="chartContainer1" style="height: 370px; width: 100%;"></div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>

<?php
    require_once('http://127.0.0.1/Nist_forum/footer.php');
?>