<?php
if(empty($_GET['id']))
{//错误页面
    echo "<script>location.href='error.html';</script>";
}else
    $id=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/write.css"/>
    <title>写随笔</title>
    <script src="javascript/validate_form.js"></script>
    <script type="text/javascript">
        function check() {
            var text1=document.getElementById('ef4').value;
            if(!filterSqlStr(text1)||!validate_charcater(text1))
            {
                alert("随笔不能为空且不能含有非法字符!!!");
                document.getElementById('ef4').value="";
                return false;
            }
            return true;
        }
    </script>
</head>
<body id="essay_body">
    <form method="post" action="php/write_essay.php?id=<?php echo $id;?>">
        <textarea class="form" id="ef4" name="content"></textarea>
        <input  class="form" id="ef5" type="submit" name="submit" value="发布随笔" onclick="return check();"/>
    </form>
</body>
</html>