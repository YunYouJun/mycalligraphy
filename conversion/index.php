<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>书法转换</title>

  <!-- Bootstrap -->

  <?php
  include("../same/headlink.html");
  ?>

  <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

  <link rel="stylesheet" href="../css/yunyou-input-group.css">

  <script>
    function ready(){
      document.getElementById("conversion").classList.add('active');
    }
  </script>
  <style type="text/css">
    .form-control{
      border-radius: 0;
      border-right: 1px #000 solid;
      border-bottom: 1px #000 solid;
    }
    .input-group-addon{
      border-radius: 0;
      border-right: 1px #000 solid;
      border-bottom: 1px #000 solid;
    }
    .form-control:disabled{
      background-color: rgba(0,0,0,0.6);
    }
  </style>
</head>
<body onLoad="ready()">

  <?php
  include("../same/navbar.html");
  ?>

  <!--标题-->
  <div class="container-fluid">
    <div class="row">
      <div class="text-center col-md-12">
        <h1 >书法&middot;转换</h1>
      </div>
    </div>
    <hr>
  </div>

  <div class="container" id="main" >
   <!--    <form id="font-form" method="POST" class=""> -->
   <div class="yunyou-background yunyou-bgblur yunyou-panel"  style="font-size: x-large;">
    <div class="form-group form-group-lg form-inline col-md-12">
      <div class="input-group yunyou-bgblur col-md-offset-3 col-md-5 ui">
        <div class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span>&nbsp;汉字</div>
        <input type="text" class="form-control ui-input" id="yourtext" placeholder="输入想要转换的内容" style="background: rgba(0,0,0,0.3);font-size: x-large;">
        <!--             <span class="ui-return">↵</span> -->
      </div>
      <div class="input-group col-md-1 text-center"><button type="submit" class="btn btn-inverse btn-lg yunyou-bgblur" id="sure">确定</button></div>
    </div>

    <div class="col-md-12">
      <div class="col-md-3 text-center" style="padding: 0">
        <div class="form-group" style="margin: 0">
          <label for="FontInfoId" style="display: block;margin: 0;" class="yunyou-input yunyou-block">字体</label>
          <select id="FontInfoId" name="FontInfoId" class="form-control logintext" onchange="changefont();">
            <option value="0">请选择想要转换的字体</option>
            <option value='1' style="font-family: '宋体';">宋体</option>
            <option value='2' style="font-family: 'Microsoft YaHei';">微软雅黑</option>
            <option value='3' style="font-family: '华文行楷';">华文行楷</option>
            <option value='4' style="font-family: '华文隶书';">华文隶书</option>
          </select>
        </div>
      </div>

      <div class="col-md-1 text-center" style="padding: 0;">
        <div class="form-group" style="margin: 0">
          <label for="FontSize" style="display: block;margin: 0;" class="yunyou-input yunyou-block">大小</label>
          <input type="number" id="FontSize" name="FontSize" value="300" class="form-control logintext" min="0" onchange="changesize()">
        </div>
      </div>

      <div class="col-md-1 text-center" style="padding: 0;">
        <div class="form-group" style="margin: 0">
          <label for="ImageWidth" style="display: block;margin: 0;" class="yunyou-input yunyou-block">宽度</label>
          <input type="number" id="ImageWidth" name="ImageWidth" disabled="" class="form-control logintext" min="0" >
        </div>
      </div>

      <div class="col-md-1 text-center" style="padding: 0;">
        <div class="form-group" style="margin: 0">
          <label for="ImageHeight" style="display: block;margin: 0;" class="yunyou-input yunyou-block">高度</label>
          <input type="number" id="ImageHeight" name="ImageHeight" disabled="" class="form-control logintext" min="0" >
        </div>
      </div>

      <div class="col-md-2 text-center" style="padding: 0;">
        <div class="form-group" style="margin: 0">
          <label for="Alpha" style="display: block;margin: 0;" class="yunyou-input yunyou-block">背景透明度</label>
          <input type="number" id="Alpha" name="Alpha" value="0.50" step="0.01" class="form-control logintext" min="0" max="1" onchange="changeBgColor()">
        </div>
      </div>

      <div class="col-md-2 text-center" style="padding: 0;">
        <div class="form-group" style="margin: 0">
          <label for="ImageBgColor" style="display: block;margin: 0;" class="yunyou-input yunyou-block">背景颜色</label>
          <div class="input-group">
            <input type="color" id="ImageBgColor" name="ImageBgColor" value="#FFFFFF" class="form-control" onchange="changeBgColor();">
            <span id="btnSelImageBgColor" class="input-group-addon" onclick="$('#ImageBgColor').click();" style="cursor: pointer;"><i class="glyphicon glyphicon-edit"></i></span>
          </div>
        </div>
      </div>

      <div class="col-md-2 text-center" style="padding: 0;">
        <div class="form-group" style="margin: 0">
          <label for="FontColor" style="display: block;margin: 0;" class="yunyou-input yunyou-block">字体颜色</label>
          <div class="input-group">
            <input type="color" id="FontColor" name="FontColor" value="#000000" class="form-control" onchange="changeFontColor();">
            <span id="btnFontColor" class="input-group-addon" onclick="$('#FontColor').click();" style="cursor: pointer;"><i class="glyphicon glyphicon-edit"></i></span>
          </div>
        </div>

      </div>

      <div id="generateimage">
        <div id="title" class="col-md-12 text-center yunyou-background"><h4>生成图片</h4></div>
        <div class="col-md-12 yunyou-block" id="newimg" style="padding: 10px;">
          <canvas class="canvas" id="mycanvas"></canvas>
        </div>
      </div>

    </div>
    <div class="row">                                 
      <div class="col-md-12  text-center " style="padding: 10px;">
        <button id="btnOnline" class="btn btn-inverse" type="button">
          <i class="glyphicon glyphicon-refresh"></i>开始转换
        </button>
        <a id="btnDownload" class="btn btn-inverse" href="javascript:;">
          <i class="glyphicon glyphicon-save"></i>保存图片
        </a>
        <a href="javascript:;" id="imgdownload">下载图片</a>
        <script type="text/javascript">
          var yourtext = $('#yourtext'); 
          var mycanvas=document.getElementById("mycanvas");
          var imgdownload=document.getElementById("imgdownload");
          imgdownload.onclick=function(){
                this.href = mycanvas.toDataURL();
                this.target = "_blank";
                this.download =yourtext.val() + ".png";
              }
            </script>
          </div>
        </div>

      </div>
      <!--     </form> -->
    </div>

  <script type="text/javascript">
    var fontname = 'Microsoft YaHei,';
    var fontSize = 300;
    var FontColor = {r:255,g:255,b:255};
    function changefont(){
      var fontvalue =parseInt($('#FontInfoId').val());
      switch(fontvalue){
        case 1:
        fontname = '宋体,';break;
        case 2:
        fontname = 'Microsoft YaHei,';break;
        case 3:
        fontname = '华文行楷,';break;
        case 4:
        fontname = '华文隶书,';break;
        default:
        fontname = '';
      }
    }
    function changesize(){
      fontSize = $('#FontSize').val()
      console.log(fontSize);
    }
    function changeBgColor(){
      var mycolor = $('#ImageBgColor').val();
      var r = parseInt(mycolor.substr(1,2),16);
      var g = parseInt(mycolor.substr(3,2),16);
      var b = parseInt(mycolor.substr(5,2),16);
      var a = $('#Alpha').val();
      var BgColor = {r:r,g:g,b:b,a:a};
      console.log(mycolor);
      var myrgb = 'rgba(' + BgColor.r + ',' +  + BgColor.g + ',' + BgColor.b + ',' + BgColor.a + ')';
      $('.canvas').css("background",myrgb);
    }
    function changeFontColor(){
      var mycolor = $('#FontColor').val();
      var r = parseInt(mycolor.substr(1,2),16);
      var g = parseInt(mycolor.substr(3,2),16);
      var b = parseInt(mycolor.substr(5,2),16);
      FontColor = {r:r,g:g,b:b};
      console.log(FontColor);
    }
    function changeCanvasSize(){

    }
    function initCanvasSize(){
      $('#ImageWidth').val($('#title').width());
      $('#ImageHeight').val(window.innerHeight);
    }
    initCanvasSize();

  </script>

  <script src="js/index.js"></script>

  <?php
  include("../same/footer.html");
  ?>

</body>
<script>
  window.onload=function(){
    document.getElementById("application").classList.add('active');
  }
</script>
</html>
<!--百度分享-->
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":["mshare","qzone","tsina","bdysc","weixin","renren","tqq","tieba","douban","bdhome","sqq","youdao","mail","copy","print"],"bdPic":"","bdStyle":"0","bdSize":"16"},"slide":{"type":"slide","bdImg":"5","bdPos":"right","bdTop":"103.5"},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>

