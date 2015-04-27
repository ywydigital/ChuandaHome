<?php
include "../../lib/functions.php";
init();
include '../../lib/User.php';
User::Logout();
header("location:../../public_files/index/login.php");
?>