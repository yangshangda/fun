<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];

$url = 'http://m1.dwstatic.com/huodong/shouji3/201809/554/14/8d48c2db7cc1cdeb5116fd4de227039e.jpg';



    $im = imagecreatefromjpeg($url);
    $color = imagecolorallocate($im, 15, 17, 27);
    $font = '../font/msyh.ttf';
    $font_size = 18;

    imagettftext($im, $font_size, 0, 287, 245, $color, $font, $name.'。加油！');

$img = uploadImg($id,$im,'jpg');
    exit(json_encode(array('code'=>1,'name'=>$name.'马云退休','url'=>$img)));