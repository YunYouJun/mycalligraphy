<?php 
require_once '../include.php';
$pageSize=5;
$page=isset($_REQUEST['page'])?(int)$_REQUEST['page']:1;
$posts=getGoodPostByPage($page,$pageSize);
getPostNum();
if(!$posts){
	alertMes("目前还没有帖子!","forum.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="zh_cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>书法·论坛</title>

	<!-- Bootstrap -->

	<?php
	include "../same/headlink.html";
	?>
	<link rel="stylesheet" href="../css/yunyou-input-group.css">

	<link rel="stylesheet" href="../css/picstyle.css" media="screen" type="text/css" />
	<script>
		function ready(){
			document.getElementById("forum").classList.add('active');
		}
	</script>
	<style type="text/css">
		a,a:hover{
			color: #ccf;
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
			cursor: pointer;
		}
</style>
</head>
<body onLoad="ready()" data-spy="scroll" data-target="#navbar-user" data-offset="100" >

	<?php
	include "../same/navbar.html";
	?>

	<div class="container-fluid">
		<div class="row">
			<div class="text-center col-md-12">
				<h1 id="usercenter" class="text-center">书法&middot;论坛</h1>
				<h5><span>人数：<?php echo getMemberNum();?></span>&nbsp;|&nbsp;<span>话题数：<?php echo $totalPosts; ?></span></h5>
			</div>
		</div>
		<hr style="margin-top: 8px;">
	</div>
	<div class="container">
		<div class="col-md-12 yunyou-background yunyou-bgblur yunyou-panel">
			<!-- 置顶帖子 -->
			<h4 class="text-center">置顶区</h4>
			<?php $TopPosts = getTopPost(); 
			foreach($TopPosts as $TopPost):
				$PostUserInfo = getUserInfo($TopPost['uID']);
			?>
			<div class="col-md-12 yunyou-background yunyou-panel" id="mypost" style="font-family: Microsoft YaHei;">
				<div class="col-md-7">
					<div class="media">
						<?php if($TopPost['themeImage']!=null): ?>
							<div class="modal fade" id="myModal<?php echo $TopPost['pID'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div >
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<div class="text-center" style="margin-top:66px; ">
											<img style="max-width: 1200px;" src="<?php echo $TopPost['themeImage'];?>" alt=""/>
										</div>
									</div>
							</div>
							<a class="media-left" href="javascript:;" data-toggle="modal" data-target="#myModal<?php echo $TopPost['pID'];?>" style="margin-right:10px;">
								<img class="pic" src="<?php echo $TopPost['themeImage'];?>" alt="..." style="max-width: 70px;max-height: 70px;">
							</a>
						<?php endif;?>
						<div class="media-body">
							
							<div class="class="media-heading"">
								<?php if($TopPost['isTop']):?>
									<span class="glyphicon glyphicon-paperclip" title="置顶"></span>&nbsp;置顶&nbsp;|&nbsp;
								<?php endif; ?>
								<?php if($TopPost['isGood']): ?>
									<span class="glyphicon glyphicon-star" title="精品"></span>&nbsp;精品&nbsp;|&nbsp;
								<?php endif; ?>
								<a href="post.php?pID=<?php echo $TopPost['pID'] ?>"><span><?php echo $TopPost['pTitle'] ?></span></a>
								<hr style="margin: 10px;">
							</div>

							<div>
								<?php $messgae = ($TopPost['pContentHtml']==null)?$TopPost['pContent']:$TopPost['pContentHtml']; 
								echo $messgae;
								?>
							</div>
							<hr style="margin: 10px;">
						</div>
					</div>
				</div>
				<div class="col-md-2 postinfo-block">
					<span class="glyphicon glyphicon-user"></span>&nbsp;发帖者：<?php echo $PostUserInfo['username'] ?><br>
<!-- 					<span class="glyphicon glyphicon-signal"></span>&nbsp;点击量：<?php echo $TopPost['brCount']; ?><br> -->
					<span class="glyphicon glyphicon-comment"></span>&nbsp;回复数：<?php echo $TopPost['reCount']; ?>
				</div>
				<div class="col-md-3 postinfo-block">
					<span class="glyphicon glyphicon-time"></span>&nbsp;发帖时间：<?php echo $TopPost['pDate']; ?><br />
					<span class="glyphicon glyphicon-eye-open"></span>&nbsp;最后动态：<?php echo $TopPost['lastReviewTime']; ?>
				</div>
			</div>
		<?php endforeach; ?>
		<div class="col-md-12"><hr></div>
		<!-- 普通帖子 -->
		<h4 class="text-center">
			<a href="forum.php" style="color: #fff;"><span class="text-center">讨论区</span></a>|
			<a href="goodpost.php" style="color: #fff;text-decoration: underline;"><span class="text-center">精品区</span></a>
		</h4>
		<?php  foreach($posts as $postinfo):
		$PostUserInfo = getUserInfo($postinfo['uID']);
		?>
		<div class="col-md-12 yunyou-background yunyou-panel" id="mypost" style="font-family: Microsoft YaHei;">
			<div class="col-md-7">
				<div class="media">
					<?php if($postinfo['themeImage']!=null): ?>
						<div class="modal fade" id="myModal<?php echo $postinfo['pID'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div >
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<div class="text-center" style="margin-top:66px; ">
										<img style="max-width: 1200px;" src="<?php echo $postinfo['themeImage'];?>" alt=""/>
									</div>
								</div>
						</div>
						<a class="media-left" href="#" data-toggle="modal" data-target="#myModal<?php echo $postinfo['pID'];?>" style="margin-right:10px;">
							<img class="pic" src="<?php echo $postinfo['themeImage'];?>" alt="..." style="max-width: 70px;max-height: 70px;">
						</a>
					<?php endif;?>
					<div class="media-body">
						
						<div class="class="media-heading"">
							<?php if($postinfo['isTop']):?>
								<span class="glyphicon glyphicon-paperclip" title="置顶"></span>&nbsp;置顶&nbsp;|&nbsp;
							<?php endif; ?>
							<?php if($postinfo['isGood']): ?>
								<span class="glyphicon glyphicon-star" title="精品"></span>&nbsp;精品&nbsp;|&nbsp;
							<?php endif; ?>
							<a href="post.php?pID=<?php echo $postinfo['pID'] ?>"><span><?php echo $postinfo['pTitle'] ?></span></a>
							<hr style="margin: 10px;">
						</div>

						<div>
							<?php $messgae = ($postinfo['pContentHtml']==null)?$postinfo['pContent']:$postinfo['pContentHtml']; 
							echo $messgae;
							?>
						</div>
						<hr style="margin: 10px;">
					</div>
				</div>
			</div>
			<div class="col-md-2 postinfo-block">
				<span class="glyphicon glyphicon-user"></span>&nbsp;发帖者：<?php echo $PostUserInfo['username'] ?><br>
<!-- 				<span class="glyphicon glyphicon-signal"></span>&nbsp;点击量：<?php echo $postinfo['brCount'] ?><br> -->
				<span class="glyphicon glyphicon-comment"></span>&nbsp;回复数：<?php echo $postinfo['reCount'] ?>
			</div>
			<div class="col-md-3 postinfo-block">
				<span class="glyphicon glyphicon-time"></span>&nbsp;发帖时间：<?php echo $postinfo['pDate'] ?><br />
				<span class="glyphicon glyphicon-eye-open"></span>&nbsp;最后动态：<?php echo $postinfo['lastReviewTime'] ?>
			</div>
		</div>
	<?php endforeach;?>
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
	<!--tesxtarea-->
	<hr>
	<div class="col-md-12">
		<?php if(!isset($_SESSION['uID'])):?>
			<div class="text-center yunyou-background yunyou-panel">想要发布帖子，请先登录。</div>
		<?php else: ?>
			<form method="post" action="doForumAction.php?act=post" id="yourPost" enctype="multipart/form-data" style="font-family: Microsoft YaHei;">
				<div class="form-group form-group-lg has-feedback">
					<input type="text" class="form-control" placeholder="标题内容" id="pTitle" name="pTitle" >
					<span class="glyphicon glyphicon-header form-control-feedback" aria-hidden="true"></span>
				</div>
				<hr>
				<div class="btn-toolbar" role="toolbar" aria-label="...">
					<div class="btn-group btn-group-justified" role="group" aria-label="...">
						<div class="btn-group">
							<a type="button" class="btn btn-inverse dropdown-toggle tool" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-font" title="字体"></span></a>
							<ul class="dropdown-menu">
								<li><a href="javascript:;" style="font-family: '宋体';">宋体</a></li>
								<li><a href="javascript:;" style="font-family: 'Microsoft YaHei';">微软雅黑</a></li>
								<li><a href="javascript:;" style="font-family: '华文行楷';">华文行楷</a></li>
								<li><a href="javascript:;" style="font-family: '华文隶书';">华文隶书</a></li>
							</ul>
						</div>
						<a href="javascript:;" class="btn btn-inverse tool bold">
							<span class="glyphicon glyphicon-bold" title="加粗"></span>
						</a>
						<a href="javascript:;" class="btn btn-inverse tool italic">
							<span class="glyphicon glyphicon-italic" title="斜体"></span>
						</a>
						<a href="javascript:;" class="btn btn-inverse tool file">
							<input type="file" name="themeImage" id="">
							<span class="glyphicon glyphicon-picture" title="添加图片"></span>
						</a>
						<a href="javascript:;" class="btn btn-inverse tool left">
							<span class="glyphicon glyphicon-align-left" title="左对齐"></span>
						</a>
						<a href="javascript:;" class="btn btn-inverse tool center">
							<span class="glyphicon glyphicon-align-center" title="中心对齐"></span>
						</a>
						<a href="javascript:;" class="btn btn-inverse tool right">
							<span class="glyphicon glyphicon-align-right" title="右对齐"></span>
						</a>
						<a href="javascript:;" class="btn btn-inverse tool justify">
							<span class="glyphicon glyphicon-align-justify" title="两端对齐"></span>
						</a>
						<a href="javascript:changeEditor();" class="btn btn-inverse tool">
							<span class="glyphicon glyphicon-pencil" title="使用高级编辑器"></span>
						</a>
						<script type="text/javascript">
							function changeEditor(){
								if($('#message').css('display')!='none'){
									$('#ckeditorDiv').css('display','block');
									$('#message').css('display','none');
								}else{
									$('#ckeditorDiv').css('display','none');
									$('#message').css('display','display');
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
									return false; 
								}
							});
						</script>
					</div>
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
					<textarea class="form-control" rows="6" id="message" placeholder="您的回复内容" name="pContent" required></textarea>
					<span class="glyphicon glyphicon-comment form-control-feedback"></span>
					<div id="ckeditorDiv" style="display: none;">
						<textarea class="ckeditor" id="ckeditor" name="pContentHtml" required></textarea>
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
include "../same/footer.html";
?>
<script type="text/javascript" src="../plugins/ckeditor/ckeditor.js"></script>
<script src='../js/pic/picjquery.js'></script>
<script src="../js/pic/picindex.js"></script>
</body>
</html>
