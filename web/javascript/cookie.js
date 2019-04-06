function get_cookie(name) {
    var str = document.cookie;
    var arr = str.split(";");
    for (var i = 0; i < arr.length; i++) {
        var c = arr[i].split("=");
        if (c[0] == name)
            return c[1];
    }
    return "";
}