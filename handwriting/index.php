<!DOCTYPE html>
<html>

<head lang="zh_cn">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content=" height = device-height,
    width = device-width,
    initial-scale = 1.0,
    minimum-scale = 1.0,
    maximum-scale = 1.0,
    user-scalable = no" />
    <title>汉字·书写</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="../logo.ico" media="screen" />
    <link rel="Bookmark" href="../logo.ico">
    <link rel="stylesheet" type="text/css" href="../css/csshake.min.css">
    <link rel="stylesheet" href="../css/yunyoustyle.css">
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <link href="handwriting.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../css/yunyou-input-group.css">
    <style type="text/css">
        .mycanvasContainer{
            position: relative;
        }
        #canvas{
            position: absolute;
        }
        #bgcanvas{
            z-index: -5;
        }
        #CharacterCanvas{
            position: absolute;
            top: 0px;
            left: 0px;
            z-index: -1;
        }
    </style>
</head>

<body>
  <?php
  include("../same/navbar.html");
  ?>
<!--     <nav id="navbar"></nav>
    <script type="text/javascript">
        $.get('../same/navbar.html', function(data) {
            $('#navbar').html(data);
        });
    </script> -->
<div class="mycanvasContainer">
    <canvas id="canvas">
        您的浏览器不支持canvas
    </canvas>
    <canvas id="bgcanvas">
        您的浏览器不支持canvas
    </canvas>
    <canvas id="CharacterCanvas">
        您的浏览器不支持canvas
    </canvas>
</div>
    <div id="controller">
        <div class="btn-group btn-group-justified" role="group" aria-label="...">
            <div class="btn-group" role="group">
                <div id="black_btn" class="btn btn-inverse color_btn color_btn_selected" style="background-color: #000;"></div>
            </div>
            <div class="btn-group" role="group">
                <div id="blue_btn" class="btn btn-primary color_btn"></div>
            </div>
            <div class="btn-group" role="group">
                <div id="green_btn" class="btn btn-success color_btn"></div>
            </div>
            <div class="btn-group" role="group">
                <div id="red_btn" class="btn btn-danger color_btn "></div>
            </div>
            <div class="btn-group" role="group">
                <div id="sky_btn" class="btn btn-info color_btn"></div>
            </div>
            <div class="btn-group" role="group">
                <div id="yellow_btn" class="btn btn-warning color_btn"></div>
            </div>
            <!--         <div class="btn-group" role="group">
            <div id="yellow_btn" class="btn btn-default color_btn"></div>
        </div> -->
        <div class="btn-group" role="group">
            <input type="color" id="ColorPick" name="ColorPick" value="#666666" class="btn color_btn" style="background-color:#ffffff;
            border:0px;padding: 0px 1px 0px 1px;">
        </div>
    </div>
    <div class="btn-group btn-group-justified" role="group" aria-label="..." style="margin-top: 10px;margin-bottom: 10px; ">
        <div class="btn-group" role="group">
            <button id="clear_btn" class="btn btn-inverse btn-block">清除画布</button>
        </div>
        <div class="btn-group dropup" role="group">
            <button type="button" class="btn btn-inverse dropdown-toggle" data-toggle="dropdown" aria-haspopup="true">
                速感级别&nbsp;
                <span id="rateText">2</span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" id="rateSelect">
            <?php for($i=0;$i<8;$i++):?>
                <li><a href="#"><?php echo $i; ?></a></li>
            <?php endfor;?>
            </ul>
        </div>
        <script type="text/javascript">
            $('#rateSelect li').click(function(){
                var rateText = $(this).text();
                $('#rateText').text(rateText);
                rate = rateText;
            });
        </script>
        <div class="btn-group" role="group">
            <button id="CalScoreBtn" class="btn btn-inverse btn-block">临摹评估</button>
        </div>
        <div class="btn-group" role="group">
            <a id="imgdownload" class="btn btn-inverse btn-block">下载图片</a>
        </div>
    </div>
    <div class="input-group input-group-lg">
        <div class="input-group-btn dropup" style="font-family: 'Microsoft YaHei';">
        <button type="button" class="btn btn-inverse dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-top-right-radius: 0px;border-bottom-right-radius: 0px;">
            <span class="glyphicon glyphicon-font"></span><span id="myfontname">字体</span>
        </button>
            <ul class="dropdown-menu">
                <li><a href="javascript:;" class="myfont" style="font-family: '宋体';">宋体</a></li>
                <li><a href="javascript:;" class="myfont" style="font-family: 'Microsoft YaHei';">微软雅黑</a></li>
                <li><a href="javascript:;" class="myfont" style="font-family: '华文行楷';">华文行楷</a></li>
                <li><a href="javascript:;" class="myfont" style="font-family: '华文隶书';">华文隶书</a></li>
                <li><a href="javascript:;" class="myfont" style="font-family: '经典繁毛楷';">经典繁毛楷</a></li>
                <li><a href="javascript:;" class="myfont" style="font-family: '方正舒体';">方正舒体</a></li>
                <li><a href="javascript:;" class="myfont" style="font-family: '书体坊米芾体';">书体坊米芾体</a></li>
                <li><a href="javascript:;" class="myfont" style="font-family: '章草';">章草</a></li>
            </ul>
        </div>
        <script type="text/javascript">
        var fontname = '微软雅黑';
            $('.myfont').click(function(){
                $('#myfontname').text($(this).text());
                $('#myfontname').css('font-family',$(this).text());
                fontname = $(this).css('font-family');
            });
        </script>
        <!-- /btn-group -->
        <input type="text" class="form-control" id="inputCharacter" placeholder="输入您想要临摹的字……">
        <span class="input-group-btn">
            <a class="btn btn-inverse" id="SureCharacter" onclick="CreateCharacter();"><span class="glyphicon glyphicon-pencil"></span></a>
        </span>
    </div>
    <!-- /input-group -->

        <div class="input-group" style="margin-top:10px; ">
            <div class="input-group-addon" style="background-color: rgba(0,0,0,0.9);">
                <span class="glyphicon glyphicon-pencil"></span> &nbsp;画笔粗细
            </div>
            <div class=""></div>
            <input type="number" class="form-control" style="font-family: Microsoft YaHei;" id="MyLineWidth" placeholder="画笔粗细" min="1" max="99" oninput="changeLineWidth();">
        </div>
</div>

<div id="ScoreShow" class="modal fade " tabindex="-1" role="dialog">
    <div class="text-center">
      <h1 id="ScoreText" class="juzhong" style="font-size: 666%;"></h1>
    </div>
</div>

<script src="handwriting.js"></script>
<script type="text/javascript">
    //下载图片
    var mycanvas = document.getElementById("canvas");
    var imgdownload = document.getElementById("imgdownload");
    imgdownload.onclick = function() {
        this.href = mycanvas.toDataURL();
        this.target = "_blank";
        this.download = "汉字书写.png";
    }
    //回车键 输入字
    $(document).keydown(function(event) {
        switch (event.keyCode) {
            case 13:
                $('#SureCharacter').click();
                break;
            default:
                break;
            }
    });
</script>
<script>
    window.onload = function() {
        document.getElementById("application").classList.add('active');
    }
    $('.mycanvasContainer').css('left',$(window).width()/2-canvas.width/2);
    $('html').css('overflow-x','hidden');
</script>
</body>

</html>
