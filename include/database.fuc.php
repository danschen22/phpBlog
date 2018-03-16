<?php
header('Content-Type:text/html;charset=utf-8');
/**
 * _connect_db:连接数据库
 * @param unknown $db_host
 * @param unknown $db_username
 * @param unknown $db_password
 * @param unknown $db_name
 */
function _connect_db($db_host,$db_username,$db_password,$db_name){
    //连接数据库
    $GLOBALS['$conn'] = $conn= mysqli_connect($db_host, $db_username, $db_password, $db_name)or die('数据库连接失败'.mysqli_connect_error());
    //设置字符集
    // 修改数据库连接字符集为 utf8
    mysqli_set_charset($conn,"utf8")or die('字符集设置错误'.mysqli_connect_error());
}

function _mysqli_query($query){
    mysqli_query($GLOBALS['$conn'], $query) or die('出现错误'.mysqli_error($GLOBALS['$conn']));
}


?>