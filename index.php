<?php 
    define("IN_LEGAL",true);//define:定义常量，合法调用
    ////定义常量，用来指定本页内容
    define('SCRIPT','index');
    //引入公共文件
    require dirname(__FILE__).'/include/common.inc.php';//转换为硬路径，速度更快
//     $start_time = _runtime();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>多用户留言系统--首页</title>
<link rel="shortcuticon" href="favicon.ico"/>
<link rel="stylesheet" type="text/css" href="styles/first/<?php echo SCRIPT?>.css" />
</head>
<body>
<?php 
    require ROOT_PATH.'include/header.inc.php';
    //     usleep(2000000);usleep — 以指定的微秒数延迟执行
?>
 <div id="content">
 	<div id="content-left">    
 		<div id="user">user</div>
 		<div id="pictures">pic</div>
 	</div>
 	<div id="mesage-list">msg</div>
 </div>
<?php 
require ROOT_PATH.'include/footer.inc.php';
// $end_time = _runtime();
// echo $end_time - $start_time;
?>
</body>
</html>