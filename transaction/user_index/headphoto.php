<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
include '../../lib/functions.php';
init();

if(!isset($_POST['submit'])) {
	die('没有提交，请重试');
}

if($_FILES['headphoto']['error'] != UPLOAD_ERR_OK){
	die("上传失败，请重试 orz ...");
}

list($height,$width,$type,$attr) = getimagesize($_FILES['headphoto']['tmp_name']);

if($height>600 || $width>600){
	die("The picture is too large!");
}

switch ($type){
	case IMAGETYPE_GIF:
		$ext = '.gif';
		break;
	case IMAGETYPE_JPEG:
		$ext = '.jpg';
		break;
	case IMAGETYPE_PNG:
		$ext = '.png';
		break;
	default:
		die("文件格式不对");
}

$dir="../../image/headphoto/$_SESSION[uid].jpg";
move_uploaded_file($_FILES['headphoto']['tmp_name'], $dir);

header("location: ../../public_files/user_index/user_index.php");
?>