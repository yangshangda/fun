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
    'http://m1.dwstatic.com/huodong/shouji3/201804/381/04/0dd3e8e55d8903bcbc1d30d529d7985a.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/381/11/c043563174939c82dddf0ed5331c19e6.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/381/19/fd252685c2116c4e0f6d5b66baa551c3.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/381/27/38a2d4df77c2852dd7add211e2da5313.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/381/38/0ac7a689fd6fbce680010176d60e92f1.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/381/45/5a9ebede596d956f8a2072459de9cba4.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/381/56/e132b34292a9023ed3ab04b7256862ff.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/381/65/901e5c75f9d2a24fa297042e24671562.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/381/77/dbbc8b5daec798e4b10e65c48316e3e9.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201804/381/85/b4c1ee63c43ef4001e88c76e79cc0c8e.jpg',
];
$url = $urls[array_rand($urls)];
$fontFile = '../font/msyh.ttf';
$im = imagecreatefromjpeg($url);
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, 70, 0, 120, 350, $color, $fontFile, $name);

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>'人品价值','url'=>$img)));
