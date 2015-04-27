<?php
include '../../../lib/functions.php';
include '../../../lib/User.php';
include '../../../lib/Yiqiba.php';
init();

if(!isset($_SESSION['nickname'])){
	echo "You haven't login.Pls login.";
	echo "<a href='../../../public_files/yiqiba/sublink/sublink.php?eid=$_POST[eid]'>Chick me</a> return!";
	die();
}
if($_POST['reply'] == ""){
	echo "Pls. input your reply!<p>";
	die();
}

Yiqiba::addReply($_POST['reply'],$_POST['eid'],$GLOBALS['DB']);

header("location: ../../../public_files/yiqiba/sublink/sublink.php?eid=$_POST[eid]");
?>