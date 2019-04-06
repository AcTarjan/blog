<?php
/**
 * Created by IntelliJ IDEA.
 * User: actarjan
 * Date: 2019/1/17
 * Time: 19:07
 */
    require_once("php/connect.php");
    $id = $_GET["id"];
    $author_id=$_GET['author_id'];
    $query = "select * from articles where id='$id'";
    $result = $mysqli->query($query);
    $data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/write.css"/>
    <link rel="icon" href="image/logo.ico" />
    <title>文章修改</title>
</head>
<body>
<div class="main">
        <form method="post" action="php/amend_article.php?author_id=<?php echo $author_id;?>">
            <input type="hidden" name="id" value="<?php echo $data['id'] ?>"/>
            <input class="form" id="f1" type="text" name="title" value="<?php echo $data['title'] ?>" />
            <input class="form" id="f2" type="text" name="class" value="<?php echo $data['class'] ?>" />
            <input  class="form" id="f5" type="submit" name="submit" value="修改文章"/>
            <textarea class="form" id="f4" name="content"><?php echo $data['content'] ?></textarea>
        </form>
    </div>
</body>
</html>