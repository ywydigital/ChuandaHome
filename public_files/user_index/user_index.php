<?php 
include "../../lib/functions.php";
init();
include "../../lib/User.php";
if(!isset($_SESSION['nickname']))
	header("Location: ../index/login.php?words='请登录'");
	
	
$label = User::labelsLoad($_SESSION['uid'],$GLOBALS['DB']);
?>
<html> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>个人主页</title>
	<link rel="stylesheet" href="css/css.css" type="text/css" />
	<script type="text/javascript">
	var number=<?php echo $label['tot'] + 1;?>;

	function inputFresh(){
		history.go(0);
	}
	
	    window.onload=function ()
		{
			var odiv=document.getElementById('header1');
			var obtn=document.getElementsByTagName('input');
			var adiv=odiv.getElementsByTagName('div');
			for(var i=0;i<4;i++)
			{
				obtn[i].index=i;
				obtn[i].onclick=function ()
			    {
					for(var i=0;i<4;i++)
					{
						adiv[i].style.display='none';
					}
					adiv[this.index].style.display='block';
				};
			}
		};
	</script>
</head>
<body bgcolor="black">
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
	else echo '<li><a href="../../public_files/user_login/user_login.php">登录</a></li>';
?>
          </ul>
         </div>
      </div>
     </div>     
<?php 
echo "<font size=10px style='position:relative;left:20;top:20'>Hllo! ";
echo $_SESSION['nickname'];
echo "</font>";
?>
     <div id="touxiang">
        <img id="tupian1" src="<?php 
        	if(file_exists("../../image/headphoto/$_SESSION[uid].jpg"))
        		echo "../../image/headphoto/$_SESSION[uid].jpg";
        	else echo "../../image/headphoto/0.jpg";
        ?>"/>
     </div>
     <div id="header1">
           <input id="line6" type="button" style="
    margin-bottom: 5px;
    margin-top: 5px;
" value="最近消息" />
           <input id="line1" type="button"style="
    margin-bottom: 5px;
    margin-top: 5px;
" value="修改头像" />
           <input id="line2" type="button"style="
    margin-bottom: 5px;
    margin-top: 5px;
" value="修改密码" />
           <input id="line3" type="button"style="
    margin-bottom: 5px;
    margin-top: 5px;
" value="修改资料" />
           
           <div style="display:block">
       <iframe height=500px width=850px frameborder=0 src="user_message/user_message.php">
       </iframe>
           </div>
           
           <div>
           	<form action="../../transaction/user_index/headphoto.php" method="post" enctype="multipart/form-data">
           <center>
           		&nbsp<p><p><p>
           		<font size=5px color="black"> 请在下面提交你的新头像</font><p>
           		<input id="tmp" type="file" name="headphoto"/><p>
           		<font size=4px color="black"> 支持jpg/pnj/gif,长宽比在600*600内</font><p>
           		<input onclick="inputFresh()" style="width:80" class="inputTmp" type="submit" name="submit" value="提交"/> </center>
           	</form>
           </div>
           <div id="tishi2"><form action="<?php echo "../../transaction/user_index/new_password.php"; ?>" method="post">
               &nbsp<p>
               <p><font size=5px color="black">输入新密码 : </font><input id="tmp" type="password" style="border:0px;height:32px; width:300px" name="fname1"/></p><br>
               <p><font size=5px color="black">确认新密码 : </font><input id="tmp" type="password" style="border:0px;height:32px; width:300px" name="fname2"/></p><br>
               <input class="inputTmp" id="tijiao2" style="position:relative;left:90px;top:20px;width:60px;height:40px" name="submit" type="submit" value="提交">
           </form>
           </div>
           
           <div id="tishi3"><form action="<?php echo "../../transaction/user_index/new_data.php"; ?>" method="post">
               <font size=4px color="black">
               <p>昵称: <input id="tmp" style="border:0px;height:20px" type="text" name="nickname" value="<?php echo $_SESSION['nickname'];?>"/></p>
               <p>性别: 
                <select name="sex">
<?php 
$tmp[0] = '<option  value="male">男</option>';
$tmp[1] = '<option value="female">女</option>';
$tmp[2] = '<option  value="">秘密</option>';
if($_SESSION['sex'] == "male") {echo $tmp[0];$tmp[0]="";};
if($_SESSION['sex'] == "female") {echo $tmp[1];$tmp[1]="";};
if($_SESSION['sex'] == "") {echo $tmp[2];$tmp[2]="";};
for($i=0;$i<3;$i++)	echo $tmp[$i];
?>
                </select>
			   </p>
 <p>入学年份:<select name="year">
<?php 
$years_now = date("Y");

	$year=$_SESSION['entrance_year'];
	echo "<option value='1'>$year</option>";
	for($j=$years_now;$j>=1980;$j--)
	echo "<option value='$j'>$j</option>";
?>
 </select><span>年</span>
 </p>
  <p>手机: <input id="tmp" style="border:0px;height:20px" type="text" name="tel" value="<?php echo $_SESSION['phone']; ?>"/></p>
  <p>QQ: <input id="tmp" style="border:0px;height:20px" type="text" name="_qq" value="<?php echo $_SESSION['qq']; ?>"/></p>
  <p>寝室地址: <input id="tmp" style="border:0px;height:20px" type="text" name="adr" value="<?php echo $_SESSION['apartment']; ?>"/></p>
  <p>性取向:  
   <select name="xing">
<?php   
	$tmp[0]='<option label="secret" value="secret">secret..</option>';
    $tmp[1]='<option label="both" value="both">双性</option>';
    $tmp[2]='<option label="male" value="male">男</option>';
    $tmp[3]='<option label="female" value="female">女</option>';
    if($_SESSION['xinquxiang']=="secret") {echo $tmp[0];$tmp[0]="";}
    if($_SESSION['xinquxiang']=="both") {echo $tmp[1];$tmp[1]="";}
    if($_SESSION['xinquxiang']=="male") {echo $tmp[2];$tmp[2]="";}
    if($_SESSION['xinquxiang']=="female") {echo $tmp[3];$tmp[3]="";}
    for($i=0;$i<4;$i++) echo $tmp[$i];
    ?>
   </select>
  </p>
  <input class="inputTmp" style="width:70px;position:relative;left: 89px;
top: 20px;"  id="tijiao3" name="submit" type="submit" value="提交" /></font>
  </form>
 </div>
 
      </div>  
</body>
</html>