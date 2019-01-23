<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];

$url = 'http://v3.dwstatic.com/zbshenqi/201811/09/3ad7a920f979e55b189a253926390000.jpg';

    $im = imagecreatefromjpeg($url);
    $color = imagecolorallocate($im, 0, 0, 0);
    $font = '../font/msyhbd.ttf';
    $font_size = 74*0.75;

    imagettftext($im, $font_size, 0, 23, 250, $color, $font, $name);

$img = uploadImg($id,$im,'jpg');

    exit(json_encode(array('code'=>1,'name'=>$name.'猪','url'=>$img)));