<?php
include '../../lib/User.php';
include "../../lib/functions.php";
init();
User::labelsModify($_POST,$_SESSION['uid'],$GLOBALS['DB']);
header("location:../../public_files/user_index/user_index.php");
?>