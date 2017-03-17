<!DOCTYPE html>
<html lang="zh-cn">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>部首·检索</title>
  <meta name="Keywords" content="部首检索汉字" />
  <?php
  include("../same/headlink.html");
  ?>
  <link href="bihua.css" rel="stylesheet" type="text/css" />
</head>

<body>
<script>
window.onload=function(){
document.getElementById("character").classList.add('active');
}
</script>
  <?php
  include("../same/navbar.html");
  ?>
  <div class="container-fluid">
    <div class="row">
      <div id="character" class="text-center col-md-12">
        <h1 id="bushou" class="text-center">部首&middot;检索</h1>
      </div>
    </div>
    <hr>
  </div>
  <div class="container">
  <div class="row  yunyou-background yunyou-bgblur" style="padding: 10px;">
      <div id="bd" class="cf">
        <div class="choosecities">
          <div class="citieslist">
            <div class="hasallcity" style="width:98%;">
              <script type="text/javascript" src="bihua.js" charset="utf-8"></script>
              <script type="text/javascript" language="javascript">
                textBuShou = "部首";
                textBiHua = "笔画";
                textHua = "画";
                var str = MakeMainTab();
                document.write(str);
              </script>
            </div>
          </div>
        </div>
      </div>
      <!-- bd end -->
    </div>
  </div>
  <?php
  include("../same/footer.html");
  ?>
</body>

</html>
