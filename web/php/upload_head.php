<?php
/**
 * Created by IntelliJ IDEA.
 * User: actarjan
 * Date: 2019/3/14
 * Time: 22:11
 */
$id=$_GET['id'];
$name ="../image/head/user".$id.".jpg";
$type = $_FILES['head']['type'];
$tmp_name = $_FILES['head']['tmp_name'];
$error = $_FILES['head']['error'];
$size = $_FILES['head']['size'];
if(move_uploaded_file($tmp_name,$name)){
    require_once ('connect.php');
    $head ="image/head/user".$id.".jpg";
    $query="update information set head='$head' where id='$id'";
    if($mysqli->query($query))
        echo "<script>alert('头像上传成功'); location.href=\"../manage_information.php?id=$id\"; </script>";
    else
        echo "<script>alert('路径更新失败');location.href=\" ../manage_information . php ? id = $id\"</script>";
}
else
    echo "<script>alert('头像上传失败'); location.href=\"../manage_information.php?id=$id\"; </script>";