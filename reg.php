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
    }
    require ROOT_PATH.'/include/reg.fuc.php';
    $member_info = array();
    //通过唯一标识符防止恶意注册，伪装表单跨站攻击
//     if($_SESSION['$_unitid'] != $_POST['unitid']){
//         _alert_back('标识符不正确');
//     }
    //这个存入数据库的唯一标识符还有第二个作用，登录cookie验证
    $member_info['_unitid'] = _check_uintid($_SESSION['$_unitid'],$_POST['unitid']);
    //active也是一个标识符，用来刚注册的用法激活
    $member_info['_active'] = sha1(uniqid(rand(0, 9),true));
    $member_info['_username'] = _check_username($_POST['username']);
    $member_info['_password'] = _check_password($_POST['password'],$_POST['check_password']);
    $member_info['_password_question'] = _check_question($_POST['password_question']);
    $member_info['_password_answer'] = _check_answer($_POST['password_question'],$_POST['password_answer']);
    $member_info['_sex'] = _check_magic_quotes_gpc($_POST['sex']);
    $member_info['_headimg'] = _check_magic_quotes_gpc($_POST['headimg']);
    $member_info['_email'] = _check_email($_POST['email']);
    $member_info['_qq'] = _check_qq($_POST['qq']);
    //向数据库新增
    //在双引号里直接放变量是可以的，如$_username;但如果是数组，则需加{}，如{$member_info['_username']};
    _mysqli_query("INSERT INTO user (_unitid,
                                     _active,
                                     _username,
                                     _password,
                                     _password_question,
                                     _password_answer,
                                     _sex,
                                     _headimg,
                                     _email,
                                     _qq,
                                    _reg_time,
                                    _last_login_time,
                                    _last_login_ip,
                                    ) 
                             VALUES ('{$member_info['_unitid']}',
                                     '{$member_info['_active']}',
                                     '{$member_info['_username']}',
                                     '{$member_info['_password']}',
                                     '{$member_info['_password_question']}',
                                     '{$member_info['_password_answer']}',
                                     '{$member_info['_sex']}',
                                     '{$member_info['_headimg']}',
                                     '{$member_info['_email']}',
                                     '{$member_info['_qq']}',
                                      NOW(),
                                      NOW(),
                                      '{$_SERVER['REMOTE_ADDR']}'
                                    )");

}
//uniqid(prefix,more_entropy):生成唯一标识符，prefix：标识符前缀；more_entropy：默认为false,为13位；true:23位
$_SESSION['$_unitid'] = $_unitid = sha1(uniqid(rand(0, 9),true));
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
    	<input type="hidden" name="unitid" value="<?php echo $_unitid ?>"/>
    	<dl>
        	<dt>填写注册信息</dt>
        	<dd><label for="username">用 户 名：</label><input type="text" name="username" id="username"/>(必填)</dd>
        	<dd><label for="password">密      码：</label><input type="password" name="password" id="password"/>(必填)</dd>
        	<dd><label for="check_password">确认密码：</label><input type="password" name="check_password" id="check_password"/>(必填)</dd>
        	<dd><label for="password_question">密码提示：</label><input type="text" name="password_question" id="password_question"/>(必填)</dd>
        	<dd><label for="password_answer">密码回答：</label><input type="text" name="password_answer" id="password_answer"/>(必填)</dd>
        	<dd><label for="password_answer">性         别：</label><input type="radio" name="sex" value='男' checked="checked"/>男 <input type="radio" name="sex" value="女"/>女</dd>
        	<dd><label>头像选择：</label><input type="hidden" id='headImgText' name="headimg" value="images/head/header01.png"/><img src="images/head/header01.png" id="faceImage" style="width:100px;height:100px;"/></dd>
        	<dd><label>电子邮件:</label><input type="text" name="email"/>(必填)</dd>
        	<dd><label>Q   Q:</label><input type="text" name="qq"/>(选填)</dd>
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