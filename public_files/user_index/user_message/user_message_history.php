<?php
include "../../../lib/functions.php";
init();
include "../../../lib/User_message.php"; 
include "../../../lib/User.php";
?>

<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head>
<body>

<?php 
$message = selectMessageByTwoUid($_SESSION['uid'], $_GET['uid'], $GLOBALS['DB']);
if($message['cnt'] == 0){
	echo "当前没有任何消息:(<p>";
}else{
	for($i=0;$i<$message['cnt'];$i++){
		$sender = User::getNickname($message[$i]['send_uid'], $GLOBALS['DB']);
		$sender = $sender['nickname'];
		$date = $message[$i]['date'];
		$content = $message[$i]['message'];
		$mid = $message[$i]['mid'];
		
		if($message[$i]['send_uid'] == $_SESSION['uid']){
			$html = <<<TMP
		<div style="width:335;background-color:pink;word-break:break-all;
	border:1px solid black;">
发送日期:$date<br>
内容:$content<br>
		</div>
TMP;
			echo $html;
		}else{
			$html = <<<TMP
		<div style="width:335;background-color:yellow;word-break:break-all;
	border:1px solid black;">
收到日期:$date<br>
内容:$content<br>
		</div>
TMP;
			echo $html;
		}
	}
}
?>

</body>
</html>