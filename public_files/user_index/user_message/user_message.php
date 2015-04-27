<?php 
include "../../../lib/functions.php";
init();
include "../../../lib/User_message.php";
include "../../../lib/User.php";
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head>
<body>
<form action="user_message_delete.php" method="post">
<font size="5px">
你的消息：</font><p>
<?php 
$flag = 0;

$message = getMessage($_SESSION['uid'], $GLOBALS['DB']);
if($message['cnt'] == 0){
	echo "你当前没有任何消息:(<p>";
}else{
	for($i=0;$i<$message['cnt'];$i++){
		$sender = User::getNickname($message[$i]['send_uid'], $GLOBALS['DB']);
		$sender = $sender['nickname'];
		$date = $message[$i]['date'];
		$content = $message[$i]['message'];
		$mid = $message[$i]['mid'];
		
		$cc = "rgb(163, 204, 241)";
		if($flag == 1) $cc = "transparent";
		
		echo "
			<div style='position: relative;left: -10px;width:815px; word-break:break-all; 
			background:$cc;padding-left: 15px;padding-right: 7px;border-top-width: 4px;padding-top: 4px;'>
			发送人:$sender &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
			 发送日期:$date<p>
			$content<p>
			删除 : <input type='checkbox' name='delete_$i' value='$mid' />
			</div>
		";
			
			$flag ^= 1;
	}
}
?><p>
<input type="submit" value="删除勾选信息" />
</form>
</body>
</html>