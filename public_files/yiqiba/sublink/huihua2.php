<?php
include "../../../lib/functions.php";
include "../../../lib/User.php";
init();
include "../../../lib/User_message.php"; 

if(isset($_POST['send'])){
	sendMessage($_SESSION['uid'], $_GET['uid'], $_POST['content'], $GLOBALS['DB']);
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/javascript">
	function freshPage(){
		history.go(0);
	}
</script>
</head>
<body>
<form action="#" method="post" style="
    margin-bottom: 5px;
">
	<textarea rows="8" cols="40" style="
    border-radius: 20px;
" name="content"></textarea>
	<br>
	<input type="submit" value="send" style="
    background: rgb(187, 187, 187);
    border: 1px solid rgb(216, 216, 216);
" name="send"/>
</form>

<?php 
$flag = 0;

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
		
		$cc = "whitesmoke";
		if($flag == 1) $cc = "rgb(224, 224, 224)"; 
		
			$html = <<<TMP
		<div style="width:335;background-color:$cc;word-break:break-all;
	border:0px solid black;padding-top: 5px;padding-bottom: 5px;">
收到日期:$date<br>
内容:$content<br>
		</div>
TMP;
			echo $html;
		$flag ^= 1;
	}
}
?>

</body>
</html>