<?php 
require_once '../include.php';
$pageSize=5;
$page=isset($_REQUEST['page'])?(int)$_REQUEST['page']:1;
$collects=getCollectByPage($page,$pageSize);
?>
<!DOCTYPE html>
<html lang="zh_cn">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>我的·收藏</title>

  <!-- Bootstrap -->

  <?php
  include("../same/headlink.html");
  ?>
  <style type="text/css">
    .carousel-caption{
      color: #000;
    }
    a,a:hover{
      color: #ccf;
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
        <h1 >话题&middot;收藏</h1>
      </div>
    </div>
    <hr>

  </div>

  <div class="container" id="main">
    <div class="container">
      <div class="row">
        <div class="text-center col-md-12">
              <!-- 普通帖子 -->
              <?php  foreach($collects as $collect):
              $PostUserInfo = getUserInfo($collect['uID']);
              $collectPostInfo = getPostInfo($collect['pID']);
              ?>
              <div class="col-md-12 yunyou-background yunyou-panel" id="mypost" style="font-family: Microsoft YaHei;text-align: left;">
                <div class="col-md-7">
                  <div class="media">
                    <?php if($collectPostInfo['themeImage']!=null): ?>
                      <div class="modal fade" id="myModal<?php echo $collectPostInfo['pID'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <div class="text-center" style="margin-top:63px;">
                              <img style="max-width: 1200px;" src="../forum/<?php echo $collectPostInfo['themeImage'];?>" alt=""/>
                            </div>
                          </div>
                      </div>
                      <a class="media-left portrait" href="#" data-toggle="modal" data-target="#myModal<?php echo $collectPostInfo['pID'];?>" style="margin-right:10px;">
                        <img class="pic" src="../forum/<?php echo $collectPostInfo['themeImage'];?>" alt="..." style="max-width: 70px;max-height: 70px;">
                      </a>
                    <?php endif;?>
                    <div class="media-body">
                      
                      <div class="class="media-heading"">
                        <?php if($collectPostInfo['isTop']):?>
                          <span class="glyphicon glyphicon-paperclip" title="置顶"></span>&nbsp;置顶&nbsp;|&nbsp;
                        <?php endif; ?>
                        <?php if($collectPostInfo['isGood']): ?>
                          <span class="glyphicon glyphicon-star" title="精品"></span>&nbsp;精品&nbsp;|&nbsp;
                        <?php endif; ?>
                        <a href="../forum/post.php?pID=<?php echo $collectPostInfo['pID'] ?>"><span><?php echo $collectPostInfo['pTitle'] ?></span></a>
                        <hr style="margin: 10px;">
                      </div>

                      <div>
                        <?php $messgae = ($collectPostInfo['pContentHtml']==null)?$collectPostInfo['pContent']:$collectPostInfo['pContentHtml']; 
                        echo $messgae;
                        ?>
                      </div>
                      <hr style="margin: 10px;">
                    </div>
                  </div>
                </div>
                <div class="col-md-2 postinfo-block">
                  <span class="glyphicon glyphicon-user"></span>&nbsp;发帖者：<?php echo $PostUserInfo['username'] ?><br>
                  <span class="glyphicon glyphicon-comment"></span>&nbsp;回复数：<?php echo $collectPostInfo['reCount'] ?>
                </div>
                <div class="col-md-3 postinfo-block">
                  <span class="glyphicon glyphicon-time"></span>&nbsp;发帖时间：<?php echo $collectPostInfo['pDate'] ?><br />
                  <span class="glyphicon glyphicon-eye-open"></span>&nbsp;最后动态：<?php echo $collectPostInfo['lastReviewTime'] ?>
                </div>
              </div>
            <?php endforeach;?>

        </div>
      </div>

      <div class="row">
        <div class="text-center col-md-12">
          <nav >
            <ul class="pagination" style="margin:0px;font-family: Microsoft YaHei;">
              <?php if($totalRows>$pageSize):?>
                <?php echo showPage($page, $totalPage);?>
              <?php else: ?>
                <h4>没有更多的帖子了哦！</h4>
              <?php endif; ?>
            </ul>
          </nav>

        </div>
      </div>
      
    </div>

  </div>

  <?php
  include("../same/footer.html");
  ?>
</body>
</html>
