<?php 
include "../../../lib/Yiqiba.php";
include "../../../lib/functions.php";
include "../../../lib/User.php";
init();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" href="css/css.css" type="text/css"> 
</head>

<body>
<div id="header">
	 <div id="menu-primary" >
     	<div class="menu">
        	<ul id="menu-primary-items" >  
	<li class="line1"><a href="/ChuanDaHome/public_files/index.html">首页</a></li>
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

	$ff = Yiqiba::selectFromMysqlByEid($GLOBALS['DB'], $_GET['eid']);
?>
<div id="framework">
	<div id="head">
		<div id="avatar"></div>
		<span id="headline">一 起 吧！</span>
	</div>
    <div id="topic"> <span id="word">主题&nbsp&nbsp&nbsp&nbsp<?php echo $ff['event'];?></span>
     <div>
   	<ul id="reply">
<?php 
	
	$tmp = User::getNickname($ff['uid'],$GLOBALS['DB']);
	$headImg = $ff['uid'];
    if(!file_exists("../../../image/headphoto/$headImg.jpg"))
		$headImg = 0;
	$html = <<<TMP
	<li>
      <div id="avatar1"> <img src="../../../image/headphoto/$headImg.jpg" width=80 height=80> </div>
      <div id="username1">$tmp[nickname]</div>
      <div id="content1">
	<b>时间:</b>$ff[date] &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
	<b>地点:</b>$ff[place]<p>
	<b>活动安排:<br></b>$ff[descr]
TMP;
	
	echo $html;
	if(strlen($ff['descr']) < 150){
		for($j=0;$j<5;$j++) echo "<br>";
	}
	echo "
<p>
	</div>
    </li>";

?>
<?php 
	$everpage = 6;
	if(isset($_POST['pages'])) $off = $everpage*($_POST['pages']-1);
	else $off = 0;
	$ans = Yiqiba::selectReply($_GET['eid'],$GLOBALS['DB'],$off,$everpage);
	for($i=0;$i<$ans['cnt'];$i++){
	$ff = $ans[$i];
//	$ff['reply'] = Yiqiba::mySubstr($ff['reply'],210);
	$tmp = User::getNickname($ff['uid'],$GLOBALS['DB']);
	
	$headImg = $ff['uid'];
    if(!file_exists("../../../image/headphoto/$headImg.jpg"))
		$headImg = 0;
	
	$html = <<<TMP
	<li>
      <div id="avatar1"> <img src="../../../image/headphoto/$headImg.jpg" width=80 height=80> </div>
      <div id="username1">$tmp[nickname]</div>
      <div id="content1">$ff[reply]
TMP;
	echo $html;
	if(strlen($ff['reply']) < 250){
		for($j=0;$j<5;$j++) echo "<br>";
	}
	echo "
 </div>
    </li>";
	}
?>
       	
    </ul>
</div> 


    <div id="page-turn" >
        <font size=5px color=black style="position:relative;
top: 7px;
left: 10px;">翻页:</font>
<form action="sublink.php?eid=<?php echo $_GET['eid'];?>" method="post">
<?php 
	$tot = $ans['tot'];
	$cnt = ceil($tot/$everpage);
	for($i=1;$i<=$cnt;$i++){
		$html =<<<TMP
		<div> <input type="submit" class="inputTmp2" name="pages" value="$i"/></div>
TMP;
		echo $html;
	}
?>
   	</form></div>
    <div id="release">
    	<div id="haha">发表回复</div>
        <form action="../../../transaction/yiqiba/sub/sublink.php" method="post">
            <textarea id="hehe" name="reply"></textarea>
            <input type="hidden" name="eid" value='<?php echo $_GET['eid'];?>'/>
            <input id="xixi" type="submit" class="inputTmp" value="回复"/>
        </form>
    </div>
</body>
</html>
