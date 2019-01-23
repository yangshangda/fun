<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
    $url = 'http://v3.dwstatic.com/zbshenqi/201811/09/3ad7a934495ce55beab55b315c310000.jpg';

    $im = imagecreatefromjpeg($url);
    $color = imagecolorallocate($im, 0, 0, 0);
    $font = '../font/msyh.ttf';
    $font_size = 22*0.75;

    imagettftext($im, $font_size, 0, 54, 165, $color, $font, $name);

$img = uploadImg($id,$im,'jpg');
    exit(json_encode(array('code'=>1,'name'=>$name.'土双十一订单装逼','url'=>$img)));

    