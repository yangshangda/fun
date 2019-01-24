<?php 
//接受处理参数
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
$coverUrl = 'http://m1.dwstatic.com/huodong/shouji3/201806/226/43/e8fd59d9accd996e75e321c61f9a7445.png';
list($w,$h) = getimagesize($coverUrl);
//参数设置
$urls = [
    'http://m1.dwstatic.com/huodong/shouji3/201805/615/61/73eb0d0ba9f78c689ea3acb1aa0dd05c.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201805/615/78/8e8776e2d21bfe0893fdd1f28380314f.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201805/615/85/3e3d5c4f8135f4f6934e1ab7aa4901ab.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201805/615/93/dde4fe5b11ed3d3cd028d422b38e7714.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201805/616/01/ea9d3bb5e6b95ee81e97dce88d2f084a.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201805/616/08/db44c22d94e1746b6eb1359a5ef06273.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201805/616/16/16e10da91b962b03f64421cc6958bbac.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201805/616/26/2ab60d533ab3a32d3b77563265f2ad6b.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201805/616/34/1ac2c98df006b0afcc8f4558202efe7b.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201805/616/42/f215acde434dea92a77722dfab2bb48d.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201805/616/55/40cf05300cca7bfc4f0879105c9baade.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201805/616/70/9287351b9f7f18cbbd58e7443b765fe6.jpg'
];
$url = $urls[array_rand($urls)];
$cover = imagecreatefrompng($coverUrl);
list($width,$height) = getimagesize($url);
$fontFile = '../font/PingFangSC-Regular.otf';
$im = imagecreatefromjpeg($url);
$color = imagecolorallocate($im, 119, 75, 38);
imagettftext($im, 60*0.75, 0, ($width-getBoxWidth(60*0.75, $fontFile, $name))/2, 366, $color, $fontFile, $name);
imagecopyresampled($im, $cover, 0, 0, 0, 0, $width, $height, $w, $h);
$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>'儿童节过节证','url'=>$img)));
