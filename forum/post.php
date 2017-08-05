<?php 
require_once '../include.php';

$pID = $_REQUEST['pID'];
$postsql = 'select * from post where pID = "'.$pID.'"';
$postinfo = fetchOne($postsql);

$pageSize=3;
$page=isset($_REQUEST['page'])?(int)$_REQUEST['page']:1;
@$reviews = getReviewByPage($pID,$page,$pageSize); 

// $page=isset($_REQUEST['page'])?(int)$_REQUEST['page']:1;
// $rows=getReviewByPage($page,$pageSize);
?>
<!DOCTYPE html>
<html lang="zh_cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>书法论坛-<?php echo $postinfo['pTitle'];?></title>

	<!-- Bootstrap -->

	<?php
	include("../same/headlink.html");
	?>
	<link rel="stylesheet" href="../css/yunyou-input-group.css">
	<script>
		function ready(){
			document.getElementById("forum").classList.add('active');
		}
	</script>

	<style type="text/css">
		a,a:hover,a:focus{
			color: #ccf;
			text-decoration: none;
		}
		.userinfo-block{
			border-left: 0px;
			border-top: 0px;
			border-bottom: 0px;
			border-right: 2px rgba(255,255,255,0.5) solid; 
		}
		
		.file {
			position: relative;
			display: inline-block;
		}
		.file input {
			position: absolute;
			right: 0;
			top: 0;
			opacity: 0;
			z-index: 10;
		}
	</style>
</head>
<body onLoad="ready()" data-spy="scroll" data-target="#navbar-user" data-offset="100" >

	<?php
	include("../same/navbar.html");
	?>

<!-- <div class="container-fluid">
  <div class="row">
    <div class="text-center col-md-12">
      <h1 id="usercenter" class="text-center">书法&middot;论坛</h1>
    </div>
  </div>
  <hr>
</div> -->
<?php @$viewer = getUserInfo($_SESSION['uID']);?>
<div class="container" style="font-family: Microsoft YaHei;">
	<div class="col-md-12 yunyou-background yunyou-bgblur yunyou-panel">
		<div class="col-md-12 text-center">
			<input type="hidden" id="pID" name="pID" value="<?php echo $postinfo['pID']; ?>">
			<?php if($postinfo['isGood']): ?>
				<span class="glyphicon glyphicon-star" title="精品"></span>&nbsp;精品&nbsp;
			<?php endif; ?>&nbsp;
			<?php if($postinfo['isTop']):?>
				<span class="glyphicon glyphicon-paperclip" title="置顶"></span>&nbsp;置顶&nbsp;
			<?php endif; ?>&nbsp;
			<?php if($postinfo['isClosed']):?>
				<span class="glyphicon glyphicon-folder-close" title="关闭"></span>&nbsp;关闭&nbsp;
			<?php endif; ?>&nbsp;
			<h2 style="margin: 10px;">
				<?php echo $postinfo['pTitle'] ?>
				<div class="text-right" style="margin-top: 10px;">
				<?php if($postinfo['cID'] == 1):?>
				<button class="btn btn-inverse" type="button" title="单字讨论" onclick="window.open('http://hanyu.baidu.com/s?wd=<?php echo $postinfo['DiscussCharacter'];?>','_blank');">
					<span class="glyphicon glyphicon-exclamation-sign" title="单字讨论"></span>&nbsp;单字讨论&nbsp;
					-&nbsp; <?php echo $postinfo['DiscussCharacter']; ?>
					</a>
				</button>
				<?php endif; ?>
					<?php if($viewer['authority']>=$HandleAuthority): ?>
						<button class="btn btn-inverse" type="button" id="topPost" title="置顶/取消置顶" onclick="toggleState(this);">
							<?php if($postinfo['isTop']):?>
								<span class="glyphicon glyphicon-pushpin" id="topPostIcon" style="color:#66ccff"></span>&nbsp;&nbsp;|&nbsp;
								<span id='topPostText' class="text">已置顶</span>
							<?php else: ?>
								<span class="glyphicon glyphicon-pushpin" id="topPostIcon"></span>&nbsp;&nbsp;|&nbsp;
								<span id='topPostText' class="text">置顶</span>
							<?php endif; ?>
						</button>
						<button class="btn btn-inverse" type="button" id="goodPost" title="加精/取消加精" onclick="toggleState(this);">
							<?php if($postinfo['isGood']):?>
								<span class="glyphicon glyphicon-fire" id="goodPostIcon" style="color:red"></span>&nbsp;&nbsp;|&nbsp;
								<span id='goodPostText' class="text">已加精</span>
							<?php else: ?>
								<span class="glyphicon glyphicon-fire" id="goodPostIcon"></span>&nbsp;&nbsp;|&nbsp;
								<span id='goodPostText' class="text">加精</span>
							<?php endif; ?>
						</button>
					<?php endif;?>
					<?php if(isset($_SESSION['uID'])):?>
						<button class="btn btn-inverse" type="button" id="collect" title="收藏/取消收藏">

							<?php if( getIsCollected($postinfo['pID']) ):?>
								<span class="glyphicon glyphicon-heart" id="collectIcon" style="color: red;"></span>&nbsp;&nbsp;|&nbsp;
								<span id='collectText' class="text">已收藏</span>
							<?php else: ?>
								<span class="glyphicon glyphicon-heart-empty" id="collectIcon"></span>&nbsp;&nbsp;|&nbsp;
								<span id='collectText' class="text">收藏</span>
							<?php endif; ?>
						</button>
					<?php endif;?>
				<?php if(isset($_SESSION['uID'])):?>
					<?php if($_SESSION['uID']==$postinfo['uID']): ?>
						<button class="btn btn-inverse" type="button" id="closePost" title="开启/关闭">
							<?php if($postinfo['isClosed']):?>
								<span class="glyphicon glyphicon-folder-close" id="closePostIcon"></span>&nbsp;&nbsp;|&nbsp;
								<span id='closePostText' class="text">已关闭</span>
							<?php else: ?>
								<span class="glyphicon glyphicon-folder-open" id="closePostIcon"></span>&nbsp;&nbsp;|&nbsp;
								<span id='closePostText' class="text">关闭</span>
							<?php endif; ?>
						</button>
					<?php endif;?>
						<a href="javascript:;" class="btn btn-inverse praisePost">
							<span class="glyphicon glyphicon-thumbs-up"></span>
							<?php if($postinfo['praiseCount']) echo '<span class="praiseCount">'.$postinfo['praiseCount'].'</span>';
							else{echo '<span class="praiseCount"></span>';} ?>
							<span class="praiseText"><?php if(getPostIsPraised($postinfo['pID'])) echo "取消赞";?></span>
							<input type="hidden" name="pID" id="pID" value="<?php echo $postinfo['pID'];?>">
						</a>
				<?php endif; ?>
				</div>
			</h2>
			<hr style="margin-top: 10px;">
		</div>
		<?php $owner = getUserInfo($postinfo['uID']);?>
			<h4 class="text-center" style="font-family: 华文行楷;">主题内容</h4>
		<div class="col-md-12 yunyou-background yunyou-panel" style="margin-bottom: 10px;">

			<div class="col-md-3 userinfo-block">
				<span class="glyphicon glyphicon-user"></span>&nbsp;楼主：<?php echo $owner['username']; ?><br>
				<span class="glyphicon glyphicon-star"></span>&nbsp;等级：<?php echo $owner['uGrade'];?><br>
				<span class="glyphicon glyphicon-heart"></span>&nbsp;喜爱：<?php echo getFontType($owner['favfont']);?>
				<br>
				<span class="glyphicon glyphicon-briefcase"></span>&nbsp;职业：<?php echo getProfession($owner['profession']);?>
			</div>
			<div class="col-md-9">
				<div class="media">
					<?php if($postinfo['themeImage']!=null): ?>
						<div class="modal fade" id="myModal<?php echo $postinfo['pID'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<div class="text-center" style="margin-top:63px;">
										<img style="max-width: 1200px;" src="<?php echo $postinfo['themeImage'];?>" alt=""/>
									</div>
								</div>
						</div>
						<a class="media-left portrait" href="#" data-toggle="modal" data-target="#myModal<?php echo $postinfo['pID'];?>" style="margin-right:10px;">
							<img class="pic" src="<?php echo $postinfo['themeImage'];?>" alt="..." style="max-width: 70px;max-height: 70px;">
						</a>
					<?php endif;?>
					<div class="media-body">
						<div>
							<?php $messgae = ($postinfo['pContentHtml']==null)?$postinfo['pContent']:$postinfo['pContentHtml']; 
							echo $messgae;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div align="right">
			<span>主楼</span>&nbsp;&nbsp;<span><?php echo $postinfo['pDate'];?></span>&nbsp;&nbsp;
		<?php if(isset($_SESSION['uID'])):?>
			<?php if($_SESSION['uID']==$postinfo['uID']): ?>
				<a href="javascript:delPost(<?php echo $postinfo['pID']; ?>);"><span>删除</span></a>
			<?php else: ?>
				<a href="javascript:reportPost(<?php echo $postinfo['pID']; ?>);"><span>举报</span></a>
			<?php endif; ?>
		<?php endif;?>
		</div>
		<hr style="margin: 10px;">
		<h4 class="text-center" style="font-family: 华文行楷;">讨论区</h4>
		<hr style="margin: 10px;">
		<?php 
		if($reviews){
			$index = 1;
			foreach($reviews as $review):
				$ReviewUserInfo = getUserInfo($review['uID']);
			?>
			<div class="col-md-12 yunyou-background yunyou-panel" style="margin-bottom: 10px;">
				<div class="col-md-3 userinfo-block">
					<span class="glyphicon glyphicon-user"></span>&nbsp;论者：<?php echo $ReviewUserInfo['username']; ?><br>
					<span class="glyphicon glyphicon-star"></span>&nbsp;等级：<?php echo $ReviewUserInfo['uGrade'];?><br>
					<span class="glyphicon glyphicon-heart"></span>&nbsp;喜爱：<?php echo getFontType($ReviewUserInfo['favfont']);?>
					<br> 
					<span class="glyphicon glyphicon-briefcase"></span>&nbsp;职业：<?php echo getProfession($ReviewUserInfo['profession']);?>
				</div>
				<div class="col-md-9">
					<div class="media">
						<?php if($review['imagePath']!=null): ?>
							<div class="modal fade" id="reviewModal<?php echo $review['rID'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<div class="text-center" style="margin-top:63px;">
										<img style="max-width: 1200px;" src="<?php echo $review['imagePath'];?>" alt=""/>
									</div>
								</div>
							</div>
							<a class="media-left portrait" href="#" data-toggle="modal" data-target="#reviewModal<?php echo $review['rID'];?>" style="margin-right:10px;">
								<img class="pic" src="<?php echo $review['imagePath'];?>" alt="..." style="max-width: 70px;max-height: 70px;">
							</a>
						<?php endif;?>
						<div class="media-body">
							<p>
								<?php $messgae = ($review['rContentHtml']==null)?$review['rContent']:$review['rContentHtml']; 
								echo $messgae;
								?>
							</p>
						</div>
					</div>
				</div>

			</div>
			<div align="right">
			<?php if(isset($_SESSION['uID'])):?>
				<a href="javascript:;" class="praise">
					<span class="glyphicon glyphicon-thumbs-up"></span>
					<?php if($review['praiseCount']) echo '<span class="praiseCount">'.$review['praiseCount'].'</span>';
					else{echo '<span class="praiseCount"></span>';} ?>&nbsp;
					<span class="praiseText"><?php if(getIsPraised($review['rID'])) echo "取消赞";?></span>
					<input type="hidden" name="rID" id="rID" value="<?php echo $review['rID'];?>">
					&nbsp;
				</a><!-- $index+$pageSize*($page-1); -->
			<?php endif; ?>
				<span><?php echo $review['rFloor'];?>楼</span>&nbsp;&nbsp;<span><?php echo $review['rDate'];?></span>&nbsp;&nbsp;
			<?php if(isset($_SESSION['uID'])):?>
				<?php if($_SESSION['uID']==$review['uID']): ?>
					<a href="javascript:delReview(<?php echo $review['rID']; ?>);"><span>删除</span></a>
				<?php else: ?>
					<a href="javascript:;"><span>举报</span></a>
				<?php endif; ?>
			<?php endif; ?>
			</div>
			<hr style="margin: 10px;">
			<?php $index++; endforeach; }?>
			<div class="row">
				<div class="text-center col-md-12">
					<nav >
						<ul class="pagination" style="margin:0px;font-family: Microsoft YaHei;">
							<?php if($totalRows>$pageSize):?>
								<?php echo showPage($page, $totalPage,'pID='.$pID); ?>
							<?php else: ?>
								<h4>没有更多的评论了哦！</h4>
							<?php endif; ?>
						</ul>
					</nav>
				</div>
			</div>
			<!--tesxtarea-->
			<hr>
			<div class="col-md-12">
			<?php if(!isset($_SESSION['uID'])):?>
				<div class="text-center yunyou-background yunyou-panel">想要评论帖子，请先登录。</div>
			<?php else: ?>
				<div class="text-center yunyou-background yunyou-panel" id="closeText"
				<?php if(!$postinfo['isClosed']){ echo 'style="display: none;"';} ?> >本帖已关闭，不可评论。</div>
				<?php //endif; ?>
				<?php //else: ?>
				<form method="post" action="doForumAction.php?act=review&pID=<?php echo $pID; ?>" name="yourword" id="yourword" enctype="multipart/form-data" <?php if($postinfo['isClosed']){ echo 'style="display: none;"';} ?>  >
					<div class="btn-toolbar" role="toolbar" aria-label="...">
						<div class="btn-group" role="group" aria-label="...">
							<a href="javascript:;" class="btn btn-inverse tool file">
								<input type="file" name="imagePath" id="">
								<span class="glyphicon glyphicon-picture" title="添加图片"></span>
								&nbsp;主题图片
							</a>
						</div>
							<script type="text/javascript">
								function changeEditor(){
									if($('#message').css('display')!='none'){
										$('#ckeditorDiv').css('display','block');
										$('#message').css('display','none');
									}else{
										$('#ckeditorDiv').css('display','none');
										$('#message').css('display','block');
									}
								}
								$('.tool').click(function(){
									if($(this).hasClass('bold')){
									}
								});
								$(".file").on("change","input[type='file']",function(){
									displayDivide();
									var filePath=$(this).val();
									if(filePath.indexOf("jpg")!=-1 || filePath.indexOf("png")!=-1){
										$(".fileerrorTip").html("").hide();
										var arr=filePath.split('\\');
										var fileName=arr[arr.length-1];
										$(".showFileName").html(fileName);
									}else{
										$(".showFileName").html("");
										$(".fileerrorTip").html("您未上传文件，或者您上传文件类型有误！").show();
										return false 
									}
								});
							</script>
						<!-- <div class="btn-group" role="group" aria-label="..."></div> -->
					</div>
					<hr>
					<div class="form-group has-feedback">
						<div class="showFileName"></div>
						<div class="fileerrorTip"></div>
						<script type="text/javascript">
							function displayDivide(){
								if(($('.showFileName').text()!=null)||($('.fileerrorTip').text()!=null)){
									$('.divider').html('<hr>');
								}
							}
						</script>
						<div class="divider"></div>
						<textarea class="form-control" rows="6" id="message" placeholder="您的回复内容" name="rContent" onfocus="changeEditor();"></textarea>
						<span class="glyphicon glyphicon-comment form-control-feedback"></span>
						<div id="ckeditorDiv" style="display: none;">
							<textarea class="ckeditor" id="ckeditor" name="rContentHtml"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="btn-group btn-group-justified" role="group" aria-label="...">
							<div class="btn-group" role="group">
								<button type="submit" class="btn btn-block btn-inverse yunyou-bgblur">
									<span class="glyphicon glyphicon-pencil"></span>&nbsp;发&nbsp;表
								</button>
							</div>
							<div class="btn-group" role="group">
								<button type="reset" class="btn btn-block btn-inverse yunyou-bgblur">
									<span class="glyphicon glyphicon-erase"></span>&nbsp;重&nbsp;置
								</button>
							</div>
						</div>
					</div>
				</form>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<?php
	include("../same/footer.html");
	?>
	<script type="text/javascript">
		var pID = $('#pID').val();
		function delReview(rID){
			if(confirm("确定要删除这条评论吗？不可恢复哦！")){
				window.location="doForumAction.php?act=delReview&rID="+rID;
			}
		}
		function delPost(pID){
			if(confirm("确定要删除此话题吗？不可恢复哦！")){
				window.location="doForumAction.php?act=delPost&pID="+pID;
			}
		}
		function isTop(pID,obj){
			// var url = "doPostAction.php?act=isTop&pID="+pID;
			$.ajax({
				type:"GET",
				url:"doPostAction.php?act=isTop&pID="+pID,
				//data:"{}",
				contentType: "application/json; charset=utf-8",
				//dataType:"json",
				success: function (data) {
					//alert(data.success);
					changeTextIcon(obj,'#66ccff');
				},
				error: function (no) {
					alert('error:'+no.status);
				}
			});
		}
		function isGood(pID,obj){
			$.ajax({
				type:"GET",
				url:"doPostAction.php?act=isGood&pID="+pID,
				//data:"{}",
				contentType: "application/json; charset=utf-8",
				//dataType:"json",
				success: function (data) {
					changeTextIcon(obj,'red');
				},
				error: function (no) {
					alert('error:'+no.status);
				}
			});
		}
		function isCollected(pID){
			$.ajax({
				type:"GET",
				url:"doPostAction.php?act=isCollected&pID="+pID,
				//data:"{}",
				contentType: "application/json; charset=utf-8",
				//dataType:"json",
				success: function (data) {
				},
				error: function (no) {
					alert('error:'+no.status);
				}
			});
		}
		function isClosed(pID){
			$.ajax({
				type:"GET",
				url:"doPostAction.php?act=isClosed&pID="+pID,
				//data:"{}",
				contentType: "application/json; charset=utf-8",
				//dataType:"json",
				success: function (data) {
				},
				error: function (no) {
					alert('error:'+no.status);
				}
			});
		}
		function givePraise(rID){
			$.ajax({
				type:"GET",
				url:"doPostAction.php?act=givePraise&rID="+rID,
				//data:"{}",
				contentType: "application/json; charset=utf-8",
				//dataType:"json",
				success: function (data) {
				},
				error: function (no) {
					alert('error:'+no.status);
				}
			});
		}
		function withdraw(rID){
			$.ajax({
				type:"GET",
				url:"doPostAction.php?act=withdraw&rID="+rID,
				//data:"{}",
				contentType: "application/json; charset=utf-8",
				//dataType:"json",
				success: function (data) {
				},
				error: function (no) {
					alert('error:'+no.status);
				}
			});
		}
		function givePostPraise(pID){
			$.ajax({
				type:"GET",
				url:"doPostAction.php?act=givePostPraise&rID="+pID,
				//data:"{}",
				contentType: "application/json; charset=utf-8",
				//dataType:"json",
				success: function (data) {
				},
				error: function (no) {
					alert('error:'+no.status);
				}
			});
		}
		function withPostdraw(pID){
			$.ajax({
				type:"GET",
				url:"doPostAction.php?act=withPostdraw&rID="+pID,
				//data:"{}",
				contentType: "application/json; charset=utf-8",
				//dataType:"json",
				success: function (data) {
				},
				error: function (no) {
					alert('error:'+no.status);
				}
			});
		}
		function reportPost(pID){
			var reportInfo=prompt("请输入举报理由：","请勿恶意举报");
			if (reportInfo!=null && reportInfo!="")
			{
				$.ajax({
					type:"GET",
					url:"doPostAction.php?act=reportPost&pID="+pID+"&reportInfo="+reportInfo,
					//data:"{}",
					contentType: "application/json; charset=utf-8",
					dataType:"json",
					success: function (data) {
						alert(data.success);
					},
					error: function (no) {
						alert('error:'+no.status);
					}
				});
			}
		}
			//收藏
			$('#collect').click(function(){
				var collectText = $(this).find('#collectText');
				var collectIcon = $(this).find('#collectIcon');
				isCollected(pID);
				if(collectText.text()=='收藏'){
					collectText.text('已收藏');
					collectIcon.removeClass('glyphicon-heart-empty');
					collectIcon.addClass('glyphicon-heart');
					collectIcon.css('color','red');
				}else{
					collectText.text('收藏');
					collectIcon.removeClass('glyphicon-heart');
					collectIcon.addClass('glyphicon-heart-empty');
					collectIcon.css('color','white');
				}
			});
			$('#closePost').click(function(){
				var collectText = $(this).find('#closePostText');
				var collectIcon = $(this).find('#closePostIcon');
				isClosed(pID);
				if(collectText.text()=='关闭'){
					collectText.text('已关闭');
					collectIcon.removeClass('glyphicon-folder-open');
					collectIcon.addClass('glyphicon-folder-close');
					$('#yourword').css('display','none');
					$('#closeText').css('display','block');
				}else{
					collectText.text('关闭');
					collectIcon.removeClass('glyphicon-folder-close');
					collectIcon.addClass('glyphicon-folder-open');
					$('#yourword').css('display','block');
					$('#closeText').css('display','none');
				}
			});
			function toggleState(obj){
				switch($(obj).attr('id')){
					case 'topPost':
					isTop(pID,obj);
					break;
					case 'goodPost':
					isGood(pID,obj);
					break;
					default: break;
				}
			}
			function changeTextIcon(obj,color){
				var btnText = $(obj).find('.text');
				var Icon = $(obj).find('.glyphicon');
				if(btnText.text().indexOf('已')!=-1){
					btnText.text(btnText.text().substr(1));
					Icon.css('color','white');
				}else{
					btnText.text('已'+btnText.text());
					Icon.css('color',color);
				}
			}
		</script>
		<script type="text/javascript" src='review.js'></script>
		<script type="text/javascript" src="../plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../js/image/imageScale.js"></script>
<script>
    CKEDITOR.replace( 'ckeditor' ,{
        filebrowserBrowseUrl:'../plugins/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl:'../plugins/ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl: '../plugins/ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl: '../plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: '../plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl: '../plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'}
    );
</script>
	</body>
	</html>