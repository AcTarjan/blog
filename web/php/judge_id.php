<?php
/**
 * Created by IntelliJ IDEA.
 * User: actarjan
 * Date: 2019/3/21
 * Time: 16:36
 */
require_once ('connect.php');
$id=$_GET['id'];
$query="select * from information where id=$id";
$result=$mysqli->query($query);
if($result->num_rows==0)
    echo true;
else
    echo false;