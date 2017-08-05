<?php 
require_once '../include.php';
$keyword = $_REQUEST['keyword'];
$characterInfo = getCharacterInfo($keyword);
?>
<!DOCTYPE html>
<html lang="zh_cn">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>汉字·检索</title>

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
  <div class="container-fluid">
    <div class="row">
      <div class="text-center col-md-12">
        <h1 >汉字&middot;检索--<?php echo $characterInfo['label'];?></h1>
      </div>
    </div>
    <hr>
  </div>

  <div class="container" id="main">
    <div class="container">
      <div class="row">
        <div class="yunyou-background yunyou-bgblur col-md-12 yunyou-panel" style="font-size: large;">
          <div class="col-md-2  yunyou-panel" style="font-size:xx-large;">
            <embed class="yunyou-bgblur" src="<?php echo $characterInfo['address']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="170" height="170">
            </div>
            <div class="col-md-10">
<!--               <div class="row yunyou-input" style="color: #ccc;">
                <div class="col-md-1 text-center yunyou-block">读音</div>
                <div class="col-md-1 text-center yunyou-block">繁体</div>
                <div class="col-md-1 text-center yunyou-block">部首</div>
                <div class="col-md-1 text-center yunyou-block">笔画</div>
                <div class="col-md-2 text-center yunyou-block">五笔</div>  
                <div class="col-md-2 text-center yunyou-block">结构</div>
                <div class="col-md-4 text-center yunyou-block">造字法</div>     
              </div>
              <div class="row">
                <div class="col-md-1 text-center yunyou-block">suǒ</div>
                <div class="col-md-1 text-center yunyou-block">所</div>
                <div class="col-md-1 text-center yunyou-block">斤部</div>
                <div class="col-md-1 text-center yunyou-block">8笔</div>
                <div class="col-md-2 text-center yunyou-block">RNRH</div>   
                <div class="col-md-2 text-center yunyou-block">左右结构</div>
                <div class="col-md-4 text-center yunyou-block">形声；右形左声</div>
              </div> -->
              <div class="row">
                <div class="col-md-12 text-center yunyou-background">基本释义</div>
                <p class="col-md-12 yunyou-block">
                  <?php echo $characterInfo['myexp']; ?>
                </p>
                <a style="color: #aaf;" href="http://hanyu.baidu.com/s?wd=<?php echo $keyword; ?>" target="_blank"><p class="text-center">查看更多释义</p></a>
                </div>
              </div>
            </div>
          </div>
<!--  <div class="row col-md-12">
    <div style="background: #fff;height: 50px;" class="col-md-6"></div>
    <div style="background: #000;height: 50px;" class="col-md-6"></div>
  </div>   -->
</div>
</div>

<?php
include("../same/footer.html");
?>


</body>
</html>
