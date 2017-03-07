<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>汉字检索</title>

<!-- Bootstrap -->

<?php
  include("../same/headlink.html");
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
	include("../same/navbar.html");
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
	<div class="col-md-12 yunyou-background yunyou-bgblur yunyou-panel">
		<div class="col-md-7">
			<div class="media">
			  <a class="media-left portrait" href="#" data-toggle="modal" data-target=".modalpic">
			    <img class="pic" src="../img/character/142(20,109,925,1025).jpg" alt="..." data-src-wide="img/character/142(20,109,925,1025).jpg" style="max-width: 70px;max-height: 70px;">
			  </a>
			  <div class="media-body">
			    <a href="post.php"><h4 class="media-heading">帖子标题</h4></a>
			    发帖简要内容
			  </div>
			</div>
		</div>
		<div class="col-md-3">
		<span class="glyphicon glyphicon-user"></span>&nbsp;发帖人：云游<br>
		<span class="glyphicon glyphicon-time"></span>&nbsp;发帖时间：2016年12月30日
		</div>
		<div class="col-md-2">
		<span class="glyphicon glyphicon-signal"></span>&nbsp;点击量：666<br>
		<span class="glyphicon glyphicon-comment"></span>&nbsp;回复数：110
		</div>
	</div>
	<div class="row">
	    <div class="text-center col-md-12">
	  <nav >
	  <ul class="pagination" style="margin:0px;">
	    <li><a href="#"><span class="glyphicon glyphicon-fast-backward"></span></a></li>
	    <li><a href="#"><span class="glyphicon glyphicon-step-backward"></span></a></li>
	    <li><a href="#">1</a></li>
	    <li><a href="#">2</a></li>
	    <li><a href="#">3</a></li>
	    <li><a href="#">4</a></li>
	    <li><a href="#">5</a></li>
	    <li><a href="#"><span class="glyphicon glyphicon-step-forward"></span></a></li>
	    <li><a href="#"><span class="glyphicon glyphicon-fast-forward"></span></a></li>
	  </ul>
		</nav>
	    </div>
	 </div>
	</div>
</div>

  <?php
	include("../same/footer.html");
	?>
<div class="carrousel "> <span class="close entypo-cancel glyphicon glyphicon-remove"></span>
  <div class="wrapper"> <img src="img/" alt="BINGOO" /> </div>
</div>
<script src='../js/pic/picjquery.js'></script> 
<script src="../js/pic/picindex.js"></script>
</body>
</html>
