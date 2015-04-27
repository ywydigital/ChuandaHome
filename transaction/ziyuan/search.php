<?php

if(isset($_POST['key']))
$name=$_POST['key'];
else if(isset($_POST['name']))
{
	$name=$_POST['name'];
}
else
{
	die("wrong");
}


?>



<html>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>资料共享</title>
</head>





<body topmargin="0" leftmargin="0">

<center>
<table border="0" width="1000px" cellpadding="0" cellspacing="0"
	align="center" class="topline">
	<tr>
		<td width="220" height="65" align="right"><a href="/"><img
			src="../../image/ziyuan/logo.jpg" border="0" width="204" height="50"
			alt="资料共享" class="mt15"></a></td>
		<td width="5"></td>
		<td valign="top"><br clear="all">
		<table border="0" cellpadding="0" cellspacing="0">
			<form name="gxForm" method="post" target="_blank"
				onSubmit="ckformat(this);return iask_submit(this,'ishare');">
			<tr>
				<td class="ar" valign="top" nowrap><input type=text name=key id=is
					size=42 class=f18 value="" onClick="ckwords(this);"
					style="border: 1px solid #CDE8A9; height: 26px;"> <input
					type="submit" name="submitt" value="搜索"
					style="width: 60px; height: 30px;"> <input type="hidden"
					name="from" value="class"></td>
			</tr>

			</form>
		</table>
		</td>
	</tr>
	<tr>
		<td height="7"></td>
	</tr>
</table>
</center>


<center></center>


<div class="wrap_wrap mt15">
<div class="wrap">
<div class="wrap_left"><script type="text/javascript"> 
var allshareid = new Array(6548,1819,1871,6648,1869,6551,6553,6552,6647,6549,6646,1870,6550);
for(i in allshareid)
if ("1816" == allshareid[i])
        $("id1816").style.display = "none";
var preloads11 = new Image;
preloads11.src = "http://i2.sinaimg.cn/pfp/ishare/fl_jh1.gif";
var preloads12 = new Image;
preloads12.src = "http://i3.sinaimg.cn/pfp/ishare/fl_jh2.gif";

</script>
<table border="0" width="100%" cellpadding="0" cellspacing="0"
	class="mt15">
	<tr valign="bottom">
		<td width="21" height="22">&nbsp;</td>
	</tr>
</table>




<table border="0" width="100%" cellpadding="0" cellspacing="0"
	class="lh25 f14"
	style="border-bottom: 1px solid #CAE8AE; color: #568122;">
	<tr bgcolor="#EEFCDD" align="center">
		<td width="5"></td>
		<td width="100" align="left">&nbsp;<b>下载</b></td>
		<td width="295" align="left">
		<div style="position: relative;"><b style="float: left">名称&nbsp;/&nbsp;格式</b>
		<br clear="all" />

		</div>
		</td>

		<td width="70"><span class="hide_bcy1">下载次数</span></td>
		<td width="75"><a href="/c/1816.html?osize=1" class="hide_bcy2"
			style="color: #568122;" title="按大小排序">资料大小</a></td>
		<td width="95"><a href="/c/1816.html?order=2" class="hide_bcy2"
			style="color: #568122;" title="按时间排序">上传时间</a></td>
		<td width="5"></td>
	</tr>
</table>
<iframe name="iframe_data1" style="display: none;"></iframe> <?php


$con=mysql_connect('localhost','root','')or
die("ERROR:can not connect!");
mysql_select_db("project",$con)or die(mysql_error($con));
$query="SELECT*from download WHERE name like '%$name%' order by createtime DESC";
$result=mysql_query($query,$con);
$num=mysql_num_rows($result);
$max=10;
if($num%$max==0)
{
	$an=$num/$max;
}
else
{
	$an=(integer)($num/$max)+1;
}

?> <?php
if(isset($_POST['page']))
{

	$throw=($_POST['page']-1)*10;

}
else if(isset($_POST['submit']))
{
	$throw=($_POST['pages']-1)*10;

}
else
{
	$throw=0;
}

for($j=0;$j<$throw;$j++)
{
	mysql_fetch_row($result);
}
?> <?php

for($j=0;$j<10;$j++)
{
	if($row=mysql_fetch_row($result))
	{
		echo <<<TAM
		<table border="0" width="98%" align="center" cellpadding="0" cellspacing="0" class="f12 c6 lh25 st">
TAM;
		echo <<<TAM
		<tr align="center">
TAM;
			

			
		echo <<<TAM
				<td width="90" nowrap align="left"><a href="../../lib/ziyuan/download.php?mid=$row[0]" >下载</a></td>
TAM;
		echo <<<TAM
				<td width="295" align="left">
TAM;
		echo <<<TAM
                 <a href="/f/68369683.html" target="_blank" class="f14" title="">
TAM;

		echo $row[1].$row[2];
			
		echo <<<TAM
 				</a>
TAM;
			
		echo <<<TAM
 				</td>
TAM;



		echo <<<TAM
				<td width="70" nowrap>
TAM;
		echo $row[6];

		echo <<<TAM
                </td>
TAM;
		echo <<<TAM
                <td width="75" nowrap>
TAM;
		echo $row[6];
		echo <<<TAM
				</td>
TAM;
		echo <<<TAM
				<td width="95" nowrap>
TAM;
		$date=date('y-m-d',$row[7]);
		echo $date;
		echo <<<TAM
				 </td>
TAM;
		echo <<<TAM
			</tr>
TAM;
	}
	else
	{
		break;
	}
}


?>




<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<tr>
	<td height="1" colspan="9"></td>
</tr>
<tr>
	<td colspan="9"
		style="height: 60px; text-align: center; font-size: 14px; width: 100%">

		<?php
		for($i=1;$i<=$an;$i++)
		{
			echo <<<TAM
<input type="submit" name="page" value="$i">
TAM;
		}
			
		?> <input type=text name=pages size=4 value=""> <input type='hidden'
		name='name' value="<?php echo $name; ?>"> <input type="submit"
		name="submit" value="跳转"></td>
</tr>
</form>


</table>
</td>
</tr>
</table>

</body>
<!-- SUDA_CODE_START -->
<script type="text/javascript"
	src="http://i0.sinaimg.cn/unipro/pub/suda_s_v851c.js"></script>
<SCRIPT type="text/javascript"> 
<!--
_S_PID_="292";
_S_pSt(_S_PID_);
//-->
</SCRIPT>
<!-- SUDA_CODE_END -->
</html>



