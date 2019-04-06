<?php
/**
 * Created by IntelliJ IDEA.
 * User: actarjan
 * Date: 2018/12/17
 * Time: 22:35
 */
require_once ('connect.php');
$id =$_POST["id"];
$password =$_POST["password"];
$trans=md5($password);
if(strlen($id)>0&&strlen($id)<=10)
{
    $query = "select * from information where id = '$id' ";
        $result = $mysqli->query($query);
        if($result->num_rows!=0)
        {
            $data = $result->fetch_assoc();
            if($data['password']==$_POST["password"]&&$_POST["password"]!=''&&$_POST["password"]!=null)
            {
                setcookie("status","0933",0,"/");
                echo "<script>location.href='../backstage.php?id=$id&ss=$trans';alert('登录成功');</script> ";
            }
            else
                echo "<script>location.href='../login.html';alert('密码错误');</script>";
        }
        else
            echo "<script>alert('用户不存在');location.href='../login.html';</script>";
}
else {
    echo "<script>location.href='../login.html';alert('ID不能为空且长度不能超过10个数字');</script>";
}
