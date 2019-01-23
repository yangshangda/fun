<?php
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
$urls = [
    'http://m1.dwstatic.com/huodong/shouji3/201804/129/67/073c84e5527ad8510d4dfece5ee93a26.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/129/75/e0c6db03390e20fa2aad261d95bb455a.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/129/82/d2758da074a1042da4d19ee569d3c62d.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/129/89/3f98a8c74d2a814ae65d76168d0a295c.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/129/96/13d689617671b55857c90f7882ed44d5.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/130/03/e577a8eb8b8cb6256f10388e6f30e431.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/130/09/91d17395f4360bd7b780650e7779e6ff.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/130/17/324be3c41880a627878520aafec7825e.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/130/38/0d8d49b0e646677ab902768141d79c33.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/130/54/5df58483687a5221d4ece5015240ff94.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/130/68/b561df0e1ebb8bd1d1f19851421c8f4b.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/130/77/ad2b5f060120273f57b26802e6058d50.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/130/85/70da8529abc2b4924514c8435fbfd0b4.jpg',
];
function getBoxWidth($font_size,$font,$text){
    $box = imagettfbbox($font_size, 0, $font, $text);
    return $box[2] - $box[0];
}
//参数设置
$url = $urls[array_rand($urls)];
$fontFile = '../font/msyh.ttf';
$im = imagecreatefromjpeg($url);
list($width,$height) = getimagesize($url);
$color = imagecolorallocate($im, 1, 1, 1);
$name = $name.'将这样度过五一';
imagettftext($im, 62*0.75, 0, ($width-getBoxWidth(62*0.75, $fontFile, $name))/2, 160, $color, $fontFile, $name);

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'五一去哪里玩','url'=>$img)));