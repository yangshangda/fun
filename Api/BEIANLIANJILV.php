<?php 
//接受处理参数
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
preg_match_all('/./u', trim($name), $nameArr);
// if(count($nameArr[0])>5){
//     exit(json_encode(array('code'=>-1,'key'=>'不能大于5个字符哦','msg'=>'不能大于5个字符哦')));
// }
//参数设置
$urls = [
    'http://m1.dwstatic.com/huodong/shouji3/201804/388/05/5ad5dc03be1c0d4d2afdf1307162b430.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/388/13/1777a2cb3c0e4daf6229a9ca8f60be1e.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/388/20/7fd94b37506e0305708ec50a7597388e.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/388/28/0143922fd0dfd05831beca9ab559d505.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/388/34/11b16a18d5d3ac500868dfec228745fe.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/388/42/cdb33c817355b548e01e71e2d628a6e4.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/388/52/924399f1e5ff5b49d38890150c5fff27.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/388/60/3bada1cbeb0ea444fbe8ea880a308fc9.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/388/68/4d1e205573d3c1cc4153280662cffd51.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/388/81/86e4faf51474bcac2b2b023e5b75cc6a.jpg'
];
$url = $urls[array_rand($urls)];
$fontFile = '../font/msyh.ttf';
$im = imagecreatefromjpeg($url);
$color = imagecolorallocate($im, 5, 44, 173);
imagettftext($im, 38, 0, 322.5-getBoxWidth(37, $fontFile, $name)/2, 105.5, $color, $fontFile, $name);

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>'被暗恋几率','url'=>$img)));
