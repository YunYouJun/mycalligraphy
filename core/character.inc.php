<?php
function getCharacterInfo($keyword){
	if($keyword){
		$sql = "select * from hanziexp where label ='".$keyword."'";
		$result = fetchOne($sql);
		if($result){
			return $result;
		}else{
			echo "<script type='text/javascript'>";
			echo "alert('词库不存在该字！转为百度汉语查询！');";
			echo "window.open('http://hanyu.baidu.com/s?wd={$keyword}','_blank');";
			echo "window.history.back();</script>";
		}
	}else{
		echo "<script type='text/javascript'>";
		echo "window.location.href='character.php';";
		echo "</script>";
	}
}

function getCharacterByPage($page,$pageSize=2){
	$sql="select * from hanziexp";
	global $totalRows;
	$totalRows=getResultNum($sql);
	global $totalPage;
	$totalPage=ceil($totalRows/$pageSize);
	if($page<1||$page==null||!is_numeric($page)){
		$page=1;
	}
	if($page>=$totalPage)$page=$totalPage;
	$offset=($page-1)*$pageSize;
	$sql="select * from hanziexp limit {$offset},{$pageSize}";
	$rows=fetchAll($sql);
	return $rows;
}