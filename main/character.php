<?php 
require_once '../include.php';
$pageSize=9;
$page=isset($_REQUEST['page'])?(int)$_REQUEST['page']:1;
$characters=getCharacterByPage($page,$pageSize);
?>
<!DOCTYPE html>
<html lang="zh_cn">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>单字·检索</title>

  <!-- Bootstrap -->

  <?php
  include("../same/headlink.html");
  ?>
  <style type="text/css">
    .carousel-caption{
      color: #000;
    }
  </style>

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
        <h1 >单字&middot;检索</h1>
      </div>

      <div class="row">
        <div class="text-center col-md-12">
          <div class="text-center col-md-12"><h3 style="margin-top: 0px;margin-bottom: 0px;"> 汉字热搜榜 </h3></div>

          <div class="row">
            <div class="text-center col-md-12">
              <hr width="90%">
            </div>
          </div>

          <form class="form-inline" role="search" action="singlecharacter.php" method="get">
            <div class="form-group">
              <input type="text" class="form-control yunyou-input" placeholder="搜索文字" name="keyword" required="" maxlength="1">
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
          <?php for ($i=0; $i < 3 ; $i++) { ?>
          <div class="col-md-4" id="carousel<?php echo $i;?>">
            <div id="carousel<?php echo $i;?>-example-generic" class="carousel slide yunyou-bgblur" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <a href="singlecharacter.php?keyword=<?php echo $characters[$i*3+0]['label']; ?>">
                    <embed class="yunyou-bgblur" src="<?php echo $characters[$i*3+0]['address']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="170" height="170">
                      <div class="carousel-caption">
<!--                 <h3>流影电光闪</h3>
  <p>天羽屠龙舞</p> -->
</div>
</a>
</div>
<div class="item">
  <a href="singlecharacter.php?keyword=<?php echo $characters[$i*3+1]['label']; ?>">
    <embed class="yunyou-bgblur" src="<?php echo $characters[$i*3+1]['address']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="170" height="170">
      <div class="carousel-caption">
<!--                 <h3>流影电光闪</h3>
  <p>天羽屠龙舞</p> -->
</div>
</a>
</div>
<div class="item">
  <a href="singlecharacter.php?keyword=<?php echo $characters[$i*3+2]['label']; ?>">
    <embed class="yunyou-bgblur" src="<?php echo $characters[$i*3+2]['address']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="170" height="170">
      <div class="carousel-caption">
<!--                 <h3>流影电光闪</h3>
  <p>天羽屠龙舞</p> -->
</div>
</a>
</div>
</div>

<!-- Controls -->
<a class="left carousel-control" href="#carousel<?php echo $i;?>-example-generic" role="button" data-slide="prev">
  <span class="glyphicon glyphicon-chevron-left"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#carousel<?php echo $i;?>-example-generic" role="button" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right"></span>
  <span class="sr-only">Next</span>
</a>
</div>
</div>
<?php  
} ?>

</div>
</div>
</div>




<div class="row">
  <div class="text-center col-md-12">
    <hr style="padding-bottom: 0px;margin-bottom: 5px;opacity: 0.1;">
  </div>
</div>

<div class="row" style="margin: 10px;">
<div class="col-md-2 col-md-offset-5">
  <div class="input-group" >
    <input type="number"  name="mypage" id="nowPage" class="form-control yunyou-input" style="font-family: Microsoft YaHei;" placeholder="跳转页码">
    <span class="input-group-btn">
      <button class="btn btn-inverse btn-block" type="button">跳转</button>
    </span>
  </div>
</div>
</div>

<div class="row">
  <div class="text-center col-md-12">
    <nav aria-label="Page navigation">
      <ul class="pagination" style="margin:0px;font-family: Microsoft YaHei;">
        <li>
          <a href="character.php?page=1" aria-label="Previous">
            <span aria-hidden="true"><span class='glyphicon glyphicon-backward'></span></span>
          </a>
        </li>
        <li>
          <a href="character.php?page=<?php echo $page-1; ?>" aria-label="Previous">
            <span aria-hidden="true"><span class='glyphicon glyphicon-step-backward'></span></span>
          </a>
        </li>
        <li><a href="javascript:;"><?php echo $page; ?></a></li>
        <li>
          <a href="character.php?page=<?php echo $page+1; ?>" aria-label="Next">
            <span aria-hidden="true"><span class='glyphicon glyphicon-step-forward'></span></span>
          </a>
        </li>
        <li>
          <a href="character.php?page=<?php echo $totalPage; ?>" aria-label="Next">
            <span aria-hidden="true"><span class='glyphicon glyphicon-forward'></span></span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</div>

</div>

<?php
include("../same/footer.html");
?>
<script type="text/javascript">
  $('#nowPage').val(<?php echo $page;?>);
  $('.carousel').carousel({
    interval: 8000
  })
</script>

</body>
</html>
