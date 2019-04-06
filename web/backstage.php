<?php
require_once ("php/connect.php");
if(empty($_GET['ss'])||empty($_GET['id'])||!isset($_COOKIE['status'])||$_COOKIE['status']!="0933")
{//错误页面
    header("location:error.html");
} else
{
    $id=$_GET['id'];
    $trans=$_GET['ss'];
    $query="select * from information where id=$id";
    if($result=$mysqli->query($query))
    {
        $data=$result->fetch_assoc();
        if(md5($data['password'])!=$trans)
            header("location:error.html");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/backstage.css"/>
    <link rel="icon" href="image/logo.ico" />
    <title>后台</title>
</head>
<body>
    <div class="left">
        <div id="d0"><a href="php/secede.php">退出后台</a></div>
        <div id="dd"><a href="main_backstage.html" target="show">后台管理界面</a></div>
        <div class="d2"><a href="manage_information.php?id=<?php echo $id;?>" target="show">个人资料管理</a></div>
        <div class="d1"><a href="homepage.php?id=<?php echo $id;?>" target="_blank">我的主页</a></div>
        <div class="d2"><a href="manage_article.php?id=<?php echo $id;?>" target="show">文章管理</a></div>
        <div class="d2"><a href="manage_essay.php?id=<?php echo $id;?>" target="show">随笔管理</a></div>
        <div class="d1"><a href="write_article.php?id=<?php echo $id;?>" target="show">写文章</a></div>
        <div class="d1"><a href="write_essay.php?id=<?php echo $id;?>" target="show">写随笔</a></div>
    </div>
<iframe name="show" src="main_backstage.html">
</iframe>
</body>
</html>