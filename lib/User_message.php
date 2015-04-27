<?php	
	function selectMessageByTwoUid($uid0, $uid1, $db){
		$query = "SELECT * FROM user_message WHERE (rev_uid='$uid0' AND send_uid='$uid1') OR
			(rev_uid='$uid1' AND send_uid='$uid0') ORDER BY date DESC";
		
		$result = mysql_query($query, $db) or die(mysql_error($db));
		$tmp;
		$tmp['cnt'] = mysql_num_rows($result);
		$cnt = 0;
		for($i=0;$i<$tmp['cnt'];$i++){
			$tmp[$cnt] = mysql_fetch_assoc($result);
			$cnt ++;
		}
		return $tmp;
		
	}


	 function getMessage($uid, $db){
		$query = "SELECT * FROM user_message WHERE rev_uid = $uid";
		$result = mysql_query($query, $db) or die(mysql_error($db));
		$tmp;
		$tmp['cnt'] = mysql_num_rows($result);
		$cnt = 0;
		for($i=0;$i<$tmp['cnt'];$i++){
			$tmp[$cnt] = mysql_fetch_assoc($result);
			$cnt ++;
		}
		return $tmp;
	}
	
	function deleteMessage($mid, $db){
		$query = "DELETE FROM user_message WHERE mid = $mid";
		mysql_query($query, $db) or die(mysql_error($db));
	}
	
	function sendMessage($send_uid, $rev_uid, $content, $db){
		$content = mysql_escape_string($content);
		$query = "INSERT INTO user_message VALUES
		($rev_uid, $send_uid, '$content', NOW(), null)";
		mysql_query($query, $db) or die(mysql_error($db));
	}
?>