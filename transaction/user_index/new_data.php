<?php
include "../../lib/functions.php";
init();
include "../../lib/User.php";


if(User::new_data($_POST,$_SESSION['username'],$GLOBALS['DB'])){
	header("Location: ../../public_files/user_index/user_index.php");
}

?>



<html>
<body>
	<a href="http://localhost/project/public_files/user_index/user_index.php">chick me </a> to return;
</body>
</html>
