<?php
/**
 * Created by IntelliJ IDEA.
 * User: actarjan
 * Date: 2018/12/18
 * Time: 23:18
 */
require_once('connect.php');
$title = $_POST['title'];
$author = $_POST['author'];
$outline = $_POST['outline'];
$content = $_POST['content'];
$date = time();
$insert_query = "insert into articles(title,author,outline,content,date)values ('$title','$author','$outline','$content',$date)";
$mysqli->query($insert_query);
echo "<script>location.href='../write_article.html';alert('文章发布成功')</script>>";