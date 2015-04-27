<?php
include "../../lib/functions.php";
init();
include "../../lib/User.php";

if(isset($_POST["submit"])){
	if($_POST["username"] == "zyj" && $_POST["password"] == "123"){
		header("Location: ./admin-index.php");
	}else{
		echo "登录失败<p>";
	}

}

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
username: <input type="text" name="username" />
<p>password: <input type="password" name="password" />
 <input type="submit"
	name="submit" value="提交" />

</form>
</body>
</html>
