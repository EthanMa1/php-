<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>PHP中文网</title>
    <style>
        body{
            background-color: rgba(128, 128, 128, 0.3);
        }
    </style>
    <script>
        function foo(){
            if(myform.title.value==""){
                alert('请填写你的新闻标题');
                myform.title.focus();
                return false;
            }
            if(myform.content.value==""){
                alert('新闻内容不能为空哦');
                myform.content.focus();
                return false;
            }
        }
    </script>
</head>
<body>
<?php
header("content-type:text/html;charset=utf8");
$id=$_GET['id'];
$conn=mysqli_connect("localhost","root","","News");
mysqli_set_charset($conn,"utf8");
if($conn){
    $sql="select * from new where id='$id'";
    $que=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($que);
}
?>
<form  method="post" action="new_upd.php?id=<?php echo $row['id'] ?>" onsubmit=" return foo();" name="myform">
    <h1>修改新闻</h1><span><a href="new_list.php">返回</a></span>
    <p>标题：<input type="text" name="title" value="<?php echo $row['title']?>"></p>
    <p>内容：<textarea cols=30 rows=5 name="content"><?php echo $row['content']?></textarea></p>
    <p><button>修改</button></p>
</form>
</body>
</html>