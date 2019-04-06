<?php
/**
 * Created by IntelliJ IDEA.
 * User: actarjan
 * Date: 2019/3/21
 * Time: 22:20
 */
require_once ('connect.php');
$id=$_GET['id'];
$query="select * from information where id=$id";
$result=$mysqli->query($query);
if($result->num_rows!=0){
    $data=$result->fetch_assoc();
    $head=$data['head'];
    echo $head;
}else
    echo false;