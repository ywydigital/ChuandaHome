<?php 
include "../../lib/Yiqiba.php";
include "../../lib/functions.php";
include "../../lib/User.php";
init();
?>
<html>
<head>
<meta charset="utf-8">
<title>一起吧</title>
<link rel="stylesheet" href="css/css.css" type="text/css">
<script type="text/javascript">
function chkSrh(){
	var testTime=/^201\d-\d{1,2}-\d{1,2}$/;
	var srhTime=document.getElementById('srhTime');
	if(srhTime.value.length>0 && testTime.test(srhTime.value)==false){alert("请输入正确的日期：如xxxx-yy-dd");return false;}
	return true;
}
function ivtChk(){
	var fff = <?php 
		if(isset($_SESSION['uid'])) echo 1;
		else echo 0;
	?>;
	if(fff == 0) {alert("请先登录");return false;}
	
	var tmp = document.getElementById('head-line');
	if(tmp.value.length == 0) {alert("请输入标题");return false;}
	var srhTime=document.getElementById('ivtDate');
	var testTime=/^201\d-\d{1,2}-\d{1,2}$/;
	if(testTime.test(srhTime.value)==false){alert("请输入正确的日期：如xxxx-yy-dd");return false;}
	var tmp = document.getElementById('ivtPlace');
	if(tmp.value.length == 0) {alert("请输入地点");return false;}
	var tmp = document.getElementById('ivtEvent');
	if(tmp.value.length == 0) {alert("请输入事件");return false;}
	var tmp = document.getElementById('body-line');
	if(tmp.value.length == 0) {alert("请输入描述");return false;}
	return true;
}
</script>

</head>
<body>
<div id="header">
	 <div id="menu-primary" >
     	<div class="menu">
        	<ul id="menu-primary-items" >  
              <li class="line1"><a href="../index/login.php">首页</a></li>
            	<li><a href="../user_index/user_index.php">个人主页</a></li>
              <li><a href="../yiqiba/yiqiba.php">一起吧</a></li>
              <li><a href="../jiaoyipindao/jiaoyipindao.php">交易频道</a></li>
              <li><a href="../ziyuan/ziyuan.php">资源</a></li>
<?php 
	if(isset($_SESSION['nickname']))	echo '<li><a href="../../transaction/yiqiba/logout.php">退出登录</a></li>';
	else echo '<li><a href="../../public_files/index/login.php">登录</a></li>';
?>
          	</ul>
      	</div>
 	</div>
</div>       
<div id="head">
	<span id="headline">一 起 吧！</span>
</div>
<div id="menu1">
	<div id="line1"><a href="javascript:;"></div>
    <div id="line2"><a href="javascript:;"></div>
    <div id="line3"><a href="javascript:;"></div>
    <div id="line4"><a href="javascript:;"></div>
    <div id="menu2" style="display:block">
<?php 
	$everpage = 7;
	
	$info['yiqiba_time'] = (isset($_POST['yiqiba_time'])) ? $_POST['yiqiba_time'] : "";
	$info['yiqiba_event'] = (isset($_POST['yiqiba_event'])) ? $_POST['yiqiba_event'] : "";
	$info['yiqiba_place'] = (isset($_POST['yiqiba_place'])) ? $_POST['yiqiba_place'] : "";
	if(isset($_POST['pages'])) $off = $everpage*($_POST['pages']-1);
	else $off = 0;
	$ans = Yiqiba::selectFromMysql($info,$GLOBALS['DB'],$off,$everpage);
	$aaa = $ans;
	
	for($i=0;$i<$ans['cnt'];$i++){
	$ff = $ans[$i];
	
	$ff['event'] = Yiqiba::mySubstr($ff['event'],10);
	$ff['descr'] = Yiqiba::mySubstr($ff['descr'],250);
	$ff['place'] = Yiqiba::mySubstr($ff['place'],17);
	$nickname = User::getNickname($ff['uid'], $GLOBALS['DB']);
	
	$headImg = $ff['uid'];
    if(!file_exists("../../image/headphoto/$headImg.jpg"))
		$headImg = 0;
    
	$html = <<<TMP
	<ul id="content">
            	<a id="cta" href="sublink/sublink.php?eid=$ff[event_id]" title="$ff[event]">$ff[event]</a>
                <div id="time1"style="
    width: 169px;
">日期:$ff[date]</div>
                <div id="place1" style="
    width: 159px;
">地点:$ff[place]</div>
                <div id="action1" style="
    width: 183px;
">活动:$ff[event]</div>
                <div id="name1">$nickname[nickname]</div>
                <div id="avatar1"> <img src="../../image/headphoto/$headImg.jpg" width=80 height=80> </div>
                <form>
                	<input type="button" class="inputTmp3" id="coversation1" value="发送消息" onClick="openChat$ff[uid]()">
                </form>
                
                <div id="introduce1">$ff[descr]</div>
        </ul>		
TMP;
	echo $html;
	}
?>
        <div id="page-turn" >
        <font size=5px color=black style="position:relative;
top: 7px;
left: 10px;">翻页:</font>
        <form action="yiqiba.php" method="post">
<?php 
	$tot = $ans['tot'];
	$cnt = ceil($tot/$everpage);
	for($i=1;$i<=$cnt;$i++){
		$html =<<<TMP
		<div> <input type="submit" class="inputTmp2"
		name="pages" value="$i"/></div>
TMP;
		echo $html;
	}
?>
    	</form></div>
        <div id="tail">
			<div id="head-text">发出邀请</div>
    			<form action="../../transaction/yiqiba/new_event.php" method="post" onsubmit="return ivtChk()">
          		  <input id="head-line" name="title" type="text" value="请输入主题">
                  <p id="send1"style="
    width: 222px;
">日期：<input id="ivtDate" type="text" name="date"></p>
                  <p id="send2"style="
    width: 222px;
">地点：<input id="ivtPlace" type="text" name="place"></p>
                  <p id="send3"style="
    width: 222px;
">事件：<input id="ivtEvent" type="text" name="event"></p>
           		  <textarea id="body-line" name="descr"></textarea>
          		  <input  class="inputTmp"  id="tail-line" type="submit" value="发表">
       		 	</form>
		</div>
 	</div>
</div>

<form action="yiqiba.php" method="post"  onsubmit="return chkSrh()">
    <p id="search1" style="
    width: 164px;
"><font size="4px" color="black">日期:</font><input id="srhTime" style="border-radius: 15px;border:1px solid;width:120px;height:22px" type="text" name="yiqiba_time"></p>
    <p id="search2"style="
    width: 164px;
"><font size="4px" color="black">地点:</font><input id="srhPlace" style="border-radius: 15px;border:1px solid;width:120px;height:22px"  type="text" name="yiqiba_place"></p>
    <p id="search3"style="
    width: 164px;
"><font size="4px" color="black">事件:</font><input id="srhEvent" style="border-radius: 15px;border:1px solid;width:120px;height:22px"  type="text" name="yiqiba_event"></p>
    <input type="submit" class="inputTmp4" id="search4" value="搜索" style="width:50px;height:30px">
</form>

<?php 

$ans = $aaa;
for($i=0;$i<$ans['cnt'];$i++){
	$ff = $ans[$i];
	$html=<<<TMP
<div id="chat$ff[uid]" style="
	position:fixed;
	display:none;
	width:360px;
	height:440px;
	border:1px solid #888; 
	background-color:#FFF; 
	z-index:99999;
	bottom:10px;
	right:10px;">
    <iframe src="sublink/huihua2.php?uid=$ff[uid]" frameBorder=0 marginwidth=0 marginheight=0 scrolling="yes" style="width:360px;height:440px;"  ALLOWTRANSPARENCY="true"></iframe>
    <div id="close0" onClick="closeChat$ff[uid]()"></div>
</div>
TMP;
	echo $html;
}
?>
<div id="win">
	<form>
    	<input id="check1" type="text" value="请输入你的账号" onFocus="this.value=''">
        <input id="check2" type="text" value="请输入你的密码" onFocus="this.value=''">
        <input type="submit" id="check3" value="登陆" onClick="closeLogin()">
        <input type="submit" id="register" value="注册">
    </form>
    <div id="close" onClick="closeLogin()"><div>
</div>
</body>
</html>

<script type="text/javascript">
<?php 
$ans = $aaa;
for($i=0;$i<$ans['cnt'];$i++){
	$ff = $ans[$i];
	$html =<<<TMP
function openChat$ff[uid]()
{
	document.getElementById("chat$ff[uid]").style.display="block";
}
function closeChat$ff[uid]()
{
	document.getElementById("chat$ff[uid]").style.display="none";
}
TMP;
	echo $html;
}
?>
</script>
