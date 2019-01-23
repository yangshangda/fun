<?php
//接受处理参数
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
function getBoxWidth($font_size,$font,$text){
    $box = imagettfbbox($font_size, 0, $font, $text);
    return $box[2] - $box[0];
}
//参数设置
$urls = [
    'http://v3.dwstatic.com/bi/201809/30/3ad7a9348d83b05b386ff853f9530000.jpg?w=640&h=700',
    'http://v3.dwstatic.com/bi/201809/30/3ad7a9349083b05b3f6ffe53ff530000.jpg?w=640&h=700',
    'http://v3.dwstatic.com/bi/201809/30/3ad7a9349283b05b406f005401540000.jpg?w=640&h=700',
    'http://v3.dwstatic.com/bi/201809/30/3ad7a9349683b05b356f0a540b540000.jpg?w=640&h=700',
    'http://v3.dwstatic.com/bi/201809/30/3ad7a9209983b05b8d063d353e350000.jpg?w=640&h=700',
    'http://v3.dwstatic.com/bi/201809/30/3ad7a9209c83b05b9406473548350000.jpg?w=640&h=700',
    'http://v3.dwstatic.com/bi/201809/30/3ad7a9349e83b05b3c6f205421540000.jpg?w=640&h=700',
    'http://v3.dwstatic.com/bi/201809/30/3ad7a920a083b05b8c064f3550350000.jpg?w=640&h=700',
    'http://v3.dwstatic.com/bi/201809/30/3ad7a934a483b05b406f285429540000.jpg?w=640&h=700',
    'http://v3.dwstatic.com/bi/201809/30/3ad7a920a683b05b87065b355c350000.jpg?w=640&h=700',
];
$url = $urls[array_rand($urls)];
$fontFile = '../font/HYZhuZiMuTouRenW.ttf';
$im = imagecreatefromjpeg($url);
$color = imagecolorallocate($im, 30, 27, 27);
list($width,$height) = getimagesize($url);
$size = 60*0.75;
imagettftext($im, $size, 0, ($width-getBoxWidth($size, $fontFile, $name))/2, 80, $color, $fontFile, $name);

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'十一关键字','url'=>$img)));
