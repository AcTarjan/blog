<?php
/**
 * Created by IntelliJ IDEA.
 * User: actarjan
 * Date: 2019/3/19
 * Time: 22:55
 */
require_once ('connect.php');
require('SafeFilter.php');
$id=$_POST['id'];
$user = $_POST['user'];
$password = $_POST['password'];
$re_password = $_POST['re_password'];
//安全过滤
SafeFilter($id);
SafeFilter($user);
SafeFilter($password);
SafeFilter($re_password);
//检测id是否存在
$query1="select * from information where id=$id";
$result=$mysqli->query($query1);
if($result->num_rows!=0) {
    echo "<script>alert('你输入的id已存在');location.href=register.html</script>";
}else{
        $query2 = "insert into information(id,user,password) values ('$id','$user','$password')";
        if ($mysqli->query($query2)) {
            echo "<script>alert('注册成功');location.href=\"../homepage.php?id=$id\";</script>";
        } else {
            echo "<script>alert('注册失败');location.href=\"../register.html\";</script>";
        }
}