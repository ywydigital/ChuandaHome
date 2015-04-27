<?php
include "../../../lib/functions.php";
init();
include "../../../lib/User_message.php"; 

if(!isset($_GET['rev_uid'])){
	header("location:../user_index.php");
}

if(isset($_POST['send'])){
	sendMessage($_SESSION['uid'], $_GET['rev_uid'], $_POST['content'], $GLOBALS['DB']);
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<form action="#" method="post">
	<textarea rows="8" cols="40" name="content"></textarea>
	<br>
	<input type="submit" value="send" name="send"/>
</form>
</body>
</html>