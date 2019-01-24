<?php
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
function getBoxWidth($font_size,$font,$text){
	$box = imagettfbbox($font_size, 0, $font, $text);
	return $box[2] - $box[0];
}
//接受处理参数
// preg_match_all('/./u', trim($name), $nameArr);
// if(count($nameArr[0])>8){
//     exit(json_encode(array('code'=>-1,'key'=>'不能大于8个字符哦','msg'=>'不能大于8个字符哦')));
// }

//参数设置
$url = 'http://m2.dwstatic.com/huodong/shouji3/201710/048/14/e0157f4de2906d08a6da4935dbaa4fbd.jpg';
$fontFile = '../font/fzstk.ttf';
$text = trim($name);
list($width,$height) = getimagesize($url);
$im = imagecreatefromjpeg($url);
$color = imagecolorallocate($im, 255, 247, 250);
$colorRed = imagecolorallocate($im, 255, 0, 0);
imagettftext($im, 66*0.75, -0.5, ($width-getBoxWidth(66*0.75, $fontFile, $text))/2-2, 349, $colorRed, $fontFile, $text);
imagettftext($im, 66*0.75, -0.5, ($width-getBoxWidth(66*0.75, $fontFile, $text))/2-2, 352, $colorRed, $fontFile, $text);
imagettftext($im, 66*0.75, -0.5, ($width-getBoxWidth(66*0.75, $fontFile, $text))/2+2, 349, $colorRed, $fontFile, $text);
imagettftext($im, 66*0.75, -0.5, ($width-getBoxWidth(66*0.75, $fontFile, $text))/2+2, 352, $colorRed, $fontFile, $text);
imagettftext($im, 66*0.75, -0.5, ($width-getBoxWidth(66*0.75, $fontFile, $text))/2, 350, $color, $fontFile, $text);


$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'私人会所','url'=>$img)));
