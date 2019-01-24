<?php
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
function getBoxWidth($font_size,$font,$text){
	$box = imagettfbbox($font_size, 0, $font, $text);
	return $box[2] - $box[0];
}

//参数设置
$url = 'http://m2.dwstatic.com/huodong/shouji3/201710/033/72/1738b044cc486dcc302af6f6a34872c7.jpg';
$fontFile = '../font/rzh.ttf';
$text = trim($name);
$im = imagecreatefromjpeg($url);
$color = imagecolorallocate($im, 172, 187, 216);
list($width,$height) = getimagesize($url);
imagettftext($im, 25, 1, ($width-getBoxWidth(25, $fontFile, $text)-55)/2, 162, $color, $fontFile, $text);

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'高速公路恶搞','url'=>$img)));
