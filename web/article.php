<?php
require_once ('php/connect.php');
if(empty($_GET['id']))
{//错误页面
    echo "<script>location.href='error.html';</script>";
}
else
    $id=$_GET['id'];
$query = "select * from articles where author_id=$id order by time desc";
$result =$mysqli->query($query);
if($result&&$result->num_rows)
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
    <link rel="stylesheet" href="css/article.css"/>
    <link rel="icon" href="image/logo.ico" />
    <title>我的文章</title>
</head>
<body>
<!--left部分开始-->
<div class="left">
    <div class="dd">目录</div>
    <div id="child">
    <div class="catalogue">
        <?php
        if(!empty($data))
        foreach ($data as $value) {
        ?>
            <a class="aa" href="show_article.php?id=<?php echo $value['id']?>" target="_blank"><?php echo $value['title'];?></a>
        <?php } ?>
        <div id="bottom"></div>
    </div>
    </div>
</div>
<!--right部分开始-->
<!--头部导航栏-->
<header>
    <ul class="nav">
        <li><a href="homepage.php?id=<?php echo $id;?>">主页</a></li>
        <li><a href="article.php?id=<?php echo $id;?>">文章</a></li>
        <li><a href="essay.php?id=<?php echo $id;?>">随笔</a></li>
        <li><a href="message_board.php?id=<?php echo $id;?>">留言板</a></li>
        <li><a href="login.html" target="_blank">登录</a></li>
        <li><a href="register.html" target="_blank">注册</a></li>
    </ul>
</header>
<div id="word">那时我们有梦，关于文学，关于爱情，关于穿越世界的旅行。
    <br/>如今我们深夜饮酒，杯子碰到一起，都是梦破碎的声音。</div>
</body>
</html>