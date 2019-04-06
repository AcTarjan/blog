window.onload=function () {
    var s=document.getElementById('head');
    var submit=document.getElementById('bt0');
    s.onchange=function () {
        submit.click();
    }
}