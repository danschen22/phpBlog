<?php 
//定义常量，防止恶意调用
define("IN_LEGAL",true);//define:定义常量，合法调用
//定义常量，用来指定本页内容
define('SCRIPT','reg');
//引入公共文件
require dirname(__FILE__).'/include/common.inc.php';
session_start();
if(isset($_GET['action'])){
    //防止恶意攻击
    if(!($_POST['code'] == $_SESSION['code'])){
        _alert_back('验证码错误');
    }else{
        require ROOT_PATH.'/include/reg.fuc.php';
        $member_info['username'] = _check_username($_POST['username']);
        $member_info['password'] = $_POST['password'];
        $member_info['check_password'] = $_POST['check_password'];
        $member_info['password_question'] = $_POST['password_question'];
        $member_info['password_answer'] = $_POST['password_answer'];
        $member_info['sex'] = $_POST['sex'];
        $member_info['headimg'] = $_POST['headimg'];
        $member_info['email'] = $_POST['email'];
        $member_info['qq'] = $_POST['qq'];
        $member_info['code'] = $_POST['code'];
        echo mb_strlen($member_info['username'],'utf-8');
        print_r($member_info);
    }
}
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
    <form method="post" action="?action='reg'">
    	<dl>
        	<dt>填写注册信息</dt>
        	<dd><label for="username">用 户 名：</label><input type="text" name="username" id="username"/></dd>
        	<dd><label for="password">密      码：</label><input type="password" name="password" id="password"/></dd>
        	<dd><label for="check_password">确认密码：</label><input type="password" name="check_password" id="check_password"/></dd>
        	<dd><label for="password_question">密码提示：</label><input type="text" name="password_question" id="password_question"/></dd>
        	<dd><label for="password_answer">密码回答：</label><input type="text" name="password_answer" id="password_answer"/></dd>
        	<dd><label for="password_answer">性         别：</label><input type="radio" name="sex" value='男' checked="checked"/>男 <input type="radio" name="sex" value="女"/>女</dd>
        	<dd><label>头像选择：</label><input type="hidden" id='headImgText' name="headimg" value="images/head/header01.png"/><img src="images/head/header01.png" id="faceImage" style="width:100px;height:100px;"/></dd>
        	<dd><label>电子邮件:</label><input type="text" name="email"/></dd>
        	<dd><label>Q   Q:</label><input type="text" name="qq"/></dd>
        	<dd><label>验  证  码:</label><input type="text" name="code" style="width:90px;"/><img src="code.php" style="position:relative;top:6px;left:6px;" id="code-img"/></dd>
        	<dd><input type="submit" value="注册"/></dd>
    	</dl>
    </form>
</div>
<?php 
require ROOT_PATH.'include/footer.inc.php';
?>
</body>
</html>