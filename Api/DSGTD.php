<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
$im = imagecreatefromjpeg('http://v3.dwstatic.com/zbshenqi/201811/08/3ad7a93444dde35beab5476648660000.jpg');
$color = imagecolorallocate($im, 242, 248, 244);
$color1 = imagecolorallocate($im, 0, 0, 0);
$fontfile = '../font/msyhbd.ttf';
imagettftext($im, 20*0.75, 0, 5, 130, $color, $fontfile, $name);

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'单身狗脱单','url'=>$img)));


