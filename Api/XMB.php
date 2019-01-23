<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
function getBoxWidth($fontsize, $font_family, $content) {
        $box = imagettfbbox($fontsize, 0, $font_family, $content);
        $width1 = $box[2] - $box[0];
        return $width1;
    }
// $name：获取用户上传的头像
//$imgpath='http://m1.dwstatic.com/huodong/shouji3/201805/171/17/444451a3b1e32f04c491a28bf90d961f.jpg';
//$name=roundedCorners($imgpath);
//var_dump("aaa");die;

$url = 'http://v3.dwstatic.com/zbshenqi/201811/14/3ad7a920e5d5eb5b179a2fb630b60000.jpg';


$fontfile = '../font/fzyhjt.ttf';
$fontsize = 55*0.7;

// 合成图片
$im = imagecreatefromjpeg($url);
list($width,$height) = getimagesize($url);
$x = 600 - getBoxWidth($fontsize, $fontfile, $name)/2;
// 添加文字
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, $fontsize, 8, $x, 750, $color, $fontfile, $name);
// 保存图片
$img = uploadImg($id,$im,'jpg');
// 返回结果
exit(json_encode(array('code'=>1,'name'=>$name.'小目标','url'=>$img)));