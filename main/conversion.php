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

<link rel="stylesheet" href="../css/yunyou-input-group.css">


<script>
function ready(){
document.getElementById("conversion").classList.add('active');
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
      <h1 >书法&middot;转换</h1>
    </div>
  </div>
  <hr>
</div>

<div class="container" id="main" >
<form id="font-form" method="POST" class="">
<div class="container" >
  <div class="row">
      <div class="yunyou-background yunyou-bgblur col-md-12 yunyou-panel" style="font-size: large;">
          <div class="form-group form-inline col-md-12">
            <div class="input-group yunyou-bgblur col-md-offset-3 col-md-5">
              <div class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span>&nbsp;汉字</div>
              <input type="text" class="form-control" id="yourtext" placeholder="输入想要转换的内容" style="background: rgba(0,0,0,0.3);">
            </div>
            <div class="input-group col-md-1 text-center"><button type="submit" class="btn btn-inverse yunyou-bgblur">确定</button></div>
          </div>

        <div class="col-md-12">
          <div class="row ">

            <div class="col-md-3 text-center" style="padding: 0">
            <div class="form-group" style="margin: 0">
            <label for="FontInfoId" style="display: block;margin: 0;" class="yunyou-input yunyou-block">字体</label>
              <select id="FontInfoId" name="FontInfoId" class="form-control">
                <option value="0">请选择想要转换的字体</option>
                <option value="344">毛笔艺术字体</option>
                <option value="344">云游艺术字体</option>
              </select>
            </div>
            </div>

            <div class="col-md-1 text-center yunyou-block">大小</div>
            <div class="col-md-1 text-center yunyou-block">宽度</div>
            <div class="col-md-1 text-center yunyou-block">高度</div>  
            <div class="col-md-3 text-center yunyou-block">背景颜色</div>
            <div class="col-md-3 text-center yunyou-block">字体颜色</div>     
          </div>
          <div class="row" >

            <div class="col-md-3 text-center yunyou-block" style="padding: 0;">
              <div>
              <select id="FontInfoId" name="FontInfoId" class="form-control">
                <option value="0">请选择想要转换的字体</option>
                <option value="344">毛笔艺术字体</option>
                <option value="344">云游艺术字体</option>
              </select>
              </div>
            </div>
            <div class="col-md-1 text-center yunyou-block" style="padding: 0;font-family: '微软雅黑';">
            <input type="number" id="FontSize" name="FontSize" value="42" class="form-control" min="0">
            </div>
            <div class="col-md-1 text-center yunyou-block" style="padding: 0;font-family: '微软雅黑';">
            <input type="number" id="ImageWidth" name="ImageWidth" value="570" class="form-control" min="0">
            </div>
            <div class="col-md-1 text-center yunyou-block" style="padding: 0;font-family: '微软雅黑';">
            <input type="number" id="ImageHeight" name="ImageHeight" value="120" class="form-control" min="0">
            </div>   
            <div class="col-md-3 text-center yunyou-block" style="padding: 0;font-family: '微软雅黑';">
              <div class="input-group">
              <input type="color" id="ImageBgColor" name="ImageBgColor" value="#FFFFFF" class="form-control">
              <span id="btnSelImageBgColor" class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
              </div>
            </div>
            <div class="col-md-3 text-center yunyou-block" style="padding: 0;font-family: '微软雅黑';">
              <div class="input-group">
              <input type="color" id="FontColor" name="FontColor" value="#000000" class="form-control">
              <span id="btnFontColor" class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
              </div>
            </div>
          </div>
          <div class="row">
          <hr>
            <div id="generateimage" class="col-md-12 text-center yunyou-background"><h4>生成图片</h4></div>
            <div class="col-md-12 text-center yunyou-block" id="newimg">
                    <canvas  id="cavasimg" class="yunyou-bgblur">
                    浏览器不兼容canvas
                    </canvas> 
<script type="text/javascript">
var canvas = document.getElementById("cavasimg");   
        canvas.width = $('#generateimage').width();   
        canvas.height = 120;   
        var context = canvas.getContext("2d");   
        var img = new Image();   
        img.src = "../img/conversion/example.png";   
        img.onload = function(){   
            context.drawImage(img,0,0);   
        }    
</script>

            </div>
          </div>
        </div>
<div class="row">                                 
        <div class="col-md-12  text-center " style="padding: 10px;">
        <button id="btnOnline" class="btn btn-inverse" type="submit">
            <i class="glyphicon glyphicon-refresh"></i>开始转换
        </button>
        <button id="btnDownload" class="btn btn-inverse" type="button" onclick="Download()">
            <i class="glyphicon glyphicon-save"></i>保存图片
        </button>
        </div>
</div>

        

      </div>
  </div>
</div>

</form>
</div>

  <?php
  include("../same/footer.html");
  ?>


</body>
</html>
<!--百度分享-->
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":["mshare","qzone","tsina","bdysc","weixin","renren","tqq","tieba","douban","bdhome","sqq","youdao","mail","copy","print"],"bdPic":"","bdStyle":"0","bdSize":"16"},"slide":{"type":"slide","bdImg":"5","bdPos":"right","bdTop":"103.5"},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>

<script type="text/javascript">
function Download(){
        //cavas 保存图片到本地  js 实现
        //------------------------------------------------------------------------
        //1.确定图片的类型  获取到的图片格式 data:image/Png;base64,...... 
        var type ='png';//你想要什么图片格式 就选什么吧
        var d=document.getElementById("cavasimg");
        var imgdata=d.toDataURL(type);
        //2.0 将mime-type改为image/octet-stream,强制让浏览器下载
        var fixtype=function(type){
            type=type.toLocaleLowerCase().replace(/jpg/i,'jpeg');
            var r=type.match(/png|jpeg|bmp|gif/)[0];
            return 'image/'+r;
        };
        imgdata=imgdata.replace(fixtype(type),'image/octet-stream');
        //3.0 将图片保存到本地
        var savaFile=function(data,filename)
        {
            var save_link=document.createElementNS('http://www.w3.org/1999/xhtml', 'a');
            save_link.href=data;
            save_link.download=filename;
            var event=document.createEvent('MouseEvents');
            event.initMouseEvent('click',true,false,window,0,0,0,0,0,false,false,false,false,0,null);
            save_link.dispatchEvent(event);
        };
        var filename='书法转换字'+'.'+type;  
        savaFile(imgdata,filename);
        };
</script>
