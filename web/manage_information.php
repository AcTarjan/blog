<?php
/**
 * Created by IntelliJ IDEA.
 * User: actarjan
 * Date: 2019/3/11
 * Time: 12:23
 */
require_once ('php/connect.php');
if(!isset($_COOKIE['status'])||empty($_GET['id'])||$_COOKIE['status']!="0933") {
    header("location:error.html");
} else{
    $id=$_GET['id'];
    //头像地址
    $query = "select * from information where id=$id";
    if($result = $mysqli->query($query))
        $data = $result->fetch_assoc();
    else
        header("location:error.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/information.css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="javascript/amend_head.js"></script>
    <style>
        #head{
            background-image:url("<?php echo $data['head'];?>");
        }
    </style>
</head>
<body>
    <div id="title">个人资料管理</div>
    <div class="line"></div>
    <div id="left">
        <form action="php/upload_head.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data" id="f1">
            <div id="head"><input type="file" name="head" id="choose"/></div>
            <input type="submit" value="修改头像" id="bt0"/>
        </form>
    </div>
    <div id="right">
        <form method="post" action="php/amend_information.php">
            <div class="ss">昵称：<input type="text" name="user" value="<?php echo $data['user']?>"/></div>
            <div class="ss">实名：<input type="text" name="name" value="<?php echo $data['name']?>"/></div>
            <div class="ss">签名：<input type="text" name="sign" value="<?php echo $data['sign']?>"/></div>
            <div class="ss">性别：<input type="text" name="sex" value="<?php echo $data['sex']?>"/></div>
            <div class="ss">简介：<input type="text" name="introduction" value="<?php echo $data['introduction']?>"/></div>
            <input type="hidden" name="id" value="<?php echo $data['id'];?>"/>
            <input id="bt" type="submit" value="修改资料"/>
        </form>
    </div>
</body>
</html>