<?php
include 'adminbase.php';
include '../connection.php';
$q="SELECT CAST( created_on AS DATE ) , COUNT( * )FROM tbl_users GROUP BY CAST( created_on AS DATE )";





$dataPoints=array();
$qry="SELECT CAST( created_on AS DATE ) , COUNT( * )FROM tbl_users GROUP BY CAST( created_on AS DATE )";
//echo $qry;
$res=mysqli_query($conn,$qry);
while($row=mysqli_fetch_array($res))
{
    array_push($dataPoints, array("label" => $row[0], "y" => $row[1]));
}
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "User statistics"
	},
	axisY: {
		title: "Number of users per day"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## ",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 750px; margin: 50px 10px 10px 100px;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>