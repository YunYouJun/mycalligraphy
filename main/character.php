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


<script>
function ready(){
document.getElementById("character").classList.add('active');
}
</script>
</head>
<body onLoad="ready()">

  <?php
	include("../same/navbar.html");
	?>

<!--标题-->
<div class="container">
  <div class="row">
    <div class="text-center col-md-12">
      <h1 >汉字&middot;检索</h1>
    </div>

  <div class="row">
      <div class="text-center col-md-12">
          <div class="text-center col-md-12"><h3 style="margin-top: 0px;margin-bottom: 0px;"> 汉字热搜榜 </h3></div>

  <div class="row">
    <div class="text-center col-md-12">
  <hr width="90%">
  </div>
  </div>

       <form class="form-inline" role="search" action="singlecharacter.php">
        <div class="form-group">
          <input type="text" class="form-control yunyou-input" placeholder="搜索拼音" name="pinyin">
        </div>
        <div class="form-group">
          <input type="text" class="form-control yunyou-input" placeholder="搜索文字" name="wenzi">
        </div>
        <div class="form-group">
        <select class="form-control yunyou-input" id="profession">
                <option value="">书法类型</option>
                <option>行楷</option>
                <option>草书</option>
                <option>行书</option>
              </select>
              </div>
        <div class="form-group">
        <button type="submit" class="btn btn-inverse btn-block"><span class="glyphicon glyphicon-search"></span></button>
        </div>
        
      </form>
      
      </div>

    <hr>
  </div>
  </div>
  <hr>

</div>

<div class="container" id="main">
<div class="container">
  <div class="row">
    <div class="text-center col-md-12">
<hr>
        <!-- 轮播 -->
         <div class="col-md-4" id="carousel">
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
              <a href="singlecharacter.php">
              <img src="../img/carousel/bg1.jpg" alt="...">
              <div class="carousel-caption">
                <h3>云游君</h3>
                <p>惊天浪淘杀</p>
              </div>
              </a>
            </div>
            <div class="item">
              <img src="../img/carousel/bg2.jpg" alt="...">
              <div class="carousel-caption">
                <h3>流影电光闪</h3>
                <p>天羽屠龙舞</p>
              </div>
            </div>
            <div class="item">
              <img src="../img/carousel/bg3.jpg" alt="...">
              <div class="carousel-caption">
                <h3>泰山陨石坠</h3>
                <p>月色血风暴</p>
              </div>
            </div>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        </div>

         <div class="col-md-4" id="carousel2">
        <div id="carousel2-example-generic" class="carousel slide yunyou-bgblur" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel2-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel2-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel2-example-generic" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="../img/carousel/bg1.jpg" alt="...">
              <div class="carousel-caption">
                <h3>云游君</h3>
                <p>惊天浪淘杀</p>
              </div>
            </div>
            <div class="item">
              <img src="../img/carousel/bg2.jpg" alt="...">
              <div class="carousel-caption">
                <h3>流影电光闪</h3>
                <p>天羽屠龙舞</p>
              </div>
            </div>
            <div class="item">
              <img src="../img/carousel/bg3.jpg" alt="...">
              <div class="carousel-caption">
                <h3>泰山陨石坠</h3>
                <p>月色血风暴</p>
              </div>
            </div>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel2-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel2-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        </div>

         <div class="col-md-4" id="carousel3">
        <div id="carousel3-example-generic" class="carousel slide yunyou-bgblur" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel3-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel3-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel3-example-generic" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="../img/carousel/bg1.jpg" alt="...">
              <div class="carousel-caption">
                <h3>云游君</h3>
                <p>惊天浪淘杀</p>
              </div>
            </div>
            <div class="item">
              <img src="../img/carousel/bg2.jpg" alt="...">
              <div class="carousel-caption">
                <h3>流影电光闪</h3>
                <p>天羽屠龙舞</p>
              </div>
            </div>
            <div class="item">
              <img src="../img/carousel/bg3.jpg" alt="...">
              <div class="carousel-caption">
                <h3>泰山陨石坠</h3>
                <p>月色血风暴</p>
              </div>
            </div>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel3-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel3-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        </div>
</div>
</div>
</div>




  <div class="row">
    <div class="text-center col-md-12">
  <hr style="padding-bottom: 0px;margin-bottom: 5px;opacity: 0.1;">
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

  <?php
  include("../same/footer.html");
  ?>


</body>
</html>
