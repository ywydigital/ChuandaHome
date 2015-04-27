<?php
include "../../lib/Yiqiba.php";
include "../../lib/functions.php";
include "../../lib/User.php";
init();
?>
<html>
<head>
<title>交易频道</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Pretty Simple Content Slider with jQuery and CSS3" />
<meta name="keywords" content="jquery,css3, content slider, slide, auto-play"/>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
<style>
* { margin:0; padding:0; }
body { font-family:Arial; background:#C1C7D5 url(images/title.png) no-repeat top center; }
a.back { background:transparent  no-repeat top left; position:fixed; width:150px; height:27px; outline:none; bottom:0px; left:0px; }
#content { margin:150px auto 10px auto; }
.reference { clear:both; width:800px; margin:30px auto; }
.reference p a { text-transform:uppercase; text-shadow:1px 1px 1px #fff; color:#666; text-decoration:none; font-size:10px; }
.reference p a:hover { color:#333; }
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
   
<div id="content"> <a class="back" href=""></a>
  <div class="rotator">
    <ul id="rotmenu">
      <li> <a href="">我的物品区</a>
        <div style="display:none;">
          <div class="info_image">1.jpg</div>
          <div class="info_heading">我的物品区</div>
          <div class="info_description">
               在这个地方你可以看到自己曾经交易过哪些物品，
               可以对你自己的物品进行管理，发布或删除等....
             <a href="./sublink/wodewupin.php" class="more"><font size=5px>点击进入</font></a> </div>
        </div>
      </li>
      <li> <a href="rot2">书籍</a>
        <div style="display:none;">
          <div class="info_image">2.jpg</div>
          <div class="info_heading">书籍</div>
          <div class="info_description"> 
                书籍是人类的精神食粮，丰富人类的内涵，亦或是在闲暇的时候充实自己的生活，
                这里有很多的书籍供你选择，有很多志同道合的朋友等着与你交流....
             <a href="./sublink/subpage.php?type=book" class="more"><font size=5px>点击进入</font></a> </div>
        </div>
      </li>
      <li> <a href="rot3">体育用品</a>
        <div style="display:none;">
          <div class="info_image">3.jpg</div>
          <div class="info_heading">体育用品</div>
          <div class="info_description">
          	    在运动场上挥洒你的汗水，这里也藏着你的青春....
             <a href="./sublink/subpage.php?type=sport" class="more"><font size=5px>点击进入</font></a> </div>
        </div>
      </li>
      <li> <a href="rot4">电子数码</a>
        <div style="display:none;">
          <div class="info_image">4.jpg</div>
          <div class="info_heading">电子数码</div>
          <div class="info_description"> 
                还想着当初多么想拥有一台平板最终还是没有下定决心？
                还想着看看女神却担心硬盘不够？
                电子控的福音？宅男的福音？....
             <a href="./sublink/subpage.php?type=elec" class="more"><font size=5px>点击进入</font></a> </div>
        </div>
      </li>
      <li> <a href="rot5">生活用品</a>
        <div style="display:none;">
          <div class="info_image">5.jpg</div>
          <div class="info_heading">生活用品</div>
          <div class="info_description"> 
               	这个就不用说了吧，可能有些东西你会选择去华联买，
                但是往往总有不想要的一些二手东西不知道往哪儿扔，
                还不如来福利一下大众....
             <a href="./sublink/subpage.php?type=day" class="more"><font size=5px>点击进入</font></a> </div>
        </div>
      </li>
    </ul>
    <div id="rot1"> <img src="" width="800" height="300" class="bg" alt=""/>
      <div class="heading">
        <h1></h1>
      </div>
      <div class="description">
        <p></p>
      </div>
    </div>
  </div>
</div>





<!-- The JavaScript -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript">
            $(function() {
                var current = 1;
                
                var iterate		= function(){
                    var i = parseInt(current+1);
                    var lis = $('#rotmenu').children('li').size();
                    if(i>lis) i = 1;
                    display($('#rotmenu li:nth-child('+i+')'));
                }
                display($('#rotmenu li:first'));
                var slidetime = setInterval(iterate,5000);
				
                $('#rotmenu li').bind('click',function(e){
                    clearTimeout(slidetime);
                    display($(this));
                    e.preventDefault();
                });
				
                function display(elem){
                    var $this 	= elem;
                    var repeat 	= false;
                    if(current == parseInt($this.index() + 1))
                        repeat = true;
					
                    if(!repeat)
                        $this.parent().find('li:nth-child('+current+') a').stop(true,true).animate({'marginRight':'-20px'},300,function(){
                            $(this).animate({'opacity':'0.7'},700);
                        });
					
                    current = parseInt($this.index() + 1);
					
                    var elem = $('a',$this);
                    
                        elem.stop(true,true).animate({'marginRight':'0px','opacity':'1.0'},300);
					
                    var info_elem = elem.next();
                    $('#rot1 .heading').animate({'left':'-420px'}, 500,'easeOutCirc',function(){
                        $('h1',$(this)).html(info_elem.find('.info_heading').html());
                        $(this).animate({'left':'0px'},400,'easeInOutQuad');
                    });
					
                    $('#rot1 .description').animate({'bottom':'-270px'},500,'easeOutCirc',function(){
                        $('p',$(this)).html(info_elem.find('.info_description').html());
                        $(this).animate({'bottom':'0px'},400,'easeInOutQuad');
                    })
                    $('#rot1').prepend(
                    $('<img/>',{
                        style	:	'opacity:0',
                        className : 'bg'
                    }).load(
                    function(){
                        $(this).animate({'opacity':'1'},600);
                        $('#rot1 img:first').next().animate({'opacity':'0'},700,function(){
                            $(this).remove();
                        });
                    }
                ).attr('src','images/'+info_elem.find('.info_image').html()).attr('width','800').attr('height','300')
                );
                }
            });
        </script>
</body>
</html>