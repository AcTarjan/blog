function filterSqlStr(value) {//防止SQL注入
    var str = "and,delete,or,exec,insert,select,union,update,count,*,',join,>,<";
    var sqlStr = str.split(',');
    var flag = true;
    for (var i = 0; i < sqlStr.length; i++) {
        if (value.toLowerCase().indexOf(sqlStr[i]) != -1) {
            flag = false;
            break;
        }
    }
    return flag;
}
function validate_charcater(value) {//验证非法字符
    var pattern = /[`~!@#$%^&*()_+<>?:"{},.\/;'[\]]/im;
    if (pattern.test(value)) {
        return false;
    }
    return true;
}