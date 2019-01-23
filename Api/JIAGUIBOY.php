<?php
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
function getBoxLeft($font_size, $font_family, $content) {
	$box = imagettfbbox($font_size, 0, $font_family, $content);
	$width = $box[2] - $box[0];
	return $width;
}
$sex = 'boy';
$url_lg = 'http://m1.dwstatic.com/huodong/shouji3/201808/186/29/83c497f77f3d580cdfde32c18ef87bd8.jpg';
$url_lp = 'http://m1.dwstatic.com/huodong/shouji3/201808/186/94/5ebe5345e0fa0d52f793f193831e83f9.jpg';
if($sex == 'boy')
{
	$url = $url_lg;
}
else
{
	$url = $url_lp;
}
//读取图片到缓存
$cover =imagecreatefromjpeg($url);
//获取系统图大大小
list($width,$height)= getimagesize ($url);

//建立背景图
$im=imagecreatetruecolor($width,$height);
//覆盖系统图
imagecopy($im,$cover,0,0,0,0,$width,$height);

$black = imagecolorallocate($im,225,178,198);
// $whlie = imagecolorallocate($im,255,255,255);
$font = '../font/mnjkt1.TTF';//字体


if($sex == 'boy')
{
imagettftext($im,24,0,32,288,$black,$font,$name);
imagettftext($im,24,0,165,339,$black,$font,$name);
imagettftext($im,24,0,49,391,$black,$font,$name);
imagettftext($im,24,0,136,452,$black,$font,$name);
imagettftext($im,24,0,45,550,$black,$font,$name);
imagettftext($im,24,0,100,598,$black,$font,$name);
}
else
{
imagettftext($im,24,0,44,276,$black,$font,$name);
imagettftext($im,24,0,76,336,$black,$font,$name);
imagettftext($im,24,0,70,386,$black,$font,$name);
imagettftext($im,24,0,90,437,$black,$font,$name);
imagettftext($im,24,0,44,553,$black,$font,$name);
}

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'家规男版','url'=>$img)));
