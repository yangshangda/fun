<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
//include '/var/www/html/bitest/libs/roundedCorners.php';

function getBoxWidth($fontsize, $font_family, $content) {
        $box = imagettfbbox($fontsize, 0, $font_family, $content);
        $width1 = $box[2] - $box[0];
        return $width1;
    }

$imgs = [
		'http://v3.dwstatic.com/zbshenqi/201809/29/3ad7a934936caf5b416f5a285b280000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201809/29/3ad7a934a46caf5b3b6f762877280000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201809/29/3ad7a920d06caf5b8f06f509f6090000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201809/29/3ad7a920d96caf5b8f060d0a0e0a0000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201809/29/3ad7a920e66caf5b8d061f0a200a0000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201809/29/3ad7a934f46caf5b346ffc28fd280000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201809/29/3ad7a920006daf5b8906470a480a0000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201809/29/3ad7a9200f6daf5b9106570a580a0000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201809/29/3ad7a934196daf5b336f3e293f290000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201809/29/3ad7a920246daf5b9206890a8a0a0000.jpg'
	];

$url = $imgs[mt_rand(0,9)];
$fontfile = '../font/HeiTi.ttf';
$fontsize = 61*0.75;

// 合成图片
$im = imagecreatefromjpeg($url);
list($width,$height) = getimagesize($url);
// 添加文字
$color = imagecolorallocate($im, 255, 255, 255);
$x = 460 - getBoxWidth($fontsize, $fontfile, $name)/2;
imagettftext($im, $fontsize, 0, $x, 115, $color, $fontfile, $name);
// 保存图片
$img = uploadImg($id,$im,'jpg');
// 返回结果
exit(json_encode(array('code'=>1,'name'=>$name.'未来五年','url'=>$img)));