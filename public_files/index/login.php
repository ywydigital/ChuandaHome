<?php 
include "../../lib/User.php";
include "../../lib/functions.php";
init();

if(isset($_POST["submit"])){
	User::getUser($_POST['username'],$_POST['password'],$GLOBALS['DB']);
	if(!isset($_SESSION['nickname'])){
		$_GET['words'] = "账户密码错误";
	}
	else{
	}
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登陆</title>
	<link rel="stylesheet" href="css/css.css" type="text/css" />
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}

a:link {color:#d0d0d0;text-decoration:none; font-weight:bold}    /* 未被访问的链接 */
a:visited {color:#d0d0d0;text-decoration:none; font-weight:bold}
a:hover {color:#ffffff;text-decoration:none;font-size:200%;}   /* 鼠标指针移动到链接上 */
a:active {color:#d0d0d0;text-decoration:none; font-weight:bold}

p.thick {font-weight: bold ;color:#d0d0d0;font-size:20px}


</style>
</head>

<body>

<div>
<table width="100%" height="700" background="images/bg_login.jpg" border="0">
<tr>

<td width="15%">
</td>
<td width="59%" >
  <table width="604" height="589" border="0">
    <tr><td height="24"></td></tr>
    <tr>
      <td width="513" height="10">
      <p class="thick"><font size=10px>访问以下板块：</font></p>
       </td>
    </tr>
    <tr>
    <td height="58">
        <a href="../yiqiba/yiqiba.php">一起吧</a> &nbsp&nbsp
        <a href="../jiaoyipindao/jiaoyipindao.php">交易频道</a>&nbsp&nbsp 
        <a href="../ziyuan/ziyuan.php">资源频道</a></td>
    </tr>
    <tr>
      <td height="228">&nbsp;</td>
    </tr>
    <tr>
      <td>
      </td>
    </tr>
  </table></td>
<td width="19%">
<div>

<?php 

if(isset($_GET['words']))
$words = $_GET['words'];
else $words = "";

if(!isset($_SESSION['nickname'])){
	$html =<<<TMP
	<font size=4px color=red>
	$words</font>
<form action="" method="post">

<p>账号<input type="text" name="username" style="background-color:#d0d0d0;border-style:none"/></p>
<p>密码<input type="password" name="password" style="background-color:#d0d0d0;border-style:none"/></p>
&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit"
	 style="border:none;background-image:url('images/dl.jpg');height:35px;width:70px" value="" name="submit"/>
&nbsp;&nbsp;
<a href="/ChuanDaHome/public_files/user_register/user_register.php" >
	<img border="0" src="images/zc.jpg" height=35/>
</a>

</form>
TMP;
	echo $html;
}else{
	echo "
     <div id='touxiang'>
        <img id='tupian1' src='";
        	if(file_exists("../../image/headphoto/$_SESSION[uid].jpg"))
        		echo "../../image/headphoto/$_SESSION[uid].jpg";
        	else echo "../../image/headphoto/0.jpg";
	echo " '></div><p>";
	echo "<font style='position:relative;left:39;top:-26' size=6px>你好, $_SESSION[nickname]</font>";
	echo "<p>";
	echo "<a href='../user_index/user_index.php' style='position:relative;left:39;top:-26'>个人主页</a> 
	&nbsp&nbsp&nbsp&nbsp&nbsp 
	<a style='position:relative;left:39;top:-26' href='../../transaction/yiqiba/logout.php'>退出登录</a> ";
}
?>
</div>
</td>
<td width="7%">
</td>

</tr>
</table>
</div>
</body>
</html>
