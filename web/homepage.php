<?php
if(count($_GET)!=0&&isset($_GET['id'])) {
    $id=$_GET['id'];
}else
    header("location:index.php");
require_once ('php/connect.php');
//随笔展示（只显示最新的3条随笔）
$query = "select * from essays where author_id=$id order by time desc";
$result =$mysqli->query($query);
if($result&&$result->num_rows)
{
    $ss=0;
    while($row = $result->fetch_assoc())
        {
            $ss++;
            if($ss>3)
                break;
            $data[] = $row;
        }
}
else
    $data=array();
//文章数
$query1 = "select * from articles where author_id=$id";
$result1 =$mysqli->query($query1);
//个人资料填充
$query2 = "select * from information where id=$id";
$result2 =$mysqli->query($query2);
$data2 = $result2->fetch_assoc();
//浏览量
if(!isset($_COOKIE["visited"])){
    setcookie("visited","yes",0,"/");
    $page_view=$data2['page_view']+1;
    $query3="update information set page_view='$page_view'where id=$id";
    $mysqli->query($query3);
    header("location:homepage.php?id=$id");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $data2['user'];?>的主页</title>
    <link rel="stylesheet" href="css/homepage.css" />
    <link rel="icon" type="image/x-ico" href="image/logo.ico" />
    <style>
        #logo{
            background-image:url("<?php echo $data2['head'];?>");
        }
    </style>
    <script>
    function clock() {
    var now = new Date();
    var time = now.toLocaleString('chinese', {hour12: false});
    document.getElementById('clock').innerText = time;
    setTimeout("clock();", 1000);
    }
    </script>
</head>
<body onload="clock()">
<!--left部分开始-->
<div class="left">
    <div class="bk"></div>
    <div id="logo"></div>
    <div class="information">
        <div class="nickname"><?php echo $data2['user'];?></div>
        <div class="signature"><?php echo $data2['sign']?></div>
        <table cellspacing="0">
            <tr>
                <th>浏览量</th>
                <th>文章</th>
                <th>随笔</th>
            </tr>
            <tr>
                <td><?php echo $data2['page_view'];?></td>
                <td><?php echo $result1->num_rows;?></td>
                <td><?php echo $result->num_rows;?></td>
            </tr>
        </table>
    </div>
</div>
<!--right部分开始-->
<div class="right">
    <header>
        <div id="clock"></div>
        <ul class="nav">
            <li><a href="homepage.php?id=<?php echo $id;?>">主页</a></li>
            <li><a href="article.php?id=<?php echo $id;?>">文章</a></li>
            <li><a href="essay.php?id=<?php echo $id;?>">随笔</a></li>
            <li><a href="message_board.php?id=<?php echo $id;?>">留言板</a></li>
            <li><a href="login.html" target="_blank">登录</a></li>
            <li><a href="register.html" target="_blank">注册</a></li>
        </ul>
    </header>
        <?php
        if(!empty($data))
            foreach ($data as $value) {
                ?>
                <div class="tx">
                    <div class="content"><?php echo $value['content']; ?></div>
                    <div class="time"><?php echo $value['time']; ?></div>
                </div>
                <?php
            }
        ?>
</div>
</body>