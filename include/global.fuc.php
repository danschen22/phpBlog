<?php
//执行耗时
/**
 * _runtime():获取时间
 * @access public
 * @params void
 * @return float
 */
function _runtime(){
    //list — 把数组中的值赋给一些变量;
    //microtime — 返回当前 Unix 时间戳和微秒数;
    //explode — 使用一个字符串分割另一个字符串,返回数组;
    list($_micro,$_time) = explode(" ", microtime());
    return $_time + $_micro;
}
?>