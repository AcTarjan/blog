<?php
/**
 * Created by IntelliJ IDEA.
 * User: actarjan
 * Date: 2019/1/18
 * Time: 17:45
 */
require_once ('connect.php');
$id = $_GET['id'];
$author_id = $_GET['author_id'];
$query = "delete from essays where id='$id'";
if($mysqli->query($query)) {
    echo "<script>alert('随笔删除成功');location.href=\"../manage_essay.php?id=$author_id\";</script>";
}
else {
    echo "<script>alert('随笔删除失败');location.href=\"../manage_essay.php?id=$author_id\";</script>";
}