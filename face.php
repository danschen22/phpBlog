<?php 
//定义常量，防止恶意调用
define("IN_LEGAL",true);//define:定义常量，合法调用
//定义常量，用来指定本页内容
define('SCRIPT','face');
//引入公共文件
require dirname(__FILE__).'/include/common.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>多用户留言系统--头像</title>
<link rel="stylesheet" type="text/css" href="styles/first/<?php echo SCRIPT?>.css" />
<script type="text/javascript" src="js/face.js"></script>
</head>
<body>
<div id="content">
<h4>头像选择</h4>
<?php for($i=1;$i<10;$i++){?>
 <img class="head" src='images/head/header0<?php echo $i ?>.png' alt='images/head/header0<?php echo $i ?>.png'/>
<?php } ?>
<?php foreach(range(10,12) as $num){?>
  <img class="head" src='images/head/header<?php echo $num ?>.png' alt='images/head/header<?php echo $num ?>.png'/>
<?php } ?>

</div>
</body>
</html>