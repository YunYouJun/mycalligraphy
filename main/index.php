<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>书法·艺术</title>

<?php
  include("../same/headlink.html");
  ?>
</head>
<body onLoad="ready()">

  <?php
	include("../same/navbar.html");
	?>


<!--标题-->
<div class="container">
  <div class="row">
    <div class="text-center col-md-12">
      <h1 class="text-center">书法&middot;艺术</h1>
    </div>
  </div>
  <hr>

<div class="col-md-10 col-md-offset-1">
<div id="carousel-example-generic" class="carousel slide yunyou-bgblur" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="../img/carousel/bg1.jpg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <img src="../img/carousel/bg1.jpg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <img src="../img/carousel/bg1.jpg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</div>

  <?php
	include("../same/footer.html");
	?>

</body>
</html>

<script type="text/javascript">
var $j = jQuery.noConflict(); 
$j(document).ready(function(){
  document.getElementById("index").classList.add('active');
});

</script>

