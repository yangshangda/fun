<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
function getBoxLeft($font_size, $font_family, $content) {
	$box = imagettfbbox($font_size, 0, $font_family, $content);
	$width = $box[2] - $box[0];
	return $width;
}
preg_match_all('/./u', trim($name), $namearr);

$im = imagecreatefromjpeg('http://m1.dwstatic.com/huodong/shouji3/201809/087/30/233c2ecc420eeabf43b320001b4cbd51.jpg');
$fontfile = '../font/msyhbd.ttf';
$color = imagecolorallocate($im, 44, 44, 44);
imagettftext($im, 30*0.75, 0, 360- getBoxLeft(30*0.75, $fontfile, $name)/2, 360, $color, $fontfile, $name);
$num = mt_rand(1000,5000);
imagettftext($im, 29*0.75, 0, 203, 410, $color, $fontfile, $num);

date_default_timezone_set('PRC');
$time = date('H:i', time());
imagettftext($im, 30*0.75, 0, 360- getBoxLeft(30*0.75, $fontfile, $name)/2, 45, $color, '../font/pingfang.ttf', $time);

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'iponeXS预购','url'=>$img)));

