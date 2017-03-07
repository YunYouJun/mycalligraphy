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
<link rel="stylesheet" href="css/yunyou-input-group.css">

	<link rel="stylesheet" href="css/timelinestyle.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->

<script>
function ready(){
document.getElementById("user").classList.add('active');
}
</script>
<style type="text/css">
	ol, ul {
	list-style: none;
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
      <h1 id="usercenter" class="text-center">学习&middot;记录</h1>
    </div>
  </div>
  <hr>
</div>

<div class="container">
	<div class="col-md-12 yunyou-bgblur yunyou-background">
<section class="cd-horizontal-timeline" style="font-family: '微软雅黑';color: #fff;font-weight: bolder;">
	<div class="timeline">
		<div class="events-wrapper ">
			<div class="events  yunyou-bgblur">
				<ol>
					<li><a href="#0" data-date="16/01/2016">2016年1月16日</a></li>
					<li><a href="#0" data-date="28/02/2016">2月28日</a></li>
					<li><a href="#0" data-date="20/04/2016">4月20日</a></li>
					<li><a href="#0" data-date="20/05/2016">5月20日</a></li>
					<li><a href="#0" data-date="09/07/2016">7月09日</a></li>
					<li><a href="#0" data-date="30/08/2016">8月30日</a></li>
					<li><a href="#0" data-date="15/09/2016">9月15日</a></li>
					<li><a href="#0" data-date="01/11/2016">11月01日</a></li>
					<li><a href="#0" data-date="10/12/2016" class="selected">12月10日</a></li>
				</ol>

				<span class="filling-line" aria-hidden="true"></span>
			</div> <!-- .events -->
		</div> <!-- .events-wrapper -->
			
		<ul class="cd-timeline-navigation">
			<li><a href="#0" class="prev inactive">Prev</a></li>
			<li><a href="#0" class="next">Next</a></li>
		</ul> <!-- .cd-timeline-navigation -->
	</div> <!-- .timeline -->

	<div class="events-content">
		<ol>
			<li class="selected" data-date="16/01/2016">
				<em>2016年</em>
				<em>1月16日</em>
				<p>	
					本次共学习了 2 篇书法作品，共 6 个书法字 
				</p>
			</li>

			<li data-date="28/02/2016">
			<em>2016年</em>
				<em>2月28日</em>
				<p>	
					本次共学习了 2 篇书法作品，共 6 个书法字 
				</p>
			</li>

			<li data-date="20/04/2016">
			<em>2016年</em>
				<em>4月20日</em>
				<p>	
					本次共学习了 2 篇书法作品，共 6 个书法字 
				</p>
			</li>

			<li data-date="20/05/2016">
			<em>2016年</em>
				<em>5月20日</em>
				<p>	
					本次共学习了 2 篇书法作品，共 6 个书法字 
				</p>
			</li>

			<li data-date="09/07/2016">
			<em>2016年</em>
				<em>7月09日</em>
				<p>	
					本次共学习了 2 篇书法作品，共 6 个书法字 
				</p>
			</li>

			<li data-date="30/08/2016">
			<em>2016年</em>
				<em>8月30日</em>
				<p>	
					本次共学习了 2 篇书法作品，共 6 个书法字 
				</p>
			</li>

			<li data-date="15/09/2016">
			<em>2016年</em>
				<em>9月15日</em>
				<p>	
					本次共学习了 2 篇书法作品，共 6 个书法字 
				</p>
			</li>

			<li data-date="01/11/2016">
			<em>2016年</em>
				<em>11月01日</em>
				<p>	
					本次共学习了 2 篇书法作品，共 6 个书法字 
				</p>
			</li>

			<li data-date="10/12/2016">
			<em>2016年</em>
				<em>12月10日</em>
				<p>	
					本次共学习了 2 篇书法作品，共 6 个书法字 
				</p>
			<div class="media">
			  <a class="media-left" href="#">
			    <img src="img/logo.png" alt="...">
			  </a>
			  <div class="media-body">
			    <h4 class="media-heading">头</h4>
			    ...
			  </div>
			</div>

			</li>
		</ol>
	</div> <!-- .events-content -->
</section>
	</div>
</div>
<script src="js/jquery-2.1.4.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->

  <?php
	include("../same/footer.html");
	?>


</body>
</html>
