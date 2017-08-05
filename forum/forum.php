<?php 
require_once '../include.php';
$pageSize=5;
$page=isset($_REQUEST['page'])?(int)$_REQUEST['page']:1;
$postTab = isset($_REQUEST['tab'])?$_REQUEST['tab']:'CommonDiscussTab';
getPostNum();
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
		.btn-group .btn-inverse.active{
			background-color: rgba(255,255,255,1);
			color: #000;
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
														<!-- Modal -->
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
							<?php if($TopPost['cID'] == 1):?>
								<span class="glyphicon glyphicon-exclamation-sign" title="单字讨论"></span>&nbsp;单字讨论&nbsp;|&nbsp;
							<?php endif; ?>
							<?php if($TopPost['cID'] == 2):?>
								<span class="glyphicon glyphicon-question-sign" title="求助答疑"></span>&nbsp;求助答疑&nbsp;|&nbsp;
							<?php endif; ?>
								<?php if($TopPost['isTop']):?>
									<span class="glyphicon glyphicon-paperclip" title="置顶"></span>&nbsp;置顶&nbsp;|&nbsp;
								<?php endif; ?>
								<?php if($TopPost['isGood']): ?>
									<span class="glyphicon glyphicon-star" title="精品"></span>&nbsp;精品&nbsp;|&nbsp;
								<?php endif; ?>
								<?php if($TopPost['isClosed']):?>
									<span class="glyphicon glyphicon-folder-close" title="关闭"></span>&nbsp;关闭&nbsp;|&nbsp;
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
					<span class="glyphicon glyphicon-comment"></span>&nbsp;回复数：<?php echo $TopPost['reCount']; ?><br>
					<span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;被赞数：<?php echo $TopPost['praiseCount']; ?>
				</div>
				<div class="col-md-3 postinfo-block">
					<span class="glyphicon glyphicon-time"></span>&nbsp;发帖时间：<?php echo $TopPost['pDate']; ?><br />
					<span class="glyphicon glyphicon-eye-open"></span>&nbsp;最后动态：<?php echo $TopPost['lastReviewTime']; ?>
				</div>
			</div>
		<?php endforeach; ?>
		<div class="col-md-12"><hr></div>
		<!-- Nav tabs -->
	<div>
		<ul class="nav nav-tabs nav-justified " role="tablist" id="AllPostTab" style="font-size: large;font-weight: bold;">
		  <li class="myPostTab" tab="CommonDiscussTab" role="presentation"><a href="#CommonDiscuss" aria-controls="CommonDiscuss" role="tab" data-toggle="tab">所有帖子</a></li>
		  <li class="myPostTab" tab="MealTab" role="presentation"><a href="#Meal" aria-controls="Meal" role="tab" data-toggle="tab">单字讨论</a></li>
		  <li class="myPostTab" tab="QuestionTab" role="presentation"><a href="#Question" aria-controls="Question" role="tab" data-toggle="tab">求助答疑</a></li>
		  <li class="myPostTab" tab="GoodPostTab" role="presentation"><a href="#GoodPost" aria-controls="GoodPost" role="tab" data-toggle="tab">精品话题</a></li>
		</ul>

<div class="tab-content">
	<?php if($postTab=='CommonDiscussTab'): ?> 
	<div role="tabpanel" class="tab-pane active" id="CommonDiscuss">
		<?php  
		$posts=getPostByPage($page,$pageSize);
		foreach($posts as $postinfo):
		$PostUserInfo = getUserInfo($postinfo['uID']);
		?>
		<div class="col-md-12 yunyou-background yunyou-panel" id="mypost" style="font-family: Microsoft YaHei;">
			<div class="col-md-7">
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
					<?php if($postinfo['cID']==1): ?>
						<a class="media-left" href="http://hanyu.baidu.com/s?wd=<?php echo $postinfo['DiscussCharacter'];?>" style="margin-right:10px;text-decoration: none;" target="_blank">
							<span style="font-size: 300%;color: #fff;margin: 10px;"><?php echo $postinfo['DiscussCharacter'];?></span>
						</a>
					<?php endif;?>
					<div class="media-body">
						<div class="class="media-heading"">
						<?php if($postinfo['cID'] == 1):?>
							<span class="glyphicon glyphicon-exclamation-sign" title="单字讨论"></span>&nbsp;单字讨论&nbsp;|&nbsp;
						<?php endif; ?>
						<?php  if($postinfo['cID']==2):?>
							<span class="glyphicon glyphicon-question-sign" title="求助答疑"></span>&nbsp;求助答疑&nbsp;|&nbsp;
						<?php endif;?>
							<?php if($postinfo['isTop']):?>
								<span class="glyphicon glyphicon-paperclip" title="置顶"></span>&nbsp;置顶&nbsp;|&nbsp;
							<?php endif; ?>
							<?php if($postinfo['isGood']): ?>
								<span class="glyphicon glyphicon-star" title="精品"></span>&nbsp;精品&nbsp;|&nbsp;
							<?php endif; ?>
							<?php if($postinfo['isClosed']):?>
								<span class="glyphicon glyphicon-folder-close" title="关闭"></span>&nbsp;关闭&nbsp;|&nbsp;
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
				<span class="glyphicon glyphicon-comment"></span>&nbsp;回复数：<?php echo $postinfo['reCount'] ?><br>
				<span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;被赞数：<?php echo $postinfo['praiseCount']; ?>
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
</div>
	<?php endif;?>
	<?php if($postTab=='MealTab'): ?>
	    <div role="tabpanel" class="tab-pane" id="Meal">
	    		<?php 
	    		$posts=getCharPostByPage($page,$pageSize); 
	    		foreach($posts as $postinfo):
	    		$PostUserInfo = getUserInfo($postinfo['uID']);
	    		?>
	    		<div class="col-md-12  yunyou-background yunyou-panel" style="font-family: Microsoft YaHei;">
	    			<div class="col-md-7">
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
	    					<?php if($postinfo['cID']==1): ?>
	    						<a class="media-left" href="http://hanyu.baidu.com/s?wd=<?php echo $postinfo['DiscussCharacter'];?>" style="margin-right:10px;text-decoration: none;" target="_blank">
	    							<span style="font-size: 300%;color: #fff;margin: 10px;"><?php echo $postinfo['DiscussCharacter'];?></span>
	    						</a>
	    					<?php endif;?>
	    					<div class="media-body">
	    						
	    						<div class="media-heading">
	    							<?php if($postinfo['cID'] == 1):?>
	    								<span class="glyphicon glyphicon-exclamation-sign" title="单字讨论"></span>&nbsp;单字讨论&nbsp;|&nbsp;
	    							<?php endif; ?>
	    							<?php if($postinfo['cID'] == 2):?>
	    								<span class="glyphicon glyphicon-question-sign" title="求助答疑"></span>&nbsp;求助答疑&nbsp;|&nbsp;
	    							<?php endif; ?>
	    							<?php if($postinfo['isTop']):?>
	    								<span class="glyphicon glyphicon-paperclip" title="置顶"></span>&nbsp;置顶&nbsp;|&nbsp;
	    							<?php endif; ?>
	    							<?php if($postinfo['isGood']): ?>
	    								<span class="glyphicon glyphicon-star" title="精品"></span>&nbsp;精品&nbsp;|&nbsp;
	    							<?php endif; ?>
	    							<?php if($postinfo['isClosed']):?>
	    								<span class="glyphicon glyphicon-folder-close" title="关闭"></span>&nbsp;关闭&nbsp;|&nbsp;
	    							<?php endif; ?>
	    							<a href="post.php?pID=<?php echo $postinfo['pID'] ?>"><span><?php echo $postinfo['pTitle'] ?></span></a>
	    						<!-- 	<hr style="margin: 10px;"> -->
	    						</div>

	    						<div class="pContent">
	    							<?php $messgae = $postinfo['pContent']; 
	    							echo $messgae;
	    							?>
	    						</div>
	    						<hr style="margin: 10px;">
	    					</div>
	    				</div>
	    			</div>
	    			<div class="col-md-2 postinfo-block">
	    				<span class="glyphicon glyphicon-user"></span>&nbsp;发帖者：<?php echo $PostUserInfo['nickname'] ?><br>
	    				<!-- 				<span class="glyphicon glyphicon-signal"></span>&nbsp;点击量：<?php echo $postinfo['brCount'] ?><br> -->
	    				<span class="glyphicon glyphicon-comment"></span>&nbsp;回复数：<?php echo $postinfo['reCount'] ?><br>
	    				<span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;被赞数：<?php echo $postinfo['praiseCount']; ?>
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
	    						<?php  $where = "tab=CommonDiscussTab";
	    						echo showPage($page, $totalPage,$where);?>
	    					<?php else: ?>
	    						<h4>没有更多的帖子了哦！</h4>
	    					<?php endif; ?>
	    				</ul>
	    			</nav>

	    		</div>
	    	</div>
	    </div>
	<?php endif;?>
	<?php if($postTab=='QuestionTab'): ?>
	    <div role="tabpanel" class="tab-pane" id="Question">
	    		<?php 
	    		$posts=getQuestionPostByPage($page,$pageSize); 
	    		foreach($posts as $postinfo):
	    		$PostUserInfo = getUserInfo($postinfo['uID']);
	    		?>
	    		<div class="col-md-12  yunyou-background yunyou-panel" style="font-family: Microsoft YaHei;">
	    			<div class="col-md-7">
	    				<div class="media">
	    					<?php if($postinfo['themeImage']!=null): ?>
	    						<div class="modal fade" id="myModal<?php echo $postinfo['pID'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	    								<div>
	    									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	    									<div class="text-center" style="margin-top:63px;">
	    										<img style="max-width: 90%;" src="<?php echo $postinfo['themeImage'];?>" alt=""/>
	    									</div>
	    								</div>
	    						</div>
	    						<a class="media-left portrait" href="#" data-toggle="modal" data-target="#myModal<?php echo $postinfo['pID'];?>" style="margin-right:10px;">
	    							<img class="pic" src="<?php echo $postinfo['themeImage'];?>" alt="..." style="max-width: 70px;max-height: 70px;">
	    						</a>
	    					<?php endif;?>
	    					<div class="media-body">
	    						
	    						<div class="media-heading">
	    						<?php if($postinfo['cID'] == 1):?>
	    							<span class="glyphicon glyphicon-exclamation-sign" title="单字讨论"></span>&nbsp;单字讨论&nbsp;|&nbsp;
	    						<?php endif; ?>
	    						<?php if($postinfo['cID'] == 2):?>
	    							<span class="glyphicon glyphicon-question-sign" title="求助答疑"></span>&nbsp;求助答疑&nbsp;|&nbsp;
	    						<?php endif; ?>
	    							<?php if($postinfo['isTop']):?>
	    								<span class="glyphicon glyphicon-paperclip" title="置顶"></span>&nbsp;置顶&nbsp;|&nbsp;
	    							<?php endif; ?>
	    							<?php if($postinfo['isGood']): ?>
	    								<span class="glyphicon glyphicon-star" title="精品"></span>&nbsp;精品&nbsp;|&nbsp;
	    							<?php endif; ?>
	    							<?php if($postinfo['isClosed']):?>
	    								<span class="glyphicon glyphicon-folder-close" title="关闭"></span>&nbsp;关闭&nbsp;|&nbsp;
	    							<?php endif; ?>
	    							<a href="post.php?pID=<?php echo $postinfo['pID'] ?>"><span><?php echo $postinfo['pTitle'] ?></span></a>
	    						<!-- 	<hr style="margin: 10px;"> -->
	    						</div>

	    						<div class="pContent">
	    							<?php $messgae = $postinfo['pContent']; 
	    							echo $messgae;
	    							?>
	    						</div>
	    						<hr style="margin: 10px;">
	    					</div>
	    				</div>
	    			</div>
	    			<div class="col-md-2 postinfo-block">
	    				<span class="glyphicon glyphicon-user"></span>&nbsp;发帖者：<?php echo $PostUserInfo['nickname'] ?><br>
	    				<!-- 				<span class="glyphicon glyphicon-signal"></span>&nbsp;点击量：<?php echo $postinfo['brCount'] ?><br> -->
	    				<span class="glyphicon glyphicon-comment"></span>&nbsp;回复数：<?php echo $postinfo['reCount'] ?><br>
	    				<span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;被赞数：<?php echo $postinfo['praiseCount']; ?>
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
	    						<?php  $where = "tab=CommonDiscussTab";
	    						echo showPage($page, $totalPage,$where);?>
	    					<?php else: ?>
	    						<h4>没有更多的帖子了哦！</h4>
	    					<?php endif; ?>
	    				</ul>
	    			</nav>

	    		</div>
	    	</div>
	    </div>
	<?php endif;?>
	<?php if($postTab=='GoodPostTab'): ?>
	    <div role="tabpanel" class="tab-pane" id="GoodPost">
	    			<?php 
	    			$posts=getGoodPostByPage($page,$pageSize); 
	    			foreach($posts as $postinfo):
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
	    							<?php if($postinfo['cID'] == 1):?>
	    								<span class="glyphicon glyphicon-exclamation-sign" title="单字讨论"></span>&nbsp;单字讨论&nbsp;|&nbsp;
	    							<?php endif; ?>
	    							<?php if($postinfo['cID'] == 2):?>
	    								<span class="glyphicon glyphicon-question-sign" title="求助答疑"></span>&nbsp;求助答疑&nbsp;|&nbsp;
	    							<?php endif; ?>
	    								<?php if($postinfo['isTop']):?>
	    									<span class="glyphicon glyphicon-paperclip" title="置顶"></span>&nbsp;置顶&nbsp;|&nbsp;
	    								<?php endif; ?>
	    								<?php if($postinfo['isGood']): ?>
	    									<span class="glyphicon glyphicon-star" title="精品"></span>&nbsp;精品&nbsp;|&nbsp;
	    								<?php endif; ?>
	    								<a href="post.php?pID=<?php echo $postinfo['pID'] ?>"><span><?php echo $postinfo['pTitle'] ?></span></a>
	    								<hr style="margin: 10px;">
	    							</div>

	    							<div class="pContent">
	    								<?php $messgae = $postinfo['pContent']; 
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
	    							<?php  $where = "tab=GoodPostTab";
	    						echo showPage($page, $totalPage,$where);?>
	    						<?php else: ?>
	    							<h4>没有更多的帖子了哦！</h4>
	    						<?php endif; ?>
	    					</ul>
	    				</nav>

	    			</div>
	    		</div>
	    </div>
	    <?php endif;?>
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
					<input type="text" class="form-control" placeholder="标题内容" id="pTitle" name="pTitle" required="">
					<span class="glyphicon glyphicon-header form-control-feedback" aria-hidden="true"></span>
				</div>
				<hr>
				<div class="btn-toolbar" role="toolbar" aria-label="...">
					<div class="btn-group" role="group" aria-label="...">
						<a href="javascript:;" class="btn btn-inverse tool file">
							<input type="file" name="themeImage" id="">
							<span class="glyphicon glyphicon-picture" title="主题图片"></span>
							&nbsp;主题图片
						</a>
					</div>
					<!-- <div class="btn-group" role="group" aria-label="..."></div> -->
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
				<hr>

				<div class="btn-group btn-group-justified" data-toggle="buttons">
				  <label class="btn btn-inverse active">
				    <input type="radio" name="cID" id="option1" autocomplete="off" checked value="0">普通讨论帖
				  </label>
				  <label class="btn btn-inverse CharacterDiscuss" data-toggle="collapse" data-target="#inputChar">
				    <input type="radio" name="cID" id="option2" autocomplete="off" value="1" >单字讨论帖
				  </label>
				  <label class="btn btn-inverse">
				    <input type="radio" name="cID" id="option3" autocomplete="off" value="2">求助答疑帖
				  </label>
				</div>

				<div class="collapse" id="inputChar">
				<hr>
				  <div class="row">
				  <div class="col-md-6 col-md-offset-3">
				    <div class="input-group">
				      <span class="input-group-addon" id="basic-addon1">
				      	<span class="glyphicon glyphicon-pencil"></span>
				      	&nbsp;汉字
				      </span>
				      <input type="text" name="DiscussCharacter" class="form-control" placeholder="请输入讨论的汉字">
				    </div>
				  </div>
				  </div>
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
					<textarea class="form-control" rows="5" id="message" placeholder="您的回复内容" name="pContent" onfocus="changeEditor();"></textarea>
					<span class="glyphicon glyphicon-comment form-control-feedback"></span>
					<div id="ckeditorDiv" style="display: none;">
						<textarea class="ckeditor" id="ckeditor" name="pContentHtml"></textarea>
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
<input type="hidden" id="postTabValue" value="<?php echo $postTab ?>">
<?php
include "../same/footer.html";
?>
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
    $(document).ready(function(){
    	$('.myPostTab').click(function(){
    		var tabValue = $(this).attr('tab');
    		var url = "forum.php?tab="+tabValue;
    		window.location= url;
    	});

    	var postTabValue = $('#postTabValue').val();
    	switch(postTabValue){
    		case 'CommonDiscussTab':
    			$('#AllPostTab li:eq(0) a').tab('show');
    			break;
    		case 'MealTab':
    			$('#AllPostTab li:eq(1) a').tab('show');
    			break;
    		case 'QuestionTab':
    			$('#AllPostTab li:eq(2) a').tab('show');
    			break;
    		case 'GoodPostTab':
    			$('#AllPostTab li:eq(3) a').tab('show');
    			break;
    		default:
    		$('#AllPostTab li:eq(0) a').tab('show');
    	}

    });
</script>
</body>
</html>
