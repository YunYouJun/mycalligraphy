<?php 
require_once '../include.php';
if(!isLogin()){
	// echo "<script type='text/javascript'>window.history.back();</script>";
	exit;
}
$act=$_REQUEST['act'];
$pID=$_REQUEST['pID'];
@$rID=$_REQUEST['rID'];
if($act==="isTop"){
	$mes=isTop($pID);
}elseif($act==="isGood"){
	$mes=isGood($pID);
}elseif($act==="isCollected"){
	$mes=isCollected($pID);
}elseif($act==="isClosed"){
	$mes=isClosed($pID);
}elseif($act==="givePraise"){
	$mes=givePraise($rID);
}elseif($act==="withdraw"){
	$mes=withdraw($rID);
}elseif($act==="givePostPraise"){
	$mes=givePostPraise($rID);
}elseif($act==="withPostdraw"){
	$mes=withPostdraw($rID);
}elseif($act==="reportPost"){
	$reportInfo=$_REQUEST['reportInfo'];
	$mes=reportPost($pID,$reportInfo);
}
if($mes){
	echo "<script type='text/javascript'>alert('".$mes."');</script>";
}
