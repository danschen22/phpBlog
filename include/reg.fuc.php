<?php

//defined():判断常量是否存在，防止非法调用
if(!defined('IN_LEGAL')){
    exit('access illegal');
}
/**
 *_check_username:过滤用户名
 *@access public
 *@param $username:用户名
 *@return string 过滤后用户名
 */
function _check_username($username){
    //去掉前后空格
    $username = trim($username);
    //设置长度2-20 mb_strlen($username,'utf-8'):中文字符集字符串长度
    if(mb_strlen($username,'utf-8')<2 || mb_strlen($username,'utf-8')>20){
        _alert_back('长度应该在2-20位');
    }
    //敏感字符限制
    $_pattern = '/[<>\'\"\/ ]/';
    if(preg_match($_pattern, $username)){
        _alert_back('不能含有敏感字符');
    }
    //     mysql_real_escape_string($username);//mysql_real_escape_string：转义，数据注入sql转义’等
    return $username;
}
?>