<?php
/**
 * Created by IntelliJ IDEA.
 * User: actarjan
 * Date: 2019/3/20
 * Time: 14:06
 */
function SafeFilter (&$arr)
{
    $ra=Array('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/','/select/','/from/','/update/','/delete/','/drop/','/alter/','/script/','/javascript/','/vbscript/','/expression/','/applet/'
    ,'/meta/','/xml/','/blink/','/link/','/style/','/embed/','/object/','/frame/','/layer/','/title/','/bgsound/'
    ,'/base/','/onload/','/onunload/','/onchange/','/onsubmit/','/onreset/','/onselect/','/onblur/','/onfocus/',
        '/onabort/','/onkeydown/','/onkeypress/','/onkeyup/','/onclick/','/ondblclick/','/onmousedown/','/onmousemove/'
    ,'/onmouseout/','/onmouseover/','/onmouseup/','/onunload/');
    if (is_array($arr))
    {
        foreach ($arr as $key => $value)
        {
            if (!is_array($value))
            {
                if (!get_magic_quotes_gpc())  //不对magic_quotes_gpc转义过的字符使用addslashes(),避免双重转义。
                {
                    $value  = addslashes($value); //给单引号（'）、双引号（"）、反斜线（\）与 NUL（NULL 字符）
                }
                $value= preg_replace($ra,'',$value);//删除非打印字符，粗暴式过滤xss可疑字符串
                $arr[$key]= htmlentities(strip_tags($value)); //去除 HTML 和 PHP 标记并转换为 HTML 实体
            }else{
                SafeFilter($arr[$key]);
            }
        }
    }else{
        if(!get_magic_quotes_gpc())  //不对magic_quotes_gpc转义过的字符使用addslashes(),避免双重转义。
        {
            $arr  = addslashes($arr); //给单引号（'）、双引号（"）、反斜线（\）与 NUL（NULL 字符）
            //加上反斜线转义
        }
        $arr    = preg_replace($ra,'',$arr);     //删除非打印字符，粗暴式过滤xss可疑字符串
        $arr    = htmlentities(strip_tags($arr)); //去除 HTML 和 PHP 标记并转换为 HTML 实体
    }
}