<?php
/**
 * Created by IntelliJ IDEA.
 * User: actarjan
 * Date: 2019/1/18
 * Time: 17:41
 */
require_once ('php/connect.php');
if(!isset($_COOKIE['status'])||empty($_GET['id'])||$_COOKIE['status']!="0933")
{//错误页面
    header("location:error.html");
}else
    $id = $_GET['id'];
$query = "select * from essays where author_id=$id order by time desc";
if($result=$mysqli->query($query))
{
    while($row = $result->fetch_assoc())
    $data[] = $row;
}
else
    $data=array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/manage_essay.css"/>
    <title>随笔管理</title>
</head>
<body>
<div class="main">随笔管理列表</div>
    <?php
    if(!empty($data))
        foreach ($data as $value) {
            ?>
            <div class="tx">
                <div class="time"><?php echo $value['time']; ?></div>
                <div class="delete"><a href="php/delete_essay.php?id=<?php echo $value['id'];?>&author_id=<?php echo $id;?>">删除</a></div>
                <div class="content"><?php echo $value['content']; ?></div>
            </div>
            <?php
        }
    ?>
</body>
</html>
