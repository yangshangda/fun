<?php
include '../libs/roundedCorners.php';
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];

$cover_url = 'http://m1.dwstatic.com/huodong/shouji3/201809/243/61/915049dda3261b4b5c828edc8104f624.jpg';
$im = imagecreatefromjpeg($cover_url);
list($width,$height)= getimagesize($cover_url);

$font = '../font/pingfang.ttf';
$size = 19;
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im,$size,0,167,490,$color,$font,$name);

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'IPHONEXSMDD','url'=>$img)));
