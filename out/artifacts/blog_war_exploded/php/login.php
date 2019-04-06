<?php
/**
 * Created by IntelliJ IDEA.
 * User: actarjan
 * Date: 2018/12/17
 * Time: 22:35
 */
header('Content-Type: text/html; charset=utf-8');
$mysqli = new mysqli("localhost","root","","mydb");
$mysqli->query('set names utf8');
$user =$_POST["user"];
$query = "select * from user where username like '$user' ";
$result = $mysqli->query($query);
if($result&&$user)
{
    $row = $result->fetch_row();
    if($row[1]==$_POST["password"])
    {
        $url = "backstage.html";
        Header("Location: $url");
    }
    else
        echo "<script>location.href='login.html';alert('密码错误')</script>";
}
else
    echo "<script>alert('用户不存在');location.href='login.html'</script>";
