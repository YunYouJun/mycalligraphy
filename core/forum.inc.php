<?php
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
	$sql="select * from post limit {$offset},{$pageSize}";
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
	$sql="select * from review where pID = {$pID} limit {$offset},{$pageSize}";
	$rows=fetchAll($sql);
	return $rows;
}

function getUserInfo($uID){
	$usersql = 'select * from userinfo where uID ="'.$uID.'"';
	$userinfo = fetchOne($usersql);
	return $userinfo;
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

//发布评论/帖子
function myreview(){
	$arr=$_POST;
	print_r($arr);
	if(isset($_SESSION['uID'])){
		$arr['uID']=$_SESSION['uID'];
	}else{
		$mes = "请先登录！";
		return $mes;
	}
	$path="./forumImg/uploads";
	$uploadFiles=uploadFile($path);
	$arr['imagePath']=$uploadFiles;
	$arr['pID']=$_REQUEST['pID'];
	if(insert("review", $arr)){
		$mes="评论成功!";
	}else{
		$mes="评论失败!";
	}
	
	echo $_SESSION['uID'];
	return $mes;
}

function mypost(){
	
}
