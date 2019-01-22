<?php
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];

function getBoxLeft($font_size, $font_family, $content) {
 	$box = imagettfbbox($font_size, 0, $font_family, $content);
 	$width = $box[2] - $box[0];
 	return $width;
} 

$im = imagecreatefromjpeg('http://v3.dwstatic.com/zbshenqi/201812/25/3ad7a934cc28225c00ccccedcded0000.jpg');
$fontfile = '../font/fzqtjw.ttf';
$color = imagecolorallocate($im, 43, 42, 43);
// $name1 = '2016年12月12日';
$name1 = date('Y年m月d日');
imagettftext($im, 48*0.75, 0, 610-getBoxLeft(48*0.75,$fontfile,$name)/2, 960, $color, $fontfile, $name);
imagettftext($im, 48*0.75, 0, 472, 1024, $color, $fontfile, $name1);

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'目标完成情况','url'=>$img)));
