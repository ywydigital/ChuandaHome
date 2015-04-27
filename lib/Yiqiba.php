<?php
class Yiqiba{
	function trDate($date){
		$year = substr($date, 0, 4);
		$tmp = substr($date, 5, 2);
		if($tmp[1] == '-') {$mon='0'.$tmp[0];}
		else $mon = $tmp;
		$l = strlen($date);
		if($date[$l-2] == '-') $day = '0'.$date[$l-1];
		else $day = $date[$l-2].$date[$l-1];
		return "$year-$mon-$day";		
	}
	
	function addEvent($event,$db,$uid){
		$date = Yiqiba::trDate($event['date']);
		$query = "INSERT INTO yiqiba_event
				(uid,date,place,event,descr,post)
			VALUES
				('$uid','$date','$event[place]','$event[event]','$event[descr]','1')";
		mysql_query($query,$db) or die(mysql_error($db));
	}
	
	function mySubstr($str,$len){
		if(strlen($str) <= $len) return $str;
		$tmp = $str[$len-1];
		if(ord($tmp) <= 128) return substr($str, 0,$len)."...";
		else {
			for($i=0;$i<$len;$i++)
				if(ord($str[$i]) > 128) $i += 2;
			return substr($str, 0,$i)."...";
		}
	}
	
	function transForMysql($a){
		while(list($key,$val) = each($a)){
			$val = trim($val);
			$val = mysql_real_escape_string($val);
			$a[$key] = $val;
		}
	}
	
	function selectFromMysqlByEid($db, $eid){
		$query = "SELECT * FROM yiqiba_event
			WHERE event_id = '$eid'
		";
		$result = mysql_query($query,$db) or die(mysql_error($db));
		return mysql_fetch_assoc($result);
	}
	
	function selectFromMysql($info,$db,$off,$cnt){
		if(!isset($info['yiqiba_event'])) $info["yiqiba_event"] = "";
		if(!isset($info['yiqiba_place'])) $info["yiqiba_place"] = "";
		if(!isset($info['yiqiba_time'])) $info["yiqiba_time"] = "";
		
		$date = $info['yiqiba_time'];
		if($date != ""){
			$year = substr($date, 0, 4);
			$tmp = substr($date, 5, 2);
			if($tmp[1] == '-') {$mon='0'.$tmp[0];}
			else $mon = $tmp;
			$l = strlen($date);
			if($date[$l-2] == '-') $day = '0'.$date[$l-1];
			else $day = $date[$l-2].$date[$l-1];
			if(!checkdate($mon, $day, $year)) $info['yiqiba_time'] = date("Y-m-d");
		}
		else $info['yiqiba_time'] = date("Y-m-d");
		
		Yiqiba::transForMysql($info);
		$query = "SELECT * FROM yiqiba_event
			WHERE
				event LIKE '%$info[yiqiba_event]%'	AND
				place LIKE '%$info[yiqiba_place]%'	AND
				date > '$info[yiqiba_time]'	AND
				post = '1'
			ORDER BY
				date";
		$result = mysql_query($query,$db) or die(mysql_error($db));

		$row['tot'] = mysql_num_rows($result);
		
		for($i=0;$i<$off;$i++) mysql_fetch_assoc($result);
		$tmp = 0;
		for($i=0;$i<$cnt;$i++){
			if($row[$tmp] = mysql_fetch_assoc($result))	$tmp ++ ;
			else break;
		}
		$row['cnt'] = $tmp;
		return $row;
	}
	
	function checkDate($date){
		if(!preg_match("/^\d\d\d\d-\d\d?-\d\d?$/", $date)) return 0;
		$year = substr($date, 0, 4);
		$tmp = substr($date, 5, 2);
		if($tmp[1] == '-') {$mon='0'.$tmp[0];}
		else $mon = $tmp;
		$l = strlen($date);
		$day = "";
		if($date[$l-2] == '-') $day = '0'.$date[$l-1];
		else $day = $date[$l-2].$date[$l-1];
		
		if(checkdate($mon, $day, $year)) return 1;
		return 0;
	}
	
	function selectReply($eid,$db,$off,$cnt){
		$query = "SELECT * FROM yiqiba_reply
			WHERE
				event_id = '$eid'
			order by date desc";
		$result = mysql_query($query,$db) or die(mysql_error($db));
		
		$row['tot'] = mysql_num_rows($result);
		
		for($i=0;$i<$off;$i++) mysql_fetch_assoc($result);
		$tmp = 0;
		for($i=0;$i<$cnt;$i++){
			if($row[$tmp] = mysql_fetch_assoc($result))	$tmp ++ ;
			else break;
		}
		$row['cnt'] = $tmp;
		return $row;
	}
	
	function addReply($reply,$eid,$db){
		$date = date("Y-m-d");
		$query = "INSERT INTO yiqiba_reply
				(event_id,uid,reply,date)
			VALUES
				('$eid','$_SESSION[uid]','$reply','$date')";
		mysql_query($query,$db) or die(mysql_error($db));
	}
}
?>
