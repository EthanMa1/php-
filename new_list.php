<?php
header("content-type:text/html;charset=utf8");
$conn=mysqli_connect("localhost","root","","News");
mysqli_set_charset($conn,'utf8'); //设定字符集
$sql="select * from new";
$que=mysqli_query($conn,$sql);
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>PHP中文网</title>
    <style>
        table{
            margin-top: 10px;
        }
    </style>
</head>
<body>
<a href="new.html">返回发布新闻</a>
<table border="1" cellspacing="0" width=360 >
    <tr>
        <th>编号</th>
        <th>文章标题</th>
        <th>文章内容</th>
        <th>编辑文章</th>
        <th>发布时间</th>
    </tr>
    <?php
    while($row=mysqli_fetch_array($que)){
    ?>
    <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['title']?></td>
        <td><?php echo $row['content']?></td>
        <td>
            <a href="new_ed.php?id=<?php echo $row['id']?>">修改</a>
            <a href="new_del.php?id=<?php echo $row['id']?>">删除</a>
        </td>
        <td><?php echo $row['cre_time']?></td>
        <?php }
        ?>
    </tr>
</table>
</body>
</html>