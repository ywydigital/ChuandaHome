<?php
class User{
	// if login successfully , updata the $_SESSION
	public function updataSession($row){
		init();
		$_SESSION = array_merge($_SESSION,$row);
	}
	
	// login! If successful , COOKIES will be set!
	public function getUser($username,$password,$db){
		$query = "SELECT * 
			FROM
				user_info
			WHERE username = '$username' AND password = '".mysql_real_escape_string(sha1($password))."'";
		$result = mysql_query($query,$GLOBALS['DB']) or die(mysql_error($GLOBALS['DB']));
		if(mysql_num_rows($result) == 0) return ;
		
		$row = mysql_fetch_assoc($result) or die(mysql_error($GLOBALS['DB']));
		User::updataSession($row);
	}
	
	// Check if $username has been registered. return 1 symbolize $username has been registered.
	public function haveRegister($username,$db){
		$query = "SELECT username 
			FROM	
				user_info
			WHERE
				username='$username'";
		$result = mysql_query($query,$db) or die(mysql_error($db));		
		return mysql_num_rows($result) > 0;
	}
	
	// register a new account! return 1 if successful!
	public function register($field,$db){
		if(!preg_match("/^[\w]{1,20}$/", $field['username'])) {
			echo "Please check your username. You can only yous letters ,digits and '_' in your username!<p>";
			return 0;
		}
		if(User::haveRegister($field['username'],$db)){
			echo "Soory! Your username has been registered !";
			return 0;
		}
		if($field['nickname'] == ""){
			echo "You must input your nickname!";
			return 0;
		}
		if($field['password'] != $field['password2']){
			echo "Your passwords do not match!<p>";
			return 0;
		}
		if($field['password'] == ""){
			echo "Please input your password!";
			return 0;	
		}
		if(!($field['qq']=="") && !preg_match("/^[1-9][0-9]{5,12}$/", $field['qq'])){
			echo "Your qq is unvalid!";
			return 0;		
		}
		if(!($field['phone']=="") && !preg_match("/^[1-9][0-9]{5,18}/", $field['phone'])){
			echo "Your phone number is unvalid!";
			return 0;
		}
		
		$field[username] = mysql_escape_string($field[username]);
		$field[nickname] = mysql_escape_string($field[nickname]);
		
		$query = "INSERT INTO user_info
				(username,password,nickname,authority,sex,phone,qq,apartment,xinquxiang)
			VALUES
				('$field[username]','".mysql_real_escape_string(sha1($field['password']))."','$field[nickname]','10','$field[sex]',
				'$field[phone]','$field[qq]','$field[apartment]','$field[xinquxiang]')";
		
		mysql_query($query,$db) or die(mysql_query($query,$db));
		
		User::getUser($field['username'], $field["password"]);
		return 1;
	}
	
	// load labels
	public function labelsLoad($uid,$db){
		$query = "SELECT label
			FROM
				user_label
			WHERE
				uid=$uid";
		$result = mysql_query($query,$db) or die(mysql_error($db));
		
		for($i=1;$i<=15;$i++) $label[$i] = "";
		$cnt = 0;
		while($row = mysql_fetch_assoc($result)){
			$cnt ++;
			$label[$cnt] = $row['label'];
		}
		$label['tot'] = $cnt;
		return $label;
	}
	// 	modify labels!
	public function labelsModify($label,$uid,$db){
		$query = "DELETE FROM label
			WHERE	uid=".$uid;
		mysql_query($query,$db) or die(mysql_error());
		
		for($i=1;$i<=15;$i++) $label[$i] = trim($label[$i]);
		for($i=1;$i<=15;$i++)
			for($j=$i+1;$j<=15;$j++)
				if($label[$i] == $label[$j])
					$label[$i] = "";
		
		for($i=1;$i<=15;$i++){
			if($label[$i] == "") continue;
			$tmp = $label[$i];
			$tmp = mysql_escape_string($tmp);
			$query = "INSERT INTO label
					(uid,label)
				VALUES
					($uid,'$tmp')";
			mysql_query($query,$db) or die(mysql_error($db));
		}
	}
	
	//	logout
	function logout(){
		unset($_SESSION['nickname']);
		unset($_SESSION['password']);
		unset($_SESSION['username']);
		unset($_SESSION['uid']);
		unset($_SESSION['qq']);
		unset($_SESSION['phone']);
		unset($_SESSION['apartment']);
	}
	
//new_data,update data infomation
	public function new_data($fileds,$username,$db){
	
		
		if(isset($fileds["submit"]))
		{
			
			if(!($fileds["_qq"]=='') && !preg_match("/^[1-9][0-9]{5,12}$/", $fileds["_qq"]))
			{
				echo "Your qq is unvalid!";
				return 0;
			}
			if($fileds["nickname"]=='')
			{
				echo "You must form your name!";
				return 0;
			}
			if(!($fileds["tel"]=='') && !preg_match("/^[1-9][0-9]{5,18}/",$fileds["tel"]))
			{
				echo "Your tel is unvalid!";
				return 0;
			}
			if(!($fileds["adr"]) && preg_match("/^[A-Za-z]\w$/",$fileds["adr"]))	
			{
				echo "Your adrress is unvalid!";
				echo "fileds['_qq']";
				return 0;
			}
			else{
				$query="UPDATE
							user_info
							SET
							nickname='$fileds[nickname]',
							phone='$fileds[tel]',
							sex='$fileds[sex]',
							apartment='$fileds[adr]',
							qq='$fileds[_qq]',
							xinquxiang='$fileds[xing]',
							entrance_year='$fileds[year]'
							WHERE
							username='$username'";
				mysql_query($query,$db) or die(mysql_error($db));
				if(User::getbyuser($username))
				{
					echo "111";
				}

				return 1;
			}		  			
		}
		
	}
	
	//new_password,update password information
	public function new_password($fileds,$username,$db){
		if(isset($fileds["submit"]))
		{
			if($fileds["fname1"]==$fileds["fname2"]&&$fileds["fname1"])
			{
				$query="UPDATE
					user_info
						SET password='".mysql_real_escape_string(sha1($fileds["fname1"]))."'
							WHERE
							username='$username'";
				mysql_query($query,$db) or die (mysql_error($db));
				echo "ok.";
				echo "<p>";
				
			
			}
			else{
				echo "fail.";
				echo "<p>";
				
			
			}
			return 1;
		}
	}
	//use for data_update
	public function getbyuser($username){
				$query = "SELECT * 
			FROM
				user_info
			WHERE username = '$username' ";
		$result = mysql_query($query,$GLOBALS['DB']) or die(mysql_error($GLOBALS['DB']));
		if(mysql_num_rows($result) == 0) return ;
		
		$row = mysql_fetch_assoc($result) or die(mysql_error($GLOBALS['DB']));
		User::updataSession($row);
	}
	
	public function getNickname($uid,$db){
			$query = "SELECT nickname FROM user_info
				WHERE uid = '$uid'";
			
			$result = mysql_query($query,$db) or die(mysql_error($db));
			$nickname = mysql_fetch_assoc($result) or die(mysql_error($db));
			return $nickname;
	}
}
?>