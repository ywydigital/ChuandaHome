<?php
include "./functions.php";
include "../../lib/functions.php";

init();

if(!isset($_POST['submit']))
{
	die("no submit");
}

$name=$_POST['name'];
$type=$_POST['type'];
$actor=$_POST['actor'];
$createtime=time();



$downsize=$_FILES['file']['size'];

$ok=1;

$oldfilename=$_FILES['file']['name'];
$pos=strrpos($oldfilename,'.');
$ext=substr($oldfilename,$pos,strlen($oldfilename)-$pos);
$eeeee = $ext;
$newfilename=makefilename().$ext;
$newfile="../../resource/soft/$newfilename";

if(file_exists($_FILES['file']['tmp_name']))
{
	
	move_uploaded_file($_FILES['file']['tmp_name'],$newfile);
}
else {
	die ("wrong upload");
}

$oldfilename=$_FILES['image']['name'];
$pos=strrpos($oldfilename,'.');
$ext=substr($oldfilename,$pos,strlen($oldfilename)-$pos);
$newfileimage=makefilename().$ext;
$newimage="../../image/moviephoto/$newfileimage";
if(file_exists($_FILES['image']['tmp_name']))
{
	move_uploaded_file($_FILES['image']['tmp_name'],$newimage);
}
else
{
	die ("wrong image");
}
/*
if(!preg_match("/^[\w]{1,40}$/",$_POST['name']))
{
		echo "please input right.";
		$ok=0;
			
}*/
if($_POST['type']=="")
{
		echo "empty!";
		$ok=0;
}


$query="INSERT INTO download
		(name,type,filename,imagefile,downsize,createtime,actor,end)
		VALUES
		('$name','$type','$newfilename','$newfileimage','$downsize','$createtime','$actor','$eeeee')";

mysql_query($query,$GLOBALS['DB']) or die(mysql_error($GLOBALS['DB']));
if($ok==1)
{
echo "ok";
}


 ?>
 
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>  
 <body> <a href="../../public_files/ziyuan/admin-index.php">chick me</a>to return.</body>
 </html>
