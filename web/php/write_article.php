<?php
/**
 * Created by IntelliJ IDEA.
 * User: actarjan
 * Date: 2018/12/18
 * Time: 23:18
 */
require_once('connect.php');
$title = $_POST['title'];
$author_id = $_GET['id'];
$class = $_POST['class'];
$content = $_POST['content'];
$insert_query = "insert into articles(title,author_id,class,content)values ('$title','$author_id','$class','$content')";
if($mysqli->query($insert_query)) {
    echo "<script>location.href='../main_backstage.html';alert('文章发布成功')</script>>";
}else
{
    echo "<script>location.href='../main_backstage.html';alert('文章发布失败')</script>>";
}