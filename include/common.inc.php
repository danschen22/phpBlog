<?php
//defined():判断常量是否存在，防止非法调用
if(!defined('IN_LEGAL')){
    exit('access illegal');
}
//转换为硬路径常量
define('ROOT_PATH',substr(dirname(__FILE__),0,-7));//-7:去掉最后7个
//设置php 版本
if(PHP_VERSION < '4.1.0'){
    exit('php version is too low');
}
//引入数据库连接函数
require ROOT_PATH.'include/database.fuc.php';
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'phpblog');
_connect_db(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
//引入核心函数库
require ROOT_PATH.'include/global.fuc.php';
//执行耗时
// $start_time = _runtime();//footer.inc.php 引用时，编辑器警告不存在，程序认出，编辑器问题，可改为常量或超级全局变量
// define('START_TIME',_runtime());
$GLOBALS['$start_time'] = _runtime();
?>

