<?php
/**
 * Created by IntelliJ IDEA.
 * User: actarjan
 * Date: 2019/1/18
 * Time: 17:35
 */
require_once('connect.php');
$content = $_POST['content'];
$author_id = $_GET['id'];
$insert_query = "insert into essays(content,author_id)values ('$content','$author_id')";
if($mysqli->query($insert_query)) {
    echo "<script>location.href='../main_backstage.html';alert('随笔发布成功')</script>>";
}else
{
    echo "<script>location.href='../main_backstage.html';alert('随笔发布失败')</script>>";
}