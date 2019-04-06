<?php
require_once ('php/connect.php');
if(empty($_GET['id']))
{//错误页面
    echo "<script>location.href='error.html';</script>";
}
else
    $id=$_GET['id'];
$query = "select * from message where author_id=$id order by time desc";
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
    <link rel="stylesheet" href="css/message_board.css"/>
    <link rel="icon" href="image/logo.ico" />
    <title>留言板</title>
    <script src="javascript/validate_form.js"></script>
    <script>
        function check() {
            var text1=document.getElementById('con');
            var text2=document.getElementById('name');
            if(text1.value===""||text1.value===null) {
                alert("留言不能为空");
                return false;
            }
            if(text2.value===""||text2.value===null) {
                alert("昵称不能为空");
                return false;
            }
            if(!filterSqlStr(text1.value)||!validate_charcater(text1.value)) {
                alert("你的留言含有非法字符");
                text1.value="";
                return false;
            }
            if(!filterSqlStr(text2.value)||!validate_charcater(text2.value)) {
                alert("你的昵称含有非法字符");
                text2.value="";
                return false;
            }
            return true;
        }
    </script>
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
<div class="show">
    <?php
    if(!empty($data))
        foreach ($data as $value) {
            ?>
            <div class="tx">
                <div class="time"><?php echo $value['time']; ?></div>
                <div class="content"><strong><?php
                        if($value['person']=="匿名用户")
                            $name=$value['id'];
                        else
                            $name="";
                        echo $value['person'];
                        echo $name; ?>:</strong>&nbsp;
                    <?php echo $value['content']; ?>
                </div>
            </div>
            <?php
        }
    ?>
</div>
<div class="write">
    <form method="post" action="php/add_message.php?author_id=<?php echo $id;?>">
        <textarea id="con" name="con" placeholder="写留言"></textarea>
        <input type="text" id="name" name="name" placeholder="昵称" autocomplete="off"/>
        <input type="submit" id="submit" value="写留言" onclick="return check();"/>
    </form>
</div>
</body>
</html>