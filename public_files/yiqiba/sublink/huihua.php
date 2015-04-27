<html>
<head>
<META HTTP-EQUIV="Content-Type" Content="text-html; charset=gb2312">
</head>
<?php 
$html = <<<TMP
	
<frameset rows="100%,80%">
	<frame id="frmPage" name="frmPage" src="../../user_index/user_message/user_message_history.php?uid=$_GET[rev_uid]">
	<frame id="frmSrc" name="frmSrc" src="../../user_index/user_message/user_message_send.php?rev_uid=$_GET[rev_uid]">
</frameset>
TMP;
echo $html;
?><noframes></noframes>
</html>
