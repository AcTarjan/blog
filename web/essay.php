<?php
require_once ('php/connect.php');
if(empty($_GET['id']))
{//错误页面
    echo "<script>location.href='error.html';</script>";
}
else
    $id=$_GET['id'];
$query = "select * from essays where author_id=$id order by time desc";
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
    <link rel="stylesheet" href="css/essay.css"/>
    <link rel="icon" href="image/logo.ico" />
    <title>我的随笔</title>
</head>
<body>
<!--头部导航栏-->
<header>
    <div id="logo">AcTarjan</div>
    <ul class="nav">
        <li><a href="homepage.php?id=<?php echo $id;?>">主页</a></li>
        <li><a href="article.php?id=<?php echo $id;?>">文章</a></li>
        <li><a href="essay.php?id=<?php echo $id;?>">随笔</a></li>
        <li><a href="message_board.php?id=<?php echo $id;?>">留言板</a></li>
        <li><a href="login.html" target="_blank">登录</a></li>
        <li><a href="register.html" target="_blank">注册</a></li>
    </ul>
</header>
<!--内容部分-->
<div class="main">
            <?php
            if(!empty($data))
            foreach ($data as $value) {
            ?>
            <div class="tx">
                <div class="time"><?php echo $value['time']; ?></div>
                <div class="content"><?php echo $value['content']; ?></div>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>