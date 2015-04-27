<?php
$con=mysql_connect('localhost','root','')or die("Error:can not connect.");
mysql_select_db("project",$con)or die(mysql_error($con));
$mid=$_GET['mid'];
$query="SELECT * from download WHERE sid='$mid'";
$result=mysql_query($query,$con);
if($row=mysql_fetch_row($result))
{
	$file_name=$row[4];
	$name=$row[1];
}
else {
	echo "wrong!";
}

$file_dir="../../resource/soft/";
if(!file_exists($file_dir.$file_name)){
	echo "文件找不到";
	exit;
}

else{
	
	$file=fopen($file_dir.$file_name,"r");

	Header("Content-Type:application/octet-stream");
	Header("Accrpt-Ranges:bytes");
	
	Header("Accept-Length:".filesize($file_dir.$file_name));
	Header("Content-Disposition:attachment;filename=".$name.$row[2]);
	echo fread($file,filesize($file_dir.$file_name));
	fclose($file);
	exit;
}


?>