<?php 
include "../../lib/User.php";
include "../../lib/functions.php";
init();

if(isset($_POST["submit"])){
	User::getUser($_POST['username'],$_POST['password'],$GLOBALS['DB']);
	if(!isset($_SESSION['nickname'])){
		echo "Login failed! Please check your username and password";
		echo "<p>";
	}
	else{
		header("Location: ../user_index/user_index.php");
	}
}
?>
<html>
 <body>
  <form action="" method="post">
	username:   <input type="text" name="username"/><p>
	password:	<input type="password" name="password"/><p>
	<input type="image" src="../index/images/dl.jpg" name="submit"/>
  </form>
  <p>
   Don't have acount? <a href="../user_register/user_register.php">chick here</a> to register!
 </body>
</html>