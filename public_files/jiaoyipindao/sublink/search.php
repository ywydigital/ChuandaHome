<?php
include '../../../lib/functions.php';
init();
include '../../../lib/Jiaoyi.php';

if(!isset($_GET['key'])){
	$_GET['key'] = "";
}
?>


<html>
<head>
<meta charset="utf-8">
<title>我的物品区</title>
<link rel="stylesheet" href="../css/style2.css" type="text/css">
<style>
body { font-family:Arial; background:#C1C8F7;}
</style>
</head>

<body>
<div id="header">
	<div id="menu-primary" >
		<div class="menu">
           	<ul id="menu-primary-items" >  
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

<div id="hello">
	<form action="search.php" method="GET">
	<input type="text" name="key" id="kw" maxlength="100" autocomplete="off">
    <input type="submit" value="搜索" id="su">
	</form>
</div>

<div id="frame">
	<ul class="IndexPost-Title-Bg">
<?php
$everypage = 14;
$tot = findTotBySearch($GLOBALS['DB'], $_GET['key']);
if($tot == 0){
	echo "<h1>&nbsp&nbsp&nbsp&nbsp还没有任何物品:(</h1>";
	die();
}

$buttomNum = $tot / $everypage;
if($tot % $everypage != 0) $buttomNum ++;
$buttomNum = floor($buttomNum);
if(isset($_GET['page']))
	$page = $_GET['page'];
else $page = 0;

$items = findItemsBySearch($GLOBALS['DB'], $everypage*$page, $everypage , $_GET['key']);
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
<div id="haha">
<?php 
for($i=0;$i<$buttomNum;$i++){
	$ii = $i+1;
	echo "<li>
	<a href='./search.php?page=$i'>$ii</a>
	</li>";
}
?>
</div>
</body>
</html>
