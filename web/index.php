<?php
/**
 * Created by IntelliJ IDEA.
 * User: actarjan
 * Date: 2019/3/21
 * Time: 23:19
 */
    require_once ('php/connect.php');
    $query="select * from information";
    $result=$mysqli->query($query);
    while($row=$result->fetch_assoc()){
        $data[]=$row;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="icon" href="image/logo.ico" />
    <title>ACoder</title>
</head>
<body>
    <header>
        <div id="title">ACoder</div>
        <ul class="nav">
            <li><a href="login.html" target="_blank">登录</a></li>
            <li><a href="register.html" target="_blank">注册</a></li>
        </ul>
    </header>
    <div id="show">
        <table>
            <tr>
                <th>ID</th>
                <th>用户名</th>
            </tr>
        <?php
        foreach ($data as $value){
            ?>
            <tr>
                <td class="d1"><?php echo $value['id'];?></td>
                <td class="d2"><a href="homepage.php?id=<?php echo $value['id'];?>" target="_blank" class="to"><?php echo $value['user'];?></a></td>
            </tr>
                <?php }?>
        </table>
    </div>
    <div id="sign">
        To be a coder who can AC
    </div>
</body>
</html>
