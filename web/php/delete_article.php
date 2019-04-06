<?php
/**
 * Created by IntelliJ IDEA.
 * User: actarjan
 * Date: 2019/1/17
 * Time: 21:29
 */
require_once ('connect.php');
$id = $_GET['id'];
$author_id = $_GET['author_id'];
$query = "delete from articles where id='$id'";
if($mysqli->query($query)) {
    echo "<script>alert('文章删除成功');location.href=\"../manage_article.php?id=$author_id\";</script>";
}
else {
    echo "<script>alert('文章删除失败');location.href=\"../manage_article.php?id=$author_id\";</script>";
}
