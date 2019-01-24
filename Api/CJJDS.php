<?php
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
function getBoxLeft($font_size, $font_family, $content) {
	$box = imagettfbbox($font_size, 0, $font_family, $content);
	$width = $box[2] - $box[0];
	return $width;
}

$url = 'http://m1.dwstatic.com/huodong/shouji3/201809/259/00/697b36005e6b2f5d30bee9cc0282873f.jpg';
list($width,$height)= getimagesize ($url);
$im = imagecreatefromjpeg($url);
$color = imagecolorallocate($im, 246, 255, 107);
$font = '../font/msyh.ttf';
imagettftext($im, 36, 0, 373-getBoxLeft(36,$font,'欢迎'.$name.'入院治疗')/2, 935, $color, $font, '欢迎'.$name.'入院治疗');

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>'吃鸡戒毒所','url'=>$img)));
