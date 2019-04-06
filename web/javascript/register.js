window.onload=function () {
        var text=document.getElementsByTagName('input');
        var pro=document.getElementsByClassName('prompt');
        var pp=document.getElementsByTagName('p');
        var aid=text[0];var auser=text[1];
        var pwd=text[2];var pwd2=text[3];
        var name_length=0;
        var fg1,fg2,fg3,fg4;
        var sub=document.getElementById('submit');
        sub.onclick=function () {
            return fg1&&fg2&&fg3&&fg4;
        }
        function getlength(str) {
            return str.replace(/[^\x00-xff]/g,"xx").length;
        }
        //id
        aid.onfocus=function(){
            pp[0].innerHTML="id只能由数字进行组合且第一个数字不能为0,不超过10个数字";
            pp[0].style.visibility="visible";
        }
        aid.onkeyup=function () {
            pro[0].style.visibility = "visible";
            name_length = getlength(this.value);
            pro[0].innerHTML = name_length + "个字符";
        }
        aid.onblur=function () {
            pro[0].style.visibility = "hidden";
            var s=/^[1-9]\d{0,9}/g;
            if(getlength(this.value)<=10&&s.test(this.value)) {
                $.get('php/judge_id.php',{'id':this.value},function (data) {
                    if(data){
                        fg1=true;
                        pp[0].style.color="rgba(127,255,0,1)";
                        pp[0].innerHTML="id合法";
                    }else{
                        fg1=false;
                        pp[0].innerHTML="id已注册";
                    }
                });
            } else {
                fg1=false;
                pp[0].innerHTML="id不合法";
            }
        }
        //user
        auser.onfocus=function(){
            pp[1].innerHTML="用户名只能由中文、字母或数字进行组合,不能超过15个字符";
            pp[1].style.visibility="visible";
        }
        auser.onkeyup=function () {
            pro[1].style.visibility = "visible";
            name_length = getlength(this.value);
            pro[1].innerHTML = name_length + "个字符";
        }
        auser.onblur=function () {
            pro[1].style.visibility = "hidden";
            var s=/[^\w\u4e00-\u9fa5]/g;
            if(s.test(this.value)||getlength(this.value)>15||getlength(this.value)<=0) {
                fg2=false;
                pp[1].innerHTML="用户名不合法";
            }
            else {
                fg2=true;
                pp[1].style.color="rgba(127,255,0,1)";
                pp[1].innerHTML = "用户名合法";
            }
        }
        pwd.onfocus=function(){
            pp[2].innerHTML="密码只能由字母、数字进行组合且不少于5个字符";
            pp[2].style.visibility="visible";
        }
        pwd.onblur=function () {
            var s=/[^\w]/g;
            if(s.test(this.value)||getlength(this.value)<=4) {
                fg3=false;
                pp[2].innerHTML="密码不合法";
            }
            else {
                fg3=true;
                pp[2].style.color="rgba(127,255,0,1)";
                pp[2].innerHTML="密码合法";
            }
        }
        pwd2.onfocus=function () {
            pp[3].style.visibility="visible";
            pp[3].innerHTML="请再次输入你的密码";
        }
        pwd2.onblur=function () {
            if(this.value==pwd.value) {
                fg4=true;
                pp[3].style.color="rgba(127,255,0,1)";
                pp[3].innerHTML="一致";
            }
            else {
                fg4=false;
                pp[3].innerHTML="两次输入的密码不一致";
            }
        }
}