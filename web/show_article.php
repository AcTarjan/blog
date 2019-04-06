<?php
/**
 * Created by IntelliJ IDEA.
 * User: actarjan
 * Date: 2019/1/18
 * Time: 11:48
 */
require_once('php/connect.php');
$num = $_GET['id'];
$query = "select * from articles where id='$num'";
$result = $mysqli->query($query);
$data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/article.css"/>
    <title><?php echo $data['title']; ?></title>
</head>
<body>
<div id="by">
    <div id="title"><?php echo $data['title']; ?></div>
    <div id="time"><?php echo $data['time']; ?></div>
    <div id="line"></div>
    <div id="message"><?php echo $data['content']; ?></div>
</div>
</body>
</html>
