<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>  
<body>
<form action="../../transaction/ziyuan/upfile.php" method="post" enctype="multipart/form-data">
name:<input type="text" name="name" value=""/><p>
类型:<select name="type">
<option value="movie">电影</option>
<option value="music">音乐</option>
<option value="soft">软件</option>
<option value="book">学习资料</option>
</select><p>
图片<input type="file" name="image" value=""/><p>

演员<input type="text" name="actor" value=""/><p>
上传文件<input type="file" name="file" value=""/><p>
<input type="submit" name="submit" value="提交"/>
<input type='hidden' name='MAX_FILE_SIZE' value=1024*1024*10>

</form>
</body>
</html>