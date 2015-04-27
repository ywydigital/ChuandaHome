<?php

function findItemByRandAndType($cnt, $db, $type){
	if($type == 'book') $type = '书籍';
	else if($type == 'sport') $type = '体育用品';
	else if($type == 'elec') $type = '电子数码';
	else if($type == 'day') $type = '生活用品';
	
	$query = "SELECT * from jiaoyi_item where type='$type' order by rand() limit $cnt";
	$result = mysql_query($query, $db) or die(mysql_error($GLOBALS['DB']));;
	
	$row['tot'] = mysql_num_rows($result);
	$tmp = 0;
	for($i=0;$i<$cnt;$i++){
		if($row[$tmp] = mysql_fetch_assoc($result))	$tmp ++ ;
		else break;
	}
	$row['cnt'] = $tmp;
	return $row;
}

function findTotByUid($uid, $db){
	$query = "SELECT id from jiaoyi_item where uid = $uid";
	$result = mysql_query($query, $db);
	return mysql_num_rows($result);
}

function findTot($db){
	$query = "SELECT id from jiaoyi_item where 1";
	$result = mysql_query($query, $db);
	return mysql_num_rows($result);
}

function findTotBySearch($db, $key){
	$key = mysql_escape_string($key);
	$query = "SELECT id from jiaoyi_item where descr like '%$key%' or name like '%$key%'";
	$result = mysql_query($query, $db);
	return mysql_num_rows($result);
}

function findItemsBySearch($db, $off, $cnt, $key){
	$key = mysql_escape_string($key);
	$query = "SELECT * from jiaoyi_item where descr like '%$key%' or name like '%$key%' ORDER BY date DESC";
	$result = mysql_query($query, $db) or die(mysql_error());

	$row['tot'] = mysql_num_rows($result);

	for($i=0;$i<$off;$i++) mysql_fetch_assoc($result);
	$tmp = 0;
	for($i=0;$i<$cnt;$i++){
		if($row[$tmp] = mysql_fetch_assoc($result))	$tmp ++ ;
		else break;
	}
	$row['cnt'] = $tmp;
	return $row;
}

function findItemByUid($uid, $db, $off, $cnt){
	$query = "SELECT * from jiaoyi_item where uid = $uid ORDER BY date DESC";
	$result = mysql_query($query, $db);

	$row['tot'] = mysql_num_rows($result);

	for($i=0;$i<$off;$i++) mysql_fetch_assoc($result);
	$tmp = 0;
	for($i=0;$i<$cnt;$i++){
		if($row[$tmp] = mysql_fetch_assoc($result))	$tmp ++ ;
		else break;
	}
	$row['cnt'] = $tmp;
	return $row;
}

function findItems($db, $off, $cnt){
	$query = "SELECT * from jiaoyi_item where 1 ORDER BY date DESC";
	$result = mysql_query($query, $db);

	$row['tot'] = mysql_num_rows($result);

	for($i=0;$i<$off;$i++) mysql_fetch_assoc($result);
	$tmp = 0;
	for($i=0;$i<$cnt;$i++){
		if($row[$tmp] = mysql_fetch_assoc($result))	$tmp ++ ;
		else break;
	}
	$row['cnt'] = $tmp;
	return $row;
}

function upload(){
	if($_POST['type'] == '...'){
		echo "请填写物品类型";
	}else if(!isset($_POST['name']) || $_POST['name'] == ""){
		echo "请填写物品名称";
	}else if(!isset($_POST['contact']) || $_POST['contact'] == ""){
		echo "请填写联系方式";
	}else if(!isset($_POST['descr']) || $_POST['descr'] == ""){
		echo "请填写物品描述";
	}else if($_FILES['img']['error'] != UPLOAD_ERR_OK){
		echo "上传失败，请重试 orz ...";
	}else{
		list($height,$width,$type,$attr) = getimagesize($_FILES['img']['tmp_name']);

		if(0){
		}else{
			$len = strlen($_FILES['img']['tmp_name']);
			$dir = substr($_FILES['img']['tmp_name'], $len - 8);
			$dir = "../images/$dir.jpg";
			move_uploaded_file($_FILES['img']['tmp_name'], $dir);
		}

		$type = mysql_escape_string($_POST['type']);
		$name = mysql_escape_string($_POST['name']);
		$contact = mysql_escape_string($_POST['contact']);
		$descr = mysql_escape_string($_POST['descr']);
		$img = mysql_escape_string($dir);
		$query = "INSERT INTO jiaoyi_item values
	(null, NOW(), '$name', '$descr', '$_SESSION[uid]', '$img', '$contact', '$type')";
		mysql_query($query, $GLOBALS['DB']);
	}
}
?>