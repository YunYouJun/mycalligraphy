<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>汉字检索</title>

<!-- Bootstrap -->

<?php
  include("headlink.html");
  ?>


<script>
function ready(){
document.getElementById("character").classList.add('active');
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
      <h1 >汉字&middot;检索</h1>
    </div>
  </div>
  <hr>
</div>

<div class="container" id="main">
<div class="container">
  <div class="row">
      <div class="yunyou-background yunyou-bgblur col-md-12 yunyou-panel" style="font-size: large;">
        <div class="col-md-2  yunyou-panel" style="font-size:xx-large;">
        <embed class="yunyou-bgblur" src="http://hanyu.iciba.com/hanzi.swf?furl=b24891983d095e5d3c2edf5e3c996948" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="170" height="170">
        </div>
        <div class="col-md-10">
          <div class="row yunyou-input" style="color: #ccc;">
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
          </div>
          <div class="row">
            <div class="col-md-12 text-center yunyou-background">基本释义</div>
            <p class="col-md-12 yunyou-block">
①（名）处所。
②（名）明代驻兵的地点；大的叫千户所；小的叫百户所。现在只用于地名：海阳～（在山东）｜前～（在浙江）。
③（名）用做机关或其它办事地方的名称：科研～｜管理～。
④（量）ɑ）用于房屋：两～房子。b）用于学校等（可以不止一所房子）：一～学校。
⑤（助）ɑ）跟“为”或“被”合用；表示被动：为人～笑。b）用在做定语的主谓结构的动词前面；表示中心词是受事者：我～知道的事。c）用在“是……的”中间的名词、代词和动词之间；强调施事者和动作的关系：高考；是家长～关心的事。d）〈书〉用在动词前面；跟动词构成介词结构：～做｜～想。</p>
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
  include("footer.html");
  ?>


</body>
</html>
