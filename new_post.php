<?php
header("content-type:text/html;charset=utf8");
$title=$_POST['title'];
$content=$_POST['content'];
$time=date("y-m-d H:i:s");
$conn=mysqli_connect("localhost","","","News");
mysqli_set_charset($conn,'utf8'); //设定字符集
if($conn){
    $sql= "insert into new(title,content,cre_time) values('$title','$content','$time')";
    $que=mysqli_query($conn,$sql);//执行sql语句
    if($que){
        echo "<script>alert('发布成功，返回新闻列表页');location.href='new_list.php';</script>";
    }else{
        echo "<script>alert('发布失败');location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
        exit;
    }
}
else{
    die("数据库连接失败" .mysqli_connect_error());
}
?>