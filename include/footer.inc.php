<?php
//defined():判断常量是否存在，防止非法调用
    if(!defined('IN_LEGAL')){
        exit('access illegal');
    }
?>
<footer id="footer">
	<h5>执行耗时：<?php echo _runtime() - $GLOBALS['$start_time']?></h5>
    <h5>footer</h5>
    <span>php 多用户留言系统</span>
</footer>