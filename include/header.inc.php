<?php
//defined():判断常量是否存在，防止非法调用
    if(!defined('IN_LEGAL')){
        exit('access illegal');
    }
?>
<header id="header">
 	<h2>php 多用户留言系统</h2>
 	<nav id="nav">
 		<ul>
 			<li><a href="/phpBlog">首页</a></li>
 			<li><a href="/phpBlog/reg.php">注册</a></li>
 			<li><a href="#">登录</a></li>
 			<li><a href="#">个人中心</a></li>
 			<li><a href="#">相册</a></li>
 			<li><a href="#">博友</a></li>
 			<li><a href="#">退出</a></li>
 		</ul>
 	</nav>
</header>
