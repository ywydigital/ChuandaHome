<?php
include '../../lib/functions.php';
include '../../lib/User.php';
include '../../lib/Yiqiba.php';
init();

if(!isset($_SESSION['nickname'])){
	echo "You haven't login.Pls login.";
	echo "<a href='../../public_files/yiqiba/yiqiba.php'>Chick me</a> return!";	
	die();
}

if($_POST['title']==""){
	echo "Pls input a title!";
	die();
}
if($_POST['event']==""){
	echo "Pls input event!";
	die();
}
if(!Yiqiba::checkDate($_POST['date'])){
	echo "Pls input a corret date!";
	die();
}
if(!Yiqiba::checkDate($_POST['descr'])){
	//$_POST['descr'] = "No descr!";
}
Yiqiba::addEvent($_POST,$GLOBALS['DB'],$_SESSION['uid']);

header("Location: ../../public_files/yiqiba/yiqiba.php");

?>