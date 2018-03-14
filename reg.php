<?php 
//定义常量，防止恶意调用
define("IN_LEGAL",true);//define:定义常量，合法调用
//定义常量，用来指定本页内容
define('SCRIPT','reg');
//引入公共文件
require dirname(__FILE__).'/include/common.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>多用户留言系统--注册</title>
<link rel="stylesheet" type="text/css" href="styles/first/<?php echo SCRIPT?>.css" />
<script type="text/javascript" src="js/reg.js"></script>
</head>
<body>
<?php 
require ROOT_PATH.'include/header.inc.php';
?>
<div id="content">
    <h3>用户注册</h3>
    <form method="post" action="reg.php">
    	<dl>
        	<dt>填写注册信息</dt>
        	<dd><label for="username">用 户 名：</label><input type="text" name="username" id="username"/></dd>
        	<dd><label for="password">密      码：</label><input type="password" name="password" id="password"/></dd>
        	<dd><label for="check_password">确认密码：</label><input type="password" name="check_password" id="check_password"/></dd>
        	<dd><label for="password_question">密码提示：</label><input type="text" name="password_question" id="password_question"/></dd>
        	<dd><label for="password_answer">密码回答：</label><input type="text" name="check_password" id="password_answer"/></dd>
        	<dd><label for="password_answer">性         别：</label><input type="radio" name="sex" checked="checked"/>男 <input type="radio" name="sex" />女</dd>
        	<dd><label>头像选择：</label><input type="hidden" id='headImgText' value="images/head/header01.png"/><img src="images/head/header01.png" id="faceImage"/></dd>
        	<dd><label>电子邮件</label><input type="text" name="email"/></dd>
        	<dd><label>Q   Q</label><input type="text" name="qq"/></dd>
    	</dl>
    </form>
</div>
<?php 
require ROOT_PATH.'include/footer.inc.php';
?>
</body>
</html>