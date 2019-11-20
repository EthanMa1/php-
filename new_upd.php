<?php
header("content-type:text/html;charset=utf8");
$title=$_POST['title'];
$content=$_POST['content'];
$id=$_GET['id'];
$time=date("y-m-d h:i:s");
$conn=mysqli_connect("localhost","root","","News");
mysqli_set_charset($conn,"utf8");
if($conn){
    $sql="update new set title='$title',content='$content',cre_time='$time' where id='$id'";
    $que=mysqli_query($conn,$sql);
    if($que){
        echo "<script>alert('修改成功');location.href='new_list.php';</script>";
    }else{
        echo "<script>alert('修改失败，请检查后在提交');Location.href='new_list.php';</script>";
    }
}
?>