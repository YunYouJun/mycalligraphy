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

  <link href="../css/indexshow.css" type="text/css" rel="stylesheet">
</head>
<body>

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
  </div>

  <div class="container">
    <div class="img-container">
      <a href="../forum/forum.php" title="书法论坛"><img class="pic pic1" src="../img/indexshow/书法论坛.png"></a>
      <a href="../conversion/index.php" title="书法转换"><img class="pic pic2" src="../img/indexshow/书法转换.png"></a>
      <a href="../main/character.php" title="单字检索"><img class="pic pic3" src="../img/indexshow/单字检索.png"></a>
      <a href="../handwriting/index.php" title="汉字书写"><img class="pic pic4" src="../img/indexshow/汉字书写.png"></a>
      <a href="../combination/index.php" title="趣味组合"><img class="pic pic5" src="../img/indexshow/趣味组合.png"></a>
      <a href="../bushou/index.php" title="部首检索"><img class="pic pic6" src="../img/indexshow/部首检索.png"></a>
    </div>
    <!-- 16:9 aspect ratio -->
    <div class="embed-responsive embed-responsive-16by9" id="calligraohy-show">
      <video src="../video/calligraphy-show.mp4" controls=""></video>
    </div>

  </div>

  <?php
  include("../same/footer.html");
  ?>
<script type="text/javascript">
  var windowWidth = $(window).width();
  if( windowWidth < 500 ){
    $('.img-container').css('display','none');
  }else{
    //$('#calligraohy-show').css('display','none');
  }
</script>
</body>
</html>


