<?php 
include "../../lib/Yiqiba.php";
include "../../lib/functions.php";
init();
?>

<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">                           <!--浏览器兼容性-->
    
    
  <meta content="川大的学生网站" name="description">
  <meta name="verify-v1" content="EYARGSAVd5U+06FeTmxO8Mj28Fc/hM/9PqMfrlMo8YA=">              <!--google-->
  <meta property="wb:webmaster" content="7c86191e898cd20d">                                   <!--微博-->
  <meta property="qc:admins" content="1520412177364752166375">  
  <link rel="stylesheet" href="./style1.css" type="text/css">                              
  <title>                        
  HomePage
  </title>
  <link rel="shortcut icon" href="images/logo.ico"
   type="image/x-icon">
  <script>var _head_start = new Date();</script>
  <style type="text/css">
  
	
	div.center{text-align:center;}
	a.one:hover{color:#848682;}
	a.down{text-align:right;}
	a.down:hover{color:#848682;}
	

  </style>
  

</head>
  
  
  
  
<body>
<div id="header">
	<div id="menu-primary" >
		<div class="menu">
           	<ul id="menu-primary-items" >  
              <li class="line1"><a href="../index/login.php">首页</a></li>
            	<li><a href="../user_index/user_index.php">个人主页</a></li>
              <li><a href="../yiqiba/yiqiba.php">一起吧</a></li>
              <li><a href="../jiaoyipindao/jiaoyipindao.php">交易频道</a></li>
              <li><a href="../ziyuan/ziyuan.php">资源</a></li>
<?php 
	if(isset($_SESSION['nickname']))	echo '<li><a href="../../transaction/yiqiba/logout.php">退出登录</a></li>';
	else echo '<li><a href="../../public_files/index/login.php">登录</a></li>';
?>
          	</ul>
        </div>
    </div>
</div>  
 
     

          
<table width="1035" border="0" cellspacing="0" cellpadding="0" style="margin:auto;">
  <tr>
   <td width="1035" height="140"><table width="1035" height="140" border="0" cellpadding="0" cellspacing="0">
     <tr>
       <td width="600"><img src="../../image/ziyuan/logo.jpg" width="600" height="140" alt="logo"></td>
       <td width="37">&nbsp;</td>
       <td width="398">&nbsp;
       <div class="center">
       <form action="../../transaction/ziyuan/search.php" target="_blank" method="post">
       <table bgcolor="#FFFFFF"><tr><td>

       
       <select name="date">
       <option value="all">全部</option>
       <option value="movie">电影</option>
       <option value="music">音乐</option>
       <option value="story">小说</option>
       <option value="book">学习资料</option>
       </select>
       <input type=text name="name" size=30>
       
       <input type="submit" name="submitt" value="资源搜索">
       </td></tr></table>
       </form></div>
       </td>
     </tr>
   </table>
   </td>
    
  </tr>
  
  
  
  
  
  <tr bgcolor="#f7f7f7">
    <td height="424"><table width="1035" height="424" border="0" cellpadding="0" cellspacing="0">
    
      <tr>
        <td width="150" height="212"><p><a href="../../public_files/ziyuan/sunpage.php"><img src="../../image/ziyuan/pic12.jpg" alt="movie" width="150" height="150" usemap="#Map"></a></p></td>
   <?php

   $con=mysql_connect('localhost','root','')or 
   		die("Error:can not connect!");
   	mysql_select_db("project",$con)or die(mysql_error($con));
   	$query="SELECT*from download WHERE type='movie' ";
   	$result=mysql_query($query,$con);
   ?>     
   
        
        <td width="177">
          <table width="177" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="150">
              <?php
              if($row=mysql_fetch_row($result))
              {
              	;
              }
              else
              {
              	$row[5]=0;
              	$row[1]='no information';
              	$row[8]='no information';
              }
               ?>

            <a class="tooltips" href="../ziyuan/download.php?mid=<?php echo $row[0]?>"><img src="<?php echo "../../image/moviephoto/$row[5]"; ?>" width="80" height="100" style="border:0;" /><span>点击图片下载此资源
             
            </span></a>

              
             </td>
            </tr>
            <tr>
              <td height="32">&nbsp;<?php echo $row[1];?> </td>
            </tr>
            <tr>
              <td height="30">&nbsp;<?php echo $row[8];?></td>
            </tr>
          </table></td>
  
                <?php
              if($row=mysql_fetch_row($result))
              {
              	;
              }
              else
              {
              	$row[5]=0;
              	$row[1]='no information';
              	$row[8]='no information';
              }
               ?>
  
        <td width="177"><table width="177" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="150"><a class="tooltips" href="../ziyuan/download.php?mid=<?php echo $row[0]?>"><img src=<?php echo "../../image/moviephoto/$row[5]";?> alt="" width="80" height="100" style="border:0;" /><span>点击图片下载此资源
           </span></a></td>
          </tr>
          <tr>
            <td height="32">&nbsp;<?php echo $row[1];?></td>
          </tr>
          <tr>
            <td height="30">&nbsp;<?php echo $row[8];?></td>
          </tr>
        </table></td>
		
	              <?php
              if($row=mysql_fetch_row($result))
              {
              	;
              }
              else
              {
              	$row[5]=0;
              	$row[1]='no information';
              	$row[8]='no information';
              }
               ?>	
		
        <td width="177"><table width="177" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="150"><a class="tooltips" href="../ziyuan/download.php?mid=<?php echo $row[0]?>"><img src=<?php echo "../../image/moviephoto/$row[5]"?> alt="" width="80" height="100" style="border:0;" /><span>点击图片下载此资源</span></a></td>
          </tr>
          <tr>
            <td height="32">&nbsp;<?php echo $row[1];?></td>
          </tr>
          <tr>
            <td height="30">&nbsp;<?php echo $row[8];?></td>
          </tr>
        </table></td>
	              <?php
              if($row=mysql_fetch_row($result))
              {
              	;
              }
              else
              {
              	$row[5]=0;
              	$row[1]='no information';
              	$row[8]='no information';
              }
               ?>	
		
        <td width="177"><table width="177" border="0" cellspacing="0" cellpadding="0">
          <tr>
           <td height="150"><a class="tooltips" href="../ziyuan/download.php?mid=<?php echo $row[0]?>"><img src=<?php echo "../../image/moviephoto/$row[5].jpg"?> alt="" width="80" height="100" style="border:0;" /><span>点击图片下载此资源</span></a></td>
          </tr>
          <tr>
            <td height="32">&nbsp;<?php echo $row[1];?></td>
          </tr>
          <tr>
            <td height="30">&nbsp;<?php echo $row[8];?></td>
          </tr>
        </table></td>
			              <?php
              if($row=mysql_fetch_row($result))
              {
              	;
              }
              else
              {
              	$row[5]=0;
              	$row[1]='no information';
              	$row[8]='no information';
              }
               ?>	
		
        <td width="177"><table width="177" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="150"><a class="tooltips" href="../ziyuan/download.php?mid=<?php echo $row[0]?>"><img src=<?php echo "../../image/moviephoto/$row[5]";?> alt="" width="80" height="100" style="border:0;" /><span>点击图片下载此资源</span></a></td>
          </tr>
          <tr>
            <td height="32">&nbsp;<?php echo $row[1];?></td>
          </tr>
          <tr>
            <td height="30">&nbsp;<?php echo $row[8];?></td>
          </tr>
        </table></td>
      </tr>
	  
	  
      <tr>
        <td height="212">&nbsp;
		
		</td>
		
			              <?php
              if($row=mysql_fetch_row($result))
              {
              	;
              }
              else
              {
              	$row[5]=0;
              	$row[1]='no information';
              	$row[8]='no information';
              }
               ?>	
        <td><table width="177" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="150"><a class="tooltips" href="../ziyuan/download.php?mid=<?php echo $row[0]?>"><img src=<?php echo "../../image/moviephoto/$row[5]";?> alt="" width="80" height="100" style="border:0;" /><span>点击图片下载此资源 </span></a></td>
          </tr>
          <tr>
            <td height="32">&nbsp;<?php echo $row[1];?></td>
          </tr>
          <tr>
            <td height="30">&nbsp;<?php echo $row[8];?></td>
          </tr>
        </table></td>
		
			              <?php
              if($row=mysql_fetch_row($result))
              {
              	;
              }
              else
              {
              	$row[5]=0;
              	$row[1]='no information';
              	$row[8]='no information';
              }
               ?>	
        <td><table width="177" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="150"><a class="tooltips" href="../ziyuan/download.php?mid=<?php echo $row[0]?>"><img src=<?php echo "../../image/moviephoto/$row[5]";?> alt="" width="80" height="100" style="border:0;" /><span> 点击图片下载此资源</span></a></td>
          </tr>
          <tr>
            <td height="32">&nbsp;<?php echo $row[1];?></td>
          </tr>
          <tr>
            <td height="30">&nbsp;<?php echo $row[8];?></td>
          </tr>
        </table></td>
		
			              <?php
              if($row=mysql_fetch_row($result))
              {
              	;
              }
              else
              {
              	$row[5]=0;
              	$row[1]='no information';
              	$row[8]='no information';
              }
               ?>	
        <td><table width="177" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="150"><a class="tooltips" href="../ziyuan/download.php?mid=<?php echo $row[0]?>"><img src=<?php echo "../../image/moviephoto/$row[5]";?> alt="" width="80" height="100" style="border:0;" /><span>点击图片下载此资源 </span></a></td>
          </tr>
          <tr>
            <td height="32">&nbsp;<?php echo $row[1];?></td>
          </tr>
          <tr>
            <td height="30">&nbsp<?php echo $row[8];?></td>
          </tr>
        </table></td>
		
			              <?php
              if($row=mysql_fetch_row($result))
              {
              	;
              }
              else
              {
              	$row[5]=0;
              	$row[1]='no information';
              	$row[8]='no information';
              }
               ?>	
        <td><table width="177" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="150"><a class="tooltips" href="../ziyuan/download.php?mid=<?php echo $row[0]?>"><img src=<?php echo "../../image/moviephoto/$row[5]";?> alt="" width="80" height="100" style="border:0;" /><span> 点击图片下载此资源 </span></a></td>
          </tr>
          <tr>
            <td height="32">&nbsp;<?php echo $row[1];?></td>
          </tr>
          <tr>
            <td height="30">&nbsp;<?php echo $row[8];?></td>
          </tr>
        </table></td>
		
			              <?php
              if($row=mysql_fetch_row($result))
              {
              	;
              }
              else
              {
              	$row[5]=0;
              	$row[1]='no information';
              	$row[8]='no information';
              }
               ?>	
		
        <td><table width="177" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="150"><a class="tooltips" href="../ziyuan/download.php?mid=<?php echo $row[0]?>"><img src=<?php echo "../../image/moviephoto/$row[5]";?> alt="" width="80" height="100" style="border:0;" /><span>点击图片下载此资源</span></a></td>
          </tr>
          <tr>
            <td height="32">&nbsp;<?php echo $row[1];?></td>
           
          </tr>
          <tr>
            <td height="30">&nbsp;<?php echo $row[8];?></td>
          </tr>
        </table></td>
        
        
      </tr>
    </table></td>
  </tr>
  
  <?php
  $query="SELECT*from download WHERE type='music'";
  $result=mysql_query($query,$con); 
  ?>
  
  <tr>
    <td height="167"><table width="1041" height="274" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="150"><table width="150" height="276" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="150"><a href="../../public_files/ziyuan/sun_music.php"><img src="../../image/ziyuan/pic13.jpg" alt="music" width="150" height="150" usemap="#Map2"></a></td>
          </tr>
          <tr>
            <td height="162">&nbsp;</td>
          </tr>
        </table></td>
        <td width="885"><table width="885" height="308" border="0" cellpadding="0" cellspacing="0" background="../../image/ziyuan/ec61e1faba5344989f23121489c77309.jpg">
          <tr>
          <?php
          			if($row=mysql_fetch_row($result))
          			{
          				;
          			} 
          			else 
          			{
          				$row[1]='no information';
          			}
          ?>
            <td width="380" height="50"><?php echo $row[1];?></td>
            <td width="63"><a href="../ziyuan/download.php?mid=<?php echo $row[0];?>">下载</a></td>
                      <?php
          			if($row=mysql_fetch_row($result))
          			{
          				;
          			} 
          			else 
          			{
          				$row[1]='no information';
          			}
          ?>
            <td width="380" height="50"><?php echo $row[1];?></td>
            <td width="62"><a href="../ziyuan/download.php?mid=<?php echo $row[0];?>">下载</a></td>
          </tr>
          <tr>
                    <?php
          			if($row=mysql_fetch_row($result))
          			{
          				;
          			} 
          			else 
          			{
          				$row[1]='no information';
          			}
          ?>
            <td height="50"><?php echo $row[1];?></td>
            <td width="63"><a href="../ziyuan/download.php?mid=<?php echo $row[0]?>">下载</a></td>
                      <?php
          			if($row=mysql_fetch_row($result))
          			{
          				;
          			} 
          			else 
          			{
          				$row[1]='no information';
          			}
          ?>
            <td height="50"><?php echo $row[1];?></td>
            <td width="62"><a href="../ziyuan/download.php?mid=<?php echo $row[0]?>">下载</a></td>
          </tr>
          <tr>
                    <?php
          			if($row=mysql_fetch_row($result))
          			{
          				;
          			} 
          			else 
          			{
          				$row[1]='no information';
          			}
          ?>
            <td height="50"><?php echo $row[1];?></td>
            <td width="63"><a href="../ziyuan/download.php?mid=<?php echo $row[0]?>">下载</a></td>
                      <?php
          			if($row=mysql_fetch_row($result))
          			{
          				;
          			} 
          			else 
          			{
          				$row[1]='no information';
          			}
          ?>
            <td height="50"><?php echo $row[1];?></td>
            <td width="62"><a href="../ziyuan/download.php?mid=<?php echo $row[0]?>">下载</a></td>
          </tr>
          <tr>
                    <?php
          			if($row=mysql_fetch_row($result))
          			{
          				;
          			} 
          			else 
          			{
          				$row[1]='no information';
          			}
          ?>
            <td height="50"><?php echo $row[1];?></td>
            <td width="63"><a href="../ziyuan/download.php?mid=<?php echo $row[0]?>">下载</a></td>
                      <?php
          			if($row=mysql_fetch_row($result))
          			{
          				;
          			} 
          			else 
          			{
          				$row[1]='no information';
          			}
          ?>
            <td height="50"><?php echo $row[1];?></td>
            <td width="62"><a href="../ziyuan/download.php?mid=<?php echo $row[0]?>">下载</a></td>
          </tr>
          <tr>
                    <?php
          			if($row=mysql_fetch_row($result))
          			{
          				;
          			} 
          			else 
          			{
          				$row[1]='no information';
          			}
          ?>
            <td height="50"><?php echo $row[1];?></td>
            <td width="63"><a href="../ziyuan/download.php?mid=<?php echo $row[0]?>">下载</a></td>
                      <?php
          			if($row=mysql_fetch_row($result))
          			{
          				;
          			} 
          			else 
          			{
          				$row[1]='no information';
          			}
          ?>
            <td height="50"><?php echo $row[1];?></td>
            <td width="62"><a href="../ziyuan/download.php?mid=<?php echo $row[0]?>">下载</a></td>
          </tr>
          <tr>
                    <?php
          			if($row=mysql_fetch_row($result))
          			{
          				;
          			} 
          			else 
          			{
          				$row[1]='no information';
          			}
          ?>
            <td height="50"><?php echo $row[1];?></td>
            <td width="63"><a href="../ziyuan/download.php?mid=<?php echo $row[0]?>">下载</a></td>
                      <?php
          			if($row=mysql_fetch_row($result))
          			{
          				;
          			} 
          			else 
          			{
          				$row[1]='no information';
          			}
          ?>
            <td height="50"><?php echo $row[1];?></td>
            <td width="62"><a href="../ziyuan/download.php?mid=<?php echo $row[0]?>">下载</a></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  
<?php
$query="SELECT*from download WHERE type='story'";
$result=mysql_query($query,$con); 
?> 
  
  
  
  <tr bgcolor="#f7f7f7">
    <td height="320"><table width="1035" border="0" cellspacing="0" cellpadding="0" >
      <tr>
        <td width="150" height="320">
        <table width="150" height="320" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="150"><a href="../../public_files/ziyuan/sun_soft.php"><img src="../../image/ziyuan/pic14.jpg" width="150" height="150" usemap="#Map3"></a></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <?php
        if($row=mysql_fetch_row($result))
        {
        	;
        } 
        else {
        	$row[1]='no information';
        }
        ?>
        
        <td width="885"><table width="885" height="320" border="0" cellpadding="0" cellspacing="0" background="../../image/ziyuan/237277b36bf66788aa0f2046cf4fe1a5.jpg">
          <tr>
            <td height="40"><?php echo $row[1];?></td>
            <td width="60"><a href="../ziyuan/download.php?mid<?php echo $row[0]?>">下载</a></td>
          </tr>
                  <?php
        if($row=mysql_fetch_row($result))
        {
        	;
        } 
        else {
        	$row[1]='no information';
        }
        ?>
          <tr>
            <td height="40"><?php echo $row[1];?></td>
            <td width="60"><a href="../ziyuan/download.php?mid<?php echo $row[0]?>">下载</a></td>
          </tr>
                  <?php
        if($row=mysql_fetch_row($result))
        {
        	;
        } 
        else {
        	$row[1]='no information';
        }
        ?>
          <tr>
            <td height="40"><?php echo $row[1];?></td>
            <td width="60"><a href="../ziyuan/download.php?mid<?php echo $row[0]?>">下载</a></td>
          </tr>
                  <?php
        if($row=mysql_fetch_row($result))
        {
        	;
        } 
        else {
        	$row[1]='no information';
        }
        ?>
          <tr>
            <td height="40"><?php echo $row[1];?></td>
            <td width="60"><a href="../ziyuan/download.php?mid<?php echo $row[0]?>">下载</a></td>
          </tr>
                  <?php
        if($row=mysql_fetch_row($result))
        {
        	;
        } 
        else {
        	$row[1]='no information';
        }
        ?>
          <tr>
            <td height="40"><?php echo $row[1];?></td>
            <td width="60"><a href="../ziyuan/download.php?mid<?php echo $row[0]?>">下载</a></td>
          </tr>
                  <?php
        if($row=mysql_fetch_row($result))
        {
        	;
        } 
        else {
        	$row[1]='no information';
        }
        ?>
          <tr>
            <td height="40"><?php echo $row[1];?></td>
            <td width="60"><a href="../ziyuan/download.php?mid<?php echo $row[0]?>">下载</a></td>
          </tr>
                  <?php
        if($row=mysql_fetch_row($result))
        {
        	;
        } 
        else {
        	$row[1]='no information';
        }
        ?>
          <tr>
            <td height="40"><?php echo $row[1];?></td>
            <td width="60"><a href="../ziyuan/download.php?mid<?php echo $row[0]?>">下载</a></td>
          </tr>
                  <?php
        if($row=mysql_fetch_row($result))
        {
        	;
        } 
        else {
        	$row[1]='no information';
        }
        ?>
          <tr>
            <td height="40"><?php echo $row[1];?></td>
           <td width="60"><a href="../ziyuan/download.php?mid<?php echo $row[0]?>">下载</a></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  
  
  <tr>
    <td height="19">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#f7f7f7">
    <td align="right"><a href="../ziyuan/admin_login.php">资源管理</a></td>
  </tr>
  
</table>





 <!--注释框-->
<style type="text/css">
/*Tooltips*/
.tooltips{
position:relative; /*这个是关键*/
z-index:2;
}
.tooltips:hover{
z-index:3;
background:none; /*没有这个在IE中不可用*/
}
.tooltips span{
display: none;
}
.tooltips:hover span{ /*span 标签仅在 :hover 状态时显示*/
display:block;
position:absolute;
top:21px;
left:100px;
width:15em;
border:1px solid #848682;
background-color:#ccFFFF;FILTER: progid:DXImageTransform.Microsoft.Gradient(gradientType=0,startColorStr=orange,endColorStr=white);
padding: 3px;
color:#848682;
}
</style>



        
</body>
</html>
  
  

