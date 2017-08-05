<?php 
require_once '../include.php';
if(!isLogin()){
	$mes = '跳转至主页';
	$url = '../index.php';
	alertMes($mes,$url);
}
$userinfo=getUserInfo($_SESSION['uID']);
$LearnRecordTitle="学习&middot;记录";

@$LearnRecords = getLearnRecord();

function JudgeScore($score){
	if($score<60){
		echo 'class="text-danger"';
	}elseif($score>90){
		echo 'class="text-success"';
	}
}

?>
<!DOCTYPE html>
<html lang="zh_cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $LearnRecordTitle; ?></title>

	<!-- Bootstrap -->

	<?php
	include("../same/headlink.html");
	?>
	<link rel="stylesheet" href="../css/yunyou-input-group.css">

	<link rel="stylesheet" href="../css/timelinestyle.css"> <!-- Resource style -->
	<script src="../js/modernizr.js"></script> <!-- Modernizr -->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

	<script>
		function ready(){
			document.getElementById("user").classList.add('active');
		}
	</script>
</head>
<body onLoad="ready()">

	<?php
	include("../same/navbar.html");
	?>

	<div class="container-fluid">
		<div class="row">
			<div class="text-center col-md-12">
				<h1 id="usercenter" class="text-center"><?php echo $LearnRecordTitle; ?></h1>
			</div>
		</div>
		<hr>
	</div>

	<div class="container">

	<canvas id="myChart" width="400" height="400"></canvas>

		<div class="panel panel-default">
		  <!-- Default panel contents -->
		  <div class="panel-heading" style="font-size: large;background-color: rgba(0,0,0,0.8);color:#fff;">临摹记录</div>
<!-- 		  <div class="panel-body">
		    <p>...</p>
		  </div> -->
		<table class="table" style="font-family: Microsoft YaHei;color:#000;font-size: medium;">
		<?php if($LearnRecords): ?>
		<thead>
			<tr>
				<th>临摹字</th>
				<th>字体</th>
				<th>得分</th>
				<th>时间</th>
			</tr>
		</thead>
		  <?php foreach ($LearnRecords as $LearnRecord) :?>
			<tr>
				<td style="font-family: <?php echo $LearnRecord['fontfamily']; ?>"><?php echo $LearnRecord['tsCharacter']; ?></td>
				<td style="font-family: <?php echo $LearnRecord['fontfamily']; ?>"><?php echo $LearnRecord['fontfamily']; ?></td>
				<td <?php JudgeScore($LearnRecord['tsScore']);?> style="font-weight: bold;"><?php echo $LearnRecord['tsScore']; ?></td>
				<td><?php echo $LearnRecord['tsTime']; ?></td>
			</tr>
		  <?php endforeach;?>
		<?php else:?>
			<tr>
				<th colspan="4">
					暂时还没有临摹记录哦！
				</th>
			</tr>
		<?php endif;?>
		</table>
		</div>
	</div>
	<script src="../js/jquery-2.1.4.js"></script>
	<script src="../js/jquery.mobile.custom.min.js"></script>
	<script src="../js/main.js"></script> <!-- Resource jQuery -->

		<script>
		var ctx = document.getElementById("myChart");
		var charLabels = [
		<?php foreach ($LearnRecords as $LearnRecord) :?>
			<?php echo '"'.$LearnRecord['tsCharacter'].'",'; ?>
		<?php endforeach;?>
		""];
		var charScore = [
		<?php foreach ($LearnRecords as $LearnRecord) :?>
			<?php echo '"'.$LearnRecord['tsScore'].'",'; ?>
		<?php endforeach;?>
		""];
		var myChart = new Chart(ctx, {
		    type: 'line',
		    data: {
		        labels: charLabels,
		        datasets: [{
		            label: '学习记录',
		            data: charScore,
		            backgroundColor: [
		                'rgba(22, 11, 5, 0.3)'
		            ],
		            borderColor: [
		                'rgba(22,11,5,1)'
		            ],
		            borderWidth: 1
		        }]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		        }
		    }
		});
		</script>

	<?php
	include("../same/footer.html");
	?>


</body>
</html>
