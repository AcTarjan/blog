<?php
/**
 * Created by IntelliJ IDEA.
 * User: actarjan
 * Date: 2019/1/17
 * Time: 20:12
 */
require_once ("connect.php");
$id = $_POST['id'];
$title = $_POST['title'];
$class = $_POST['class'];
$author_id = $_GET['author_id'];
$content = $_POST['content'];
$time = date('Y-m-d H:i:s',time());
$query = "update articles set title='$title',class='$class',content='$content',time='$time' where id='$id'";
if($mysqli->query($query))
{
    echo "<script>alert('文章修改成功');location.href=\"../manage_article.php?id=$author_id\";</script>";
}
else{
    echo "<script>alert('文章修改失败');location.href=\"../manage_article.php?id=$author_id\";</script>";
}