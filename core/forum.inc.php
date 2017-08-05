<?php
//论坛用户数量
function getMemberNum(){
	$sql = "select * from userinfo";
	$totalRows=getResultNum($sql);
	return $totalRows;
}

function getCollectByPage($page,$pageSize=2){
	$where = "uID='".$_SESSION['uID']."'";
	$sql="select * from collect where ".$where;
	global $totalRows;
	$totalRows=getResultNum($sql);
	global $totalPage;
	$totalPage=ceil($totalRows/$pageSize);
	if($page<1||$page==null||!is_numeric($page)){
		$page=1;
	}
	if($page>=$totalPage)$page=$totalPage;
	$offset=($page-1)*$pageSize;
	$sql="select * from collect where ".$where." order by pID desc limit {$offset},{$pageSize}";
	$rows=fetchAll($sql);
	return $rows;
}

function getPostNum(){
	$sql="select * from post";
	global $totalPosts;
	$totalPosts=getResultNum($sql);
}

function getPostByPage($page,$pageSize=2){
	$sql="select * from post";
	global $totalRows;
	$totalRows=getResultNum($sql);
	global $totalPage;
	$totalPage=ceil($totalRows/$pageSize);
	if($page<1||$page==null||!is_numeric($page)){
		$page=1;
	}
	if($page>=$totalPage)$page=$totalPage;
	$offset=($page-1)*$pageSize;
	$sql="select * from post where isTop=0 order by lastReviewTime desc limit {$offset},{$pageSize}";
	$rows=fetchAll($sql);
	return $rows;
}

function getGoodPostByPage($page,$pageSize=2){
	$sql="select * from post where isGood = 1";
	global $totalRows;
	$totalRows=getResultNum($sql);
	global $totalPage;
	$totalPage=ceil($totalRows/$pageSize);
	if($page<1||$page==null||!is_numeric($page)){
		$page=1;
	}
	if($page>=$totalPage)$page=$totalPage;
	$offset=($page-1)*$pageSize;
	$sql="select * from post where isGood = 1 order by lastReviewTime desc limit {$offset},{$pageSize}";
	$rows=fetchAll($sql);
	return $rows;
}

function getCharPostByPage($page,$pageSize=2){
	$sql="select * from post where cID=1";
	global $totalRows;
	$totalRows=getResultNum($sql);
	global $totalPage;
	$totalPage=ceil($totalRows/$pageSize);
	if($page<1||$page==null||!is_numeric($page)){
		$page=1;
	}
	if($page>=$totalPage)$page=$totalPage;
	$offset=($page-1)*$pageSize;
	$sql="select * from post where cID=1 order by lastReviewTime desc limit {$offset},{$pageSize}";
	$rows=fetchAll($sql);
	return $rows;
}

function getQuestionPostByPage($page,$pageSize=2){
	$sql="select * from post where cID = 2";
	global $totalRows;
	$totalRows=getResultNum($sql);
	global $totalPage;
	$totalPage=ceil($totalRows/$pageSize);
	if($page<1||$page==null||!is_numeric($page)){
		$page=1;
	}
	if($page>=$totalPage)$page=$totalPage;
	$offset=($page-1)*$pageSize;
	$sql="select * from post where cID = 2 order by lastReviewTime desc limit {$offset},{$pageSize}";
	$rows=fetchAll($sql);
	return $rows;
}

function getPostInfo($pID){
	$where = "pID='".$pID."'";
	$sql="select * from post where ".$where;
	$postinfo=fetchOne($sql);
	return $postinfo;
}

function getTopPost(){
	$sql="select * from post where isTop=1 order by lastReviewTime desc";
	$rows=fetchAll($sql);
	return $rows;
}

function getReviewByPage($pID,$page,$pageSize=2){
	$sql="select * from review where pID = {$pID}";
	global $totalRows;
	$totalRows=getResultNum($sql);
	global $totalPage;
	$totalPage=ceil($totalRows/$pageSize);
	if($page<1||$page==null||!is_numeric($page)){
		$page=1;
	}
	if($page>=$totalPage)$page=$totalPage;
	$offset=($page-1)*$pageSize;
	$sql="select * from review where pID = {$pID} order by rID asc limit {$offset},{$pageSize}";
	$rows=fetchAll($sql);
	return $rows;
}

function getMyPostByPage($page,$pageSize){
	$sql="select * from post where uID = '".$_SESSION['uID']."'";
	global $totalRows;
	$totalRows=getResultNum($sql);
	global $totalPage;
	$totalPage=ceil($totalRows/$pageSize);
	if($page<1||$page==null||!is_numeric($page)){
		$page=1;
	}
	if($page>=$totalPage)$page=$totalPage;
	$offset=($page-1)*$pageSize;
	$sql="select * from post where uID = '".$_SESSION['uID']."' order by pDate desc limit {$offset},{$pageSize}";
	$rows=fetchAll($sql);
	return $rows;
}

function getFontType($FontValue){
	$fontsql = "select * from fonttype where FontValue = '".$FontValue."'";
	$favfont=fetchOne($fontsql);
	return $favfont['FontName'];
}

function getProfession($ProValue){
	$prosql  = "select ProName from profession where ProValue = '".$ProValue."'";
	$profession = fetchOne($prosql);
	return $profession['ProName'];
}
//发布帖子
function myPost(){
	$arr=$_POST;
	if(isset($_SESSION['uID'])){
		$arr['uID']=$_SESSION['uID'];
	}else{
		$mes = "请先登录！";
		return $mes;
	}
	$path="./forumImg/uploads";
	$uploadFiles=uploadFile($path);
	$arr['themeImage']=$uploadFiles;
	if(insert("post", $arr)){
		$mes="发表成功!";
	}else{
		$mes="发表失败!";
		print_r($arr);
	}
	return $mes;
}
//删除帖子
function delPost($pID){
	$where="pID={$pID}";
	if(delete("post",$where)&&delete("review",$where)){
		$mes = "删除成功！";
	}else{
		$mes = "删除失败！";
	}
}

//关闭帖子

//发布评论
function myReview($pID){
	$arr=$_POST;
	if(isset($_SESSION['uID'])){
		$arr['uID']=$_SESSION['uID'];
	}else{
		$mes = "请先登录！";
		return $mes;
	}
	$arr['pID']=$pID;
	//取上一层
	$floorSql="select rFloor from review where pID = {$pID} order by rFloor desc";
	$reviewFloor = fetchOne($floorSql);
	$rFloor=$reviewFloor['rFloor']+1;
	$arr['rFloor']=$rFloor;

	$path="./forumImg/uploads";
	$uploadFiles=uploadFile($path);
	$arr['imagePath']=$uploadFiles;
	if(insert("review", $arr)){
		$mes="评论成功!";
	}else{
		$mes="评论失败!";
	}
	
	//更新帖子回复数
	$numSql="select * from review where pID = {$pID}";
	$postArr['reCount']=getResultNum($numSql);
	update('post',$postArr,'pID='.$pID);

	return $mes;
}
//删除评论
function delReview($rID){
	$where="rID={$rID}";
	if(delete("review",$where)){
		$mes = "删除成功！";
	}else{
		$mes = "删除失败！";
	}
}




