<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
function getBoxWidth($fontsize, $font_family, $content) {
        $box = imagettfbbox($fontsize, 0, $font_family, $content);
        $width1 = $box[2] - $box[0];
        return $width1;
    }

$imgs = [
		'http://v3.dwstatic.com/zbshenqi/201811/09/3ad7a9205239e55b229a11bd12bd0000.jpg',
		'http://v3.dwstatic.com/my/201811/09/3ad7a9348539e55bedb5b5fdb6fd0000.jpg',
		'http://v3.dwstatic.com/my/201811/09/3ad7a9349639e55bf6b5d7fdd8fd0000.jpg',
		'http://v3.dwstatic.com/my/201811/09/3ad7a920a939e55b1b9a81bd82bd0000.jpg',
		'http://v3.dwstatic.com/my/201811/09/3ad7a934b439e55be9b5f7fdf8fd0000.jpg',
		'http://v3.dwstatic.com/my/201811/09/3ad7a934c539e55bedb509fe0afe0000.jpg',
		'http://v3.dwstatic.com/my/201811/09/3ad7a934db39e55bf0b529fe2afe0000.jpg',
		'http://v3.dwstatic.com/my/201811/09/3ad7a934eb39e55bf0b545fe46fe0000.jpg',
		'http://v3.dwstatic.com/my/201811/09/3ad7a934013ae55bedb567fe68fe0000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201811/09/3ad7a9348f3ae55bf7b527ff28ff0000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201811/09/3ad7a9209c3ae55b1d9ad9bedabe0000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201811/09/3ad7a920a83ae55b1f9af3bef4be0000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201811/09/3ad7a920b83ae55b219affbe00bf0000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201811/09/3ad7a934c73ae55bf5b571ff72ff0000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201811/09/3ad7a920d33ae55b159a1dbf1ebf0000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201811/09/3ad7a934df3ae55bf4b59dff9eff0000.jpg',
	];

$url = $imgs[mt_rand(0,15)];
$fontfile = '../font/HeiTi.ttf';
$fontsize = 33*0.75;

$bg = imagecreatefrompng('http://v3.dwstatic.com/zbshenqi/201811/09/3ad7a9348152e55bf2b5772078200000.png');

// 合成图片
$im = imagecreatefromjpeg($url);
list($width,$height) = getimagesize($url);
imagecopy($im, $bg, 0, 0, 0, 0, $width, $height);
$x = 320 - getBoxWidth($fontsize, $fontfile, $name)/2;
// 添加文字
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, $fontsize, 0, $x, 55, $color, $fontfile, $name);
// 保存图片
$img = uploadImg($id,$im,'jpg');
// 返回结果
exit(json_encode(array('code'=>1,'name'=>$name.'双十一事件','url'=>$img)));