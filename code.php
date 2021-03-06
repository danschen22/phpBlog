<?php
session_start();
//随机数
for($i=0;$i<4;$i++){
    global $rand_num;
    $rand_num .= dechex(mt_rand(0, 15));
}
//保存随机数在session里
$_SESSION['code'] = $rand_num;
//图片宽，高
$width = 75;
$height = 25;
//生成图片
//imagecreatetruecolor($width, $height) — 新建一个真彩色图像
$img = imagecreatetruecolor($width, $height);
//图片颜色
//imagecolorallocate — 为一幅图像分配颜色
$white = imagecolorallocate($img,255,255,255);
$black = imagecolorallocate($img,0,0,0);
//颜色填充
imagefill($img, 0, 0, $white);
//边框
//imagerectangle — 画一个矩形
imagerectangle($img,0,0,$width-2,$height-2,$black);
//随机雪花
//imagestring — 水平地画一行字符串
for($i=1;$i<100;$i++){
    $color_rand = imagecolorallocate($img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
    imagestring($img, 1, mt_rand($width/$i, $width), mt_rand($height/$i, $height),'*', $color_rand);
}
//随机添加6条线条
//imageline — 画一条线段
for($i=0;$i<6;$i++){
    $color_rand = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
    imageline($img,mt_rand(0,$width),mt_rand(0,$height),mt_rand(0,$width),mt_rand(0,$height),$color_rand);
}
//随机数填充
for($i=0;$i<strlen($rand_num);$i++){
    $color_rand = imagecolorallocate($img,mt_rand(0,100),mt_rand(0,100),mt_rand(0,100));
    imagestring($img, 5, $width/strlen($rand_num)*$i,$height/2-5,$rand_num[$i],$color_rand);
}
//输出图片
header('Content-Type:image/png');
imagepng($img);//imagepng — 以 PNG 格式将图像输出到浏览器或文件
//销毁图片
imagedestroy($img);//imagedestroy:销毁一图像

?>