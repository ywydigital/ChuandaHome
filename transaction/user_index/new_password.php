<?php 
include "../../lib/functions.php";
init();
include "../../lib/User.php";

if(User::new_password($_POST,$_SESSION['username'],$GLOBALS['DB']))
{
	header("location: ../../public_files/user_index/user_index.php");
}
?>