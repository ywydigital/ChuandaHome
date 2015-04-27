<?php
include "../../lib/functions.php";
init();
include '../../lib/User.php';
User::Logout();
header("location:../../public_files/user_index/user_index.php");
?>