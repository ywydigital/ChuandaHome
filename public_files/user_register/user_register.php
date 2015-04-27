<?php 
include "../../lib/User.php";
include "../../lib/functions.php";
init();

if(isset($_POST['submit'])){
	if(User::register($_POST,$GLOBALS['DB'])){
		header("Location: ../user_index/user_index.php");
	}
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
 <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  username: <input type="text" name="username"/><p>
  
  password: <input type="password" name="password"/><p>
  retype your password: <input type="password" name="password2"/><p>
  
  nickname: <input type="text" name="nickname"/><p>
  sex: <select name="sex">
   <option value="">secret</option>
   <option value="male">男</option>
   <option value="female">女</option>
  </select><p>
  qq: <input type="text" name="qq"/><p>
  phone: <input type="text" name="phone"/><p>
  apartment: <input type="text" name="apartment"/><p>
  xinquxiang: <select name="xinquxiang">
   <option value="" >secret</option>
   <option value="male">男</option>
   <option value="female">女</option>
   <option value="both">both..</option>
  </select><p>
  <input type="submit" name="submit">
 </form>
</body>
</html>