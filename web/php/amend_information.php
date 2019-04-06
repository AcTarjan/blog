<?php
/**
 * Created by IntelliJ IDEA.
 * User: actarjan
 * Date: 2019/3/11
 * Time: 17:28
 */
require_once ('connect.php');
$id = $_POST['id'];
$user = $_POST['user'];
$name = $_POST['name'];
$sign = $_POST['sign'];
$sex = $_POST['sex'];
$introduction = $_POST['introduction'];
$query ="update information set user='$user',name='$name',sign='$sign',sex='$sex',introduction='$introduction'where id='$id'";
if($mysqli->query($query))
{
    echo "<script>alert('资料修改成功');location.href=\"../manage_information.php?id=$id\";</script>";
}
else{
    echo "<script>alert('资料修改失败');location.href=\"../manage_information.php?id=$id\";</script>";
}