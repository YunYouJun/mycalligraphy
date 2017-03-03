<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>排行榜</title>

<!-- Bootstrap -->

<?php
  include("headlink.html");
  ?>


<script>
function ready(){
document.getElementById("mylearn").classList.add('active');
}
</script>
</head>
<body onLoad="ready()">

  <?php
	include("navbar.html");
	?>

<!--标题-->
<div class="container-fluid">
  <div class="row">
    <div class="text-center col-md-12">
      <h1 >排行榜</h1>
    </div>
  </div>
  <hr>
</div>

<div class="container" id="main">
<div class="container">
<!--  <div class="row col-md-12">
    <div style="background: #fff;height: 50px;" class="col-md-6"></div>
    <div style="background: #000;height: 50px;" class="col-md-6"></div>
  </div>   -->
<ul class="list-group yunyou-input yunyou-bgblur">
   
   <li class="list-group-item yunyou-input">      
      第一<span class="badge">一</span>
   </li>
   <li class="list-group-item yunyou-input">第二<span class="badge">二</span></li>
   <li class="list-group-item yunyou-input">      
      第三<span class="badge">三</span>
   </li>
</ul>


<ul class="list-group yunyou-input yunyou-bgblur">
   <li class="list-group-item yunyou-input">      
      排名<span class="badge">4</span>
   </li>
   <li class="list-group-item yunyou-input">排名<span class="badge">5</span></li>
   <li class="list-group-item yunyou-input">  
      排名<span class="badge">6</span>
   </li>
</ul>

</div>
</div>

  <?php
  include("footer.html");
  ?>


</body>
</html>
