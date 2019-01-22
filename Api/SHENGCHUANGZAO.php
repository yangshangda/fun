<?php 
//接受处理参数
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];

function getBoxWidth($font_size,$font,$text){
    $box = imagettfbbox($font_size, 0, $font, $text);
    return $box[2] - $box[0];
}
$text = '神在创造' .$name.'的时候';

$pic = [
    'http://m1.dwstatic.com/huodong/shouji3/201803/225/17/1ab856e7a007ef1f02e5c3a34a486e66.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201803/226/33/651ce2efabc0dc15a4ff3858df53ba9c.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201803/226/52/07b0326b805c7e9243121749657a415d.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201803/226/72/7a2c0e9f20658620da600ffe757b8c87.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201803/226/90/35096ec2e6027d691b05486c9b9ad69e.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201803/227/07/146fd319e16235de83ad7b8cc5ecc83a.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201803/227/22/3cbb942691295fb9bff4dce93c081d01.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201803/227/41/44919e49918d772589fdfb69d6b0a41d.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201803/227/62/f718892af7f3afaf7f19ae9a83345436.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201803/227/84/22a258938dc22b5cc9e21f5fd515f2a3.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201803/228/02/bc4d29b651c1fcd6c8bee73a6a74f493.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201803/228/16/334bdb9ba904dcd37e8bee17ab26b510.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201803/228/29/6f83378b339cb55b5cc93bbe67a3ccbd.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201803/228/43/56c81a54f8b89b175c07d9f29cadd7af.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201803/228/60/b68d2dcf48726662acd4d0d2e0e36767.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201803/228/79/77b017d2cd7be968e4ea1ff2065fee82.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201803/228/92/9f6dc9b5fc44ac456bc2714fa31137b9.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201803/229/04/9f1005544c24d3f7ba2a4412768df6b7.jpg',
];
$key = array_rand($pic);
//参数设置
$url = $pic[$key];
list($width,$height) = getimagesize($url);
$fontFile = '../font/fzsejw.ttf';
$im = imagecreatefromjpeg($url);
$bg = imagecreatefrompng('http://v3.dwstatic.com/zbshenqi/201811/12/3ad7a920ed30e95b239a93e094e00000.png');
imagecopy($im, $bg, 0, 0, 0, 0, $width, $height);
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, 50*0.75, 0, ($width-getBoxWidth(50*0.75, $fontFile, $text))/2, 68, $color, $fontFile, $text);

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'神在创造','url'=>$img)));
