<?php
include '../../../lib/functions.php';
init();
include '../../../lib/Jiaoyi.php';
include "../../../lib/User.php";
if(!isset($_SESSION['nickname']))
	header("Location: ../../index/login.php?words='请登录'");
?>

<?php 
?>

<?php
if(isset($_POST['upload'])){
	upload();
}
?>

<html>
<head>
<meta charset="utf-8">
<title>我的物品区</title>
<link rel="stylesheet" href="../css/style2.css" type="text/css">
<style>
body {
	font-family: Arial;
	background: #C1C8F7;
}
</style>
</head>

<body>
<div id="header">
<div id="menu-primary">
<div class="menu">
<ul id="menu-primary-items">
	<li class="line1"><a href="../../index/login.php">首页</a></li>
	<li><a href="/ChuanDaHome/public_files/user_index/user_index.php">个人主页</a></li>
	<li><a href="/ChuanDaHome/public_files/yiqiba/yiqiba.php">一起吧</a></li>
	<li><a href="/ChuanDaHome/public_files/jiaoyipindao/jiaoyipindao.php">交易频道</a></li>
	<li><a href="/ChuanDaHome/public_files/ziyuan/ziyuan.php">资源</a></li>
	<?php
	if(isset($_SESSION['nickname']))	echo '<li><a href="/ChuanDaHome/transaction/yiqiba/logout.php">退出登录</a></li>';
	else echo '<li><a href="/ChuanDaHome/public_files/index/login.php">登录</a></li>';
	?>
</ul>
</div>
</div>
</div>

<?php
if(!isset($_SESSION['uid']))
	header("Location: ../../index/login.php?words='请登录'");
?>

<form action="#" method="post" enctype="multipart/form-data">
<p id="l1">类型:<select name="type">
	<option label="...">...</option>
	<option label="书籍">书籍</option>
	<option label="体育用品">体育用品</option>
	<option label="电子数码">电子数码</option>
	<option label="生活用品">生活用品</option>
</select></p>
<p id="l2">名称:<input type="text" name="name"></p>
<p id="l3">联系电话:<input type="text" name="contact"></p>
<p id="l4">图片:<input type="file" name="img"></p>
<p id="l5"><textarea rows="3" cols="85" name="descr">请在此输入物品描述</textarea>
<input id="l6" type="submit" name="upload" value="提交">

</form>

<div id="framewd">
<ul class="IndexPost-Title-Bgwd">
<?php
$everypage = 6;
$tot = findTotByUid($_SESSION['uid'], $GLOBALS['DB']);
if($tot == 0){
	echo "<h1>&nbsp&nbsp&nbsp&nbsp你还没有任何物品:(</h1>";
	die();
}

$buttomNum = $tot / $everypage;
if($tot % $everypage != 0) $buttomNum ++;
$buttomNum = floor($buttomNum);
if(isset($_GET['page']))
	$page = $_GET['page'];
else $page = 0;

$items = findItemByUid($_SESSION['uid'], $GLOBALS['DB'], $everypage*$page, $everypage);
for($i=0;$i<$items['cnt'];$i++){
	$item = $items[$i];
	$html = <<<TMP
	<div id="zishu_test">
	<li><a target="_blank"><span>联系电话：$item[contact]<br>$item[descr]</span><img
		src="$item[img]" border='0' width='130' height='80'
		alt='$item[name]'>$item[name]</a></li>
	</div>	
TMP;
	echo $html;
}
?>
</ul>
</div>
<div id="hahawd">
<?php 
for($i=0;$i<$buttomNum;$i++){
	$ii = $i+1;
	echo "<li>
	<a href='./wodewupin.php?page=$i'>$ii</a>
	</li>";
}
?>
</div>
</body>
</html>
