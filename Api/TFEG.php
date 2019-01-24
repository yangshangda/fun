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
$num = count($namearr[0]);
if($num > 5){
    exit(json_encode(array('code'=>-1,'key'=>'不能大于5个字符哦','msg'=>'不能大于5个字符哦')));
}
$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201708/684/46/f12e2f728d66abef3d6ed4c3b30eab90.jpg');
$color = imagecolorallocate($im, 0, 0, 0);
$fontfile = '../font/msyhbd.ttf';
imagettftext($im, 20*0.75, 0, 225 - getBoxLeft(20*0.75, $fontfile, $name)/2, 500, $color, $fontfile, $name);

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'台风恶搞','url'=>$img)));
