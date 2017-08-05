<?php
function getIsCollected($pID){
	$where = "uID='".@$_SESSION['uID']."' and pID = '".$pID."'";
	$sql = "select * from collect where ".$where;
	if(fetchOne($sql)){
		return true;
	}else{
		return false;
	}
}

function isTop($pID){
	$sql = "select * from post where pID='".$pID."'";
	$result = fetchOne($sql);
	if($result['isTop']){
		$arr['isTop'] = 0;
	}else{
		$arr['isTop'] = 1;
	}
	if(update('post',$arr,'pID='.$pID)){
		echo '{"success":"操作成功"}' ;
		return;
	}else{
		$mes = "操作失败";
	}
	return $mes;
}

function isGood($pID){
	$sql = "select * from post where pID='".$pID."'";
	$result = fetchOne($sql);
	if($result['isGood']){
		$arr['isGood'] = 0;
	}else{
		$arr['isGood'] = 1;
	}
	if(update('post',$arr,'pID='.$pID)){
		echo '{"success":"操作成功"}' ;
		return;
	}else{
		$mes = "操作失败";
	}
	return $mes;
}

function isCollected($pID){
	$where = "uID='".$_SESSION['uID']."' and pID = '".$pID."'";
	$sql = "select * from collect where ".$where;
	if(fetchOne($sql)){
		delete('collect',$where);
		echo '{"success":"取消收藏成功"}' ;
	}else{
		$arr['uID'] = $_SESSION['uID'];
		$arr['pID'] = $pID;
		insert('collect',$arr);
		echo '{"success":"收藏成功"}' ;
	}
	return;
}

function isClosed($pID){
	$sql = "select * from post where pID='".$pID."'";
	$result = fetchOne($sql);
	if($result['isClosed']){
		$arr['isClosed'] = 0;
	}else{
		$arr['isClosed'] = 1;
	}
	if(update('post',$arr,'pID='.$pID)){
		echo '{"success":"操作成功"}' ;
		return;
	}else{
		$mes = "操作失败";
	}
	return $mes;
}

function givePraise($rID){
	$sql = "select * from review where rID='".$rID."'";
	$result = fetchOne($sql);

	$praise['uID']=$_SESSION['uID'];
	$praise['rID']=$rID;
	insert('r_praise',$praise);

	$arr['praiseCount'] = $result['praiseCount']+1;
	if(update('review',$arr,'rID='.$rID)){
		echo '{"success":"操作成功"}' ;
		return;
	}else{
		$mes = "操作失败";
	}
	return $mes;
}
function givePostPraise($pID){
	$sql = "select * from post where rID='".$rID."'";
	$result = fetchOne($sql);

	$praise['uID']=$_SESSION['uID'];
	$praise['pID']=$pID;
	insert('p_praise',$praise);

	$arr['praiseCount'] = $result['praiseCount']+1;
	if(update('post',$arr,'pID='.$pID)){
		echo '{"success":"操作成功"}' ;
		return;
	}else{
		$mes = "操作失败";
	}
	return $mes;
}
function withPostdraw($pID){
	$sql = "select * from post where pID='".$pID."'";
	$result = fetchOne($sql);

	$where = "uID='".$_SESSION['uID']."' and pID = '".$pID."'";
	delete('p_praise',$where);

	$arr['praiseCount'] = $result['praiseCount']-1;
	if(update('post',$arr,'pID='.$pID)){
		echo '{"success":"操作成功"}' ;
		return;
	}else{
		$mes = "操作失败";
	}
	return $mes;
}
function withdraw($rID){
	$sql = "select * from review where rID='".$rID."'";
	$result = fetchOne($sql);

	$where = "uID='".$_SESSION['uID']."' and rID = '".$rID."'";
	delete('r_praise',$where);

	$arr['praiseCount'] = $result['praiseCount']-1;
	if(update('review',$arr,'rID='.$rID)){
		echo '{"success":"操作成功"}' ;
		return;
	}else{
		$mes = "操作失败";
	}
	return $mes;
}

function getIsPraised($rID){
	$where = "uID='".@$_SESSION['uID']."' and rID = '".$rID."'";
	$sql = "select * from r_praise where ".$where;
	if(fetchOne($sql)){
		return true;
	}else{
		return false;
	}
}

function getPostIsPraised($pID){
	$where = "uID='".$_SESSION['uID']."' and pID = '".$pID."'";
	$sql = "select * from p_praise where ".$where;
	if(fetchOne($sql)){
		return true;
	}else{
		return false;
	}
}

function reportPost($pID,$reportInfo){
	$report['uID']=$_SESSION['uID'];
	$report['pID']=$pID;
	$report['reportInfo']=$reportInfo;
	if(myinsert('reportpost',$report)){
		$mes="举报成功";
		$where = "pID = '".$pID."'"; 
		$sql = "select * from post where ".$where;
		$result = fetchOne($sql);
		$arr['reportCount']= $result['reportCount']+1;
		if(update('post',$arr,$where)){
			echo '{"success":"举报成功!"}' ;
		}else{
			echo '{"success":"举报失败!"}' ;
		}
	}else{
		echo '{"success":"举报失败，已经举报过了哦！"}' ;
	}
	//return $mes;
}