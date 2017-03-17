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

	<link rel="stylesheet" href="../css/picstyle.css" media="screen" type="text/css" />
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
<div class="container" style="font-family: Microsoft YaHei;">
	<div class="col-md-12 yunyou-background yunyou-bgblur yunyou-panel">
		<div class="col-md-12 text-center"><h2>本帖主题：<?php echo $postinfo['pTitle'] ?></h2></div>
		<?php $owner = getUserInfo($postinfo['uID']);?>
		<div class="col-md-12 yunyou-background yunyou-panel" style="margin-bottom: 10px;">
			<h4 class="text-center">主题内容</h4>
			<div class="col-md-3 userinfo-block">
				<span class="glyphicon glyphicon-user"></span>&nbsp;楼主：<?php echo $owner['username']; ?><br>
				<span class="glyphicon glyphicon-star"></span>&nbsp;等级：<?php echo $owner['uGrade'];?><br>
				<span class="glyphicon glyphicon-heart"></span>&nbsp;喜爱：<?php echo getFontType($owner['favfont']);?>
				<br>
				<span class="glyphicon glyphicon-briefcase"></span>&nbsp;职业：<?php echo getProfession($owner['profession']);?>
			</div>
			<div class="col-md-9">
				<div class="media">
					<a class="media-left portrait" href="#" data-toggle="modal" data-target=".modalpic" style="margin-right:10px;">
						<img class="pic" src="../img/character/142(20,109,925,1025).jpg" alt="..." style="max-width: 70px;max-height: 70px;">
					</a>
					<div class="media-body">
						<p><?php echo $postinfo['pContent']; ?></p>
					</div>
				</div>
			</div>
		</div>
		<div align="right">
			<span>主楼</span>&nbsp;&nbsp;<span><?php echo $postinfo['pDate'];?></span>&nbsp;&nbsp;
			<a href=""><span>删除</span></a>
		</div>
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
							<a class="media-left portrait" href="#" data-toggle="modal" data-target=".modalpic" style="margin-right:10px;">
								<img class="pic" src="<?php echo $review['imagePath'];?>" alt="..." style="max-width: 70px;max-height: 70px;">
							</a>
						<?php endif;?>
						<div class="media-body">
							<p><?php $messgae = ($review['rContentHtml']==null)?$review['rContent']:$review['rContentHtml']; 
								echo $messgae;
								?></p>
							</div>
						</div>
					</div>

				</div>
				<div align="right">
					<a href="javascript:;" class="praise">
						<span class="glyphicon glyphicon-thumbs-up"></span>
						<?php if($review['praiseCount']) echo '<span class="praiseCount">'.$review['praiseCount'].'</span>';
						else{echo '<span class="praiseCount"></span>';} ?>&nbsp;
						<span class="praiseText"></span>
						&nbsp;
					</a>
					<span><?php echo $index+$pageSize*($page-1); ?>楼</span>&nbsp;&nbsp;<span><?php echo $review['rDate'];?></span>&nbsp;&nbsp;
					<a href="javascript:confirm('确定要删除吗？');"><span>删除</span></a>
				</div>
				<hr style="margin: 10px;">
				<?php $index++; endforeach; }?>
				<div class="row">
					<div class="text-center col-md-12">
						<nav >
							<ul class="pagination" style="margin:0px;font-family: Microsoft YaHei;">
								<?php if($totalRows>$pageSize):?>
									<?php echo showPage($page, $totalPage,'pID='.$pID);?>
								<?php endif;?>
							</ul>
						</nav>

					</div>
				</div>
				<!--tesxtarea-->
				<hr>
				<div class="col-md-12">
					<form method="post" action="doForumAction.php?act=review&pID=<?php echo $pID; ?>" name="yourword" id="yourword" enctype="multipart/form-data">
						<div class="btn-toolbar" role="toolbar" aria-label="...">
							<div class="btn-group btn-group-justified" role="group" aria-label="...">
								<div class="btn-group">
									<a type="button" class="btn btn-inverse dropdown-toggle tool" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-font" title="字体"></span></a>
									<ul class="dropdown-menu">
										<li><a href="#" style="font-family: '宋体';">宋体</a></li>
										<li><a href="#" style="font-family: 'Microsoft YaHei';">微软雅黑</a></li>
										<li><a href="#" style="font-family: '华文行楷';">华文行楷</a></li>
										<li><a href="#" style="font-family: '华文隶书';">华文隶书</a></li>
									</ul>
								</div>
								<a href="javascript:;" class="btn btn-inverse tool bold">
									<span class="glyphicon glyphicon-bold" title="加粗"></span>
								</a>
								<a href="javascript:;" class="btn btn-inverse tool italic">
									<span class="glyphicon glyphicon-italic" title="斜体"></span>
								</a>
								<a href="javascript:;" class="btn btn-inverse tool file">
									<input type="file" name="imagePath" id="">
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
											return false 
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
							<textarea class="form-control" rows="6" id="message" placeholder="您的回复内容" name="rContent" required></textarea>
							<span class="glyphicon glyphicon-comment form-control-feedback"></span>
							<div id="ckeditorDiv" style="display: none;">
								<textarea class="ckeditor" id="ckeditor" name="rContentHtml" required></textarea>
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
									<input type="reset" class="btn btn-block btn-inverse yunyou-bgblur" name="reset">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<?php
		include("../same/footer.html");
		?>
		<script type="text/javascript" src='review.js'></script>
		<script type="text/javascript" src="../plugins/ckeditor/ckeditor.js"></script>
		<script src='../js/pic/picjquery.js'></script> 
		<script src="../js/pic/picindex.js"></script>
	</body>
	</html>