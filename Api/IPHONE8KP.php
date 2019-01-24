<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
function getBoxLeft($font_size, $font_family, $content) {
	$box = imagettfbbox($font_size, 0, $font_family, $content);
	$width = $box[2] - $box[0];
	return $width;
}
$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201709/130/78/549edbae2353b1a4981b112ca5e3d150.jpg');
$color = imagecolorallocate($im, 84, 84, 84);
$fontfile = '../font/msyhbd.ttf';
imagettftext($im, 18*0.75, 0, 158 - getBoxLeft(18*0.75, $fontfile, $name)/2, 270, $color, $fontfile, $name);

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'iphone8卡牌','url'=>$img)));