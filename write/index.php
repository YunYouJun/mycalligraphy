<!DOCTYPE html>
<html lang="zh_cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>汉字书写</title>

<!-- Bootstrap -->

<?php
  include("../headlink.html");
  ?>

<link rel="stylesheet" href="css/yunyou-input-group.css">


<script>
function ready(){
document.getElementById("write").classList.add('active');
}
</script>

<!-- <script type="text/javascript" src="show.js"></script> -->
<script type="text/javascript" src="show.js?<?php echo rand()?>"></script>
</head>
<body onLoad="ready()">

  <?php
	include("../navbar.html");
	?>

<!--标题-->
<div class="container-fluid">
  <div class="row">
    <div class="text-center col-md-12">
      <h1 >汉字&middot;书写</h1>
    </div>
  </div>
  <hr>
</div>

<div class="container" id="main">
  <div style="   box-shadow: 0px 0px 20px #000;">
    <div class="btn-group btn-group-justified" role="group" aria-label="...">
      <div class="btn-group" role="group">
        <button name="type1button" type="button" class="btn btn-default" onclick="test1()">Draw Image</button>
      </div>
      <div class="btn-group" role="group">
        <button name="type2button" type="button" class="btn btn-default" onclick="">无</button>
      </div>
      <div class="btn-group" role="group">
        <button name="type3button" type="button" class="btn btn-default" onclick="startAction()">type1</button>
      </div>
      <div class="btn-group" role="group">
        <button name="type4button" type="button" class="btn btn-default" onclick="stopAction()">type1</button>
      </div>
      <div class="btn-group" role="group">
        <button name="type5button" type="button" class="btn btn-default" onclick="test5()">type1</button>
      </div>
    </div>

    <!-- <div > -->
      <canvas class="yunyou-canvas" id="canvas">当前浏览器不支持Canvas,请更换浏览器重试</canvas>
    <!-- </div> -->
  </div>
</div>

  <?php
  include("../footer.html");
  ?>

<script type="text/javascript">
$(window).resize(resizeCanvas);
function resizeCanvas() {
// $("#canvas").attr("width", $(window).get(0).innerWidth);
// $("#canvas").attr("height", $(window).get(0).innerHeight);

$("#canvas").attr("width", "1000");
$("#canvas").attr("height", "500");
};
resizeCanvas();

initallvalue();
</script>
</body>


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
</html>

