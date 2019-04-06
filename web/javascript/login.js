window.onload=function () {
    var head=document.getElementById('logo');
    var id=document.getElementById('id');
    //id.focus();
    id.onblur=function () {
        $.get('php/choose_head.php',{'id':this.value},function (data) {
            if(data!=false)
            {
                head.style.backgroundImage="url("+data+")";
            }else
                head.style.backgroundImage="image/head/user.jpg";
        });
    }
}