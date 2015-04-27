<?php
include "../../../lib/functions.php";
init();
include "../../../lib/User_message.php";
for($i=0;$i<10;$i++){
	$tmp = "delete_$i";
	if(isset($_POST[$tmp])){
		deleteMessage($_POST[$tmp], $GLOBALS['DB']);
	}
};
header("location:user_message.php");
?>