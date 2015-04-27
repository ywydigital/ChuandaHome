<?php 
include '../../../lib/functions.php';
init();
include '../../../lib/Jiaoyi.php';

if(!isset($_GET['type'])){
	$_GET['type'] = "book";
}
if($_GET['type']!='book' && $_GET['type']!='sport'
&& $_GET['type']!='elec'&& $_GET['type']!='day'){
	$_GET['type'] = "book";
}

?>

<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" href="../css/style1.css" type="text/css">
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
<?php 
	$html =<<<TMP
	<form action="search.php" method="GET">	
TMP;
	echo $html;
?>
		<input type="text" id="kw" maxlength="100" autocomplete="off" name="key">
    	<input type="submit" value="搜索" id="su">
	</form>
	<form action="subpage.php" method="get">
		<input type="hidden" name="type" value="<?php echo $_GET['type'];?>">
    	<input type="submit" value="随便看看" id="pu">
    	</form>
</div>
<div id="frame">
	<ul class="IndexPost-Title-Bg">
<?php 
$everypage = 7;
$items = findItemByRandAndType($everypage, $GLOBALS['DB'], $_GET['type']);

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
<div id="all">
	<a href="chakanquanbu.php"><font size="4px" color="red"><b>查看全部</b></font></a>
</div>
</body>
</html>
