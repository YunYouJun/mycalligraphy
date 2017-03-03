<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>书法论坛</title>

<!-- Bootstrap -->

<?php
  include("headlink.html");
  ?>
<link rel="stylesheet" href="css/yunyou-input-group.css">

<link rel="stylesheet" href="css/picstyle.css" media="screen" type="text/css" />
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
	include("navbar.html");
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
	<div class="col-md-12 text-center"><h2>本帖主题：</h2></div>
	<div class="col-md-12 yunyou-background yunyou-bgblur yunyou-panel ">
		<div class="col-md-3 yunyou-block">
		<span class="glyphicon glyphicon-user"></span>&nbsp;发帖人：名字好像很长啊<br>
		<span class="glyphicon glyphicon-star"></span>&nbsp;等级：20级<br>
		<span class="glyphicon glyphicon-heart"></span>&nbsp;喜爱：行书<br>
		<span class="glyphicon glyphicon-briefcase"></span>&nbsp;职业：学生
		</div>
		<div class="col-md-9">
			<div class="media  yunyou-block">
			  <a class="media-left portrait" href="#" data-toggle="modal" data-target=".modalpic">
			    <img class="pic" src="img/character/142(20,109,925,1025).jpg" alt="..." data-src-wide="img/character/142(20,109,925,1025).jpg" style="max-width: 70px;max-height: 70px;">
			  </a>
			  <div class="media-body">
			  <p>
			    发帖简要内容
			    对啊，有点像“缸”字左边的部首
			    但是好像它是“鐏”字？
			    
			  </p>
			  </div>
			</div>
			<div align="right">
				<span>1楼</span>&nbsp;<span>2016-11-30 12:37</span>&nbsp;<a href=""><span>删除</span></a>
			</div>

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
<!--tesxtarea-->
<hr>
<div class="col-md-12">
	<form method="POST" action="" name="yourword" role="form" id="yourword">

			<div class="col-md-3 "><span class="glyphicon glyphicon-pencil"></span><span>发表回复：</span></div>
			<div class="col-md-9" align="right">
			<a href="" type="file"><span class="glyphicon glyphicon-picture"></span>&nbsp;添加图片</a>
			</div>

		<br>
		<hr>
		<div class="form-group has-feedback">
			<textarea class="form-control" rows="6" id="message" placeholder="您的回复内容" name="message" required></textarea>
			<i class="glyphicon glyphicon-comment form-control-feedback"></i>
		</div>
		<div class="form-group">
		<button type="submit" value="发&nbsp;&nbsp;&nbsp;表" class="btn btn-block btn-inverse yunyou-bgblur">发&nbsp;&nbsp;&nbsp;表</button>
        </div>
        <input type="hidden" name="MM_insert" value="yourword">
	</form>
</div>
	</div>
</div>

  <?php
	include("footer.html");
	?>
<div class="carrousel "> <span class="close entypo-cancel glyphicon glyphicon-remove"></span>
  <div class="wrapper"> <img src="img/" alt="BINGOO" /> </div>
</div>
<script src='js/pic/picjquery.js'></script> 
<script src="js/pic/picindex.js"></script>
</body>
</html>
