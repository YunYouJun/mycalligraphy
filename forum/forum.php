<?php 
require_once '../include.php';
$pageSize=5;
$page=isset($_REQUEST['page'])?(int)$_REQUEST['page']:1;
$rows=getPostByPage($page,$pageSize);
if(!$rows){
	alertMes("目前还没有帖子!","forum.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="zh_cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>汉字检索</title>

	<!-- Bootstrap -->

	<?php
	include "../same/headlink.html";
	?>
	<link rel="stylesheet" href="../css/yunyou-input-group.css">

	<link rel="stylesheet" href="../css/picstyle.css" media="screen" type="text/css" />
	<script>
		function ready(){
			document.getElementById("forum").classList.add('active');
		}
	</script>
	<style type="text/css">
		a,a:hover{
			color: #ccf;
		}
	</style>
</head>
<body onLoad="ready()" data-spy="scroll" data-target="#navbar-user" data-offset="100" >

	<?php
	include "../same/navbar.html";
	?>

	<div class="container-fluid">
		<div class="row">
			<div class="text-center col-md-12">
				<h1 id="usercenter" class="text-center">书法&middot;论坛</h1>
			</div>
		</div>
		<hr>
	</div>
	<div class="container">
		<div class="col-md-12 yunyou-background yunyou-bgblur yunyou-panel">
		<?php  foreach($rows as $row):?>
			<div class="col-md-12 yunyou-background yunyou-bgblur yunyou-panel" id="mypost" style="font-family: Microsoft YaHei;">
				<div class="col-md-7">
					<div class="media">
						<a class="media-left portrait" href="javascript:;" data-toggle="modal" data-target=".modalpic">
							<img class="pic" src="../img/character/142(20,109,925,1025).jpg" alt="..." style="max-width: 70px;max-height: 70px;">
						</a>
						<div class="media-body">
							<a href="post.php?pID=<?php echo $row['pID'] ?>"><h4 class="media-heading">&nbsp;<?php echo $row['pTitle'] ?></h4></a>
							<div>&nbsp;<?php echo $row['pContent'] ?></div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<span class="glyphicon glyphicon-user"></span>&nbsp;发帖人：<?php echo $row['uID'] ?><br>
					<span class="glyphicon glyphicon-time"></span>&nbsp;发帖时间：<?php echo $row['pDate'] ?>
				</div>
				<div class="col-md-2">
					<span class="glyphicon glyphicon-signal"></span>&nbsp;点击量：<?php echo $row['brCount'] ?><br>
					<span class="glyphicon glyphicon-comment"></span>&nbsp;回复数：<?php echo $row['reCount'] ?>
				</div>
			</div>
		<?php endforeach;?>
			<div class="row">
				<div class="text-center col-md-12">
					<nav >
						<ul class="pagination" style="margin:0px;font-family: Microsoft YaHei;">
							<?php if($totalRows>$pageSize):?>
								<?php echo showPage($page, $totalPage);?>
							<?php endif;?>
						</ul>
					</nav>

				</div>
			</div>
		</div>
	</div>

	<?php
	include "../same/footer.html";
	?>
	<div class="carrousel "> <span class="close entypo-cancel glyphicon glyphicon-remove"></span>
		<div class="wrapper"> <img src="img/" alt="BINGOO" /> </div>
	</div>
	<script src='../js/pic/picjquery.js'></script>
	<script src="../js/pic/picindex.js"></script>
</body>
</html>
