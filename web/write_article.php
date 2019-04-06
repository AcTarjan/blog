<?php
if(!isset($_COOKIE['status'])||empty($_GET['id'])||$_COOKIE['status']!="0933")
{//错误页面
    header("location:error.html");
}else
    $id=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/write.css"/>
    <title>写文章</title>
</head>
<body id="article_body">
<div id="main">
    <form method="post" action="php/write_article.php?id=<?php echo $id;?>">
        <input class="form" id="f1" type="text" name="title" placeholder="文章标题" autocomplete="off"/>
        <input class="form" id="f2" type="text" name="class" placeholder="文章类别" autocomplete="off"/>
        <input  class="form" id="f5" type="submit" name="submit" value="发布文章"/>
        <textarea class="form" id="f4" oninput="this.editor.update()"></textarea>
        <textarea class="form" id="ff4" name="content"></textarea>
    </form>
</div>
<!-将Markdown文本转换为HTML语言->
<script src="javascript/markdown.js"></script>
<script>
    function Editor(input ,output ) {
        this.update = function () {
            output.innerHTML = markdown.toHTML(input.value);
        };
        input.editor = this;
        this.update();
    }
    var $ = function (id) {
        return document.getElementById(id);
    };
    new Editor($("f4"),$("ff4"));
</script>
</body>
</html>