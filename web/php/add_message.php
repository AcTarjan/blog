<?php
/**
 * Created by IntelliJ IDEA.
 * User: actarjan
 * Date: 2019/1/19
 * Time: 19:48
 */
    require_once ('connect.php');
    require('SafeFilter.php');
    $author_id=$_GET['author_id'];
    $con = $_POST['con'];
    $name = $_POST['name'];
    SafeFilter($con);
    SafeFilter($name);
    $query = "insert into message(content,person,author_id)values ('$con','$name','$author_id')";
if($mysqli->query($query)){
    echo "<script>alert('留言成功，感谢你的来访');location.href=\"../message_board.php?id=$author_id\"; </script>";
}else{
    echo "<script>alert('留言失败，感谢你的来访');location.href=\"../message_board.php?id=$author_id\"; </script>";
}

