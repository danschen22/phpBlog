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
function _check_username($username,$minlength=2,$maxlength=20){
    //去掉前后空格
    $username = trim($username);
    //设置长度 mb_strlen($username,'utf-8'):中文字符集字符串长度
    if(mb_strlen($username,'utf-8')<$minlength || mb_strlen($username,'utf-8')>$maxlength){
        _alert_back('用户名长度不能小于'.$minlength .'或大于' .$maxlength);
    }
    //敏感字符限制
//     $_pattern = '/[<>\'\"\/ ]/';
//     if(preg_match($_pattern, $username)){
//         _alert_back('不能含有敏感字符');
//     }
    //转义在 SQL 语句中使用的字符串中的特殊字符。
    $username =  _check_magic_quotes_gpc($username);
    
    return $username;
}
/**
 * _check_password:过滤加密密码
 * @param unknown $password：密码
 * @param unknown $confirm_password：确认密码
 * @param number $minlength：密码最小长度，默认为6
 * @param number $maxlength：密码最大长度，默认为20
 * @return string 返回过滤加密后的密码
 */
function _check_password($password,$confirm_password,$minlength=6,$maxlength=20){
    //去掉前后空格
    $password = trim($password);
    //设置长度
    if(mb_strlen($password) < $minlength || mb_strlen($password) > $maxlength){
        _alert_back('密码长度不能小于'.$minlength .'或大于' .$maxlength);
    }
    //限制格式，密码只能是数字字符串或下划线
    $_password_pattern = '/^[0-9a-zA-Z_]+$/';
    if(!preg_match($_password_pattern, $password)){
        _alert_back('密码只能是数字字符串或下划线');
    }
    //确认密码
    if($password != $confirm_password){
        _alert_back('密码不一致，请重新输入');
    }
    //密码加密
    $password = sha1($password);
    return $password;
}
/**
 * _check_question:过滤用户名
 * @param unknown $question：问题
 * @param number $minlength：最小长度
 * @param number $maxlength：最大长度
 * @return string
 */
function _check_question($question,$minlength=2,$maxlength=20){
    //去掉前后空格
    $question = trim($question);
    //设置长度 mb_strlen($username,'utf-8'):中文字符集字符串长度
    if(mb_strlen($question,'utf-8')<$minlength || mb_strlen($question,'utf-8')>$maxlength){
        _alert_back('问题长度不能小于'.$minlength .'或大于' .$maxlength);
    }
    //转义在 SQL 语句中使用的字符串中的特殊字符。
    $question =  _check_magic_quotes_gpc($question);
    return $question;
}
/**
 * _check_answer
 * @param unknown $question
 * @param unknown $answer
 * @param number $minlength
 * @param number $maxlength
 * @return string
 */
function _check_answer($question,$answer,$minlength=2,$maxlength=20){
    //去掉前后空格
    $answer = trim($answer);
    //设置长度 mb_strlen($username,'utf-8'):中文字符集字符串长度
    if(mb_strlen($answer,'utf-8')<$minlength || mb_strlen($answer,'utf-8')>$maxlength){
        _alert_back('答案长度不能小于'.$minlength .'或大于' .$maxlength);
    }
    //答案与问题不能一致
    if($question == $answer){
        _alert_back('答案与问题不能一致');
    }
    //加密
    $answer = sha1($answer);
    //     mysql_real_escape_string($username);//mysql_real_escape_string：转义，数据注入sql转义’等
    return $answer;
}
/**
 * 
 * @param unknown $email
 * @return string
 */
function _check_email($email){
    //去掉前后空格
    $email = trim($email);
    //格式1396862287@qq.com,danschen22@gmail.com.cn
    $_email_pattern = '/^([0-9A-Za-z\-])+@([0-9A-Za-z\-])+(\.com)?(\.cn)?$/';
    if(!preg_match($_email_pattern, $email)){
        _alert_back('邮箱格式不正确');
    }
    //转义在 SQL 语句中使用的字符串中的特殊字符。
    $email =  _check_magic_quotes_gpc($email);
    return $email;
}
/**
 * 
 * @param unknown $qq
 */
function _check_qq($qq){
    //去掉前后空格
    $qq = trim($qq);
    if(!empty($_qq_pattern)){
        //格式
        $_qq_pattern = '/^[1-9]{1}[0-9]{4,9}$/';
        if(!preg_match($_qq_pattern, $qq)){
            _alert_back('qq格式不正确');
        }
    }
    return $qq;
}
/**
 * 
 * @param unknown $first_unitid
 * @param unknown $_end_unitid
 * @return unknown
 */
function _check_uintid($first_unitid,$_end_unitid){
    if(strlen($first_unitid)!=40 || $first_unitid != $_end_unitid){
        _alert_back('唯一标识符异常');
    }
    return $first_unitid;
}
?>