<?php
/**
 * Created by IntelliJ IDEA.
 * User: actarjan
 * Date: 2019/1/17
 * Time: 20:50
 */
require_once ('php/connect.php');
if(!isset($_COOKIE['status'])||empty($_GET['id'])||$_COOKIE['status']!="0933") {
    header("location:error.html");
} else{
    $id = $_GET['id'];
    $query = "select * from articles where author_id=$id order by time desc";
    if($result =$mysqli->query($query))
    {
        while($row = $result->fetch_assoc())
        $data[] = $row;
    }
    else
        $data=array();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/manage_article.css"/>
    <title>文章管理</title>
</head>
<body>
<div class="d1">文章管理列表</div>
<table cellspacing="0">
    <tr id="t1">
        <td>编号</td>
        <td>标题</td>
        <td>分类</td>
        <td>发布时间</td>
        <td>操作</td>
    </tr>
    <?php
    if(!empty($data))
        foreach ($data as $value) {
            ?>
            <tr class="tx">
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['title']; ?></td>
                <td><?php echo $value['class']; ?></td>
                <td><?php echo $value['time']; ?></td>
                <td><a href="amend_article.php?id=<?php echo $value['id'];?>&author_id=<?php echo $id;?>">修改</a>&nbsp;&nbsp;
                    <a href="php/delete_article.php?id=<?php echo $value['id'];?>&author_id=<?php echo $id;?>">删除</a></td>
            </tr>
            <?php
        }
    ?>
</table>
</body>
</html>
