<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];

// $name：获取用户上传的头像
//$imgpath='http://m1.dwstatic.com/huodong/shouji3/201805/171/17/444451a3b1e32f04c491a28bf90d961f.jpg';
//$name=roundedCorners($imgpath);
//var_dump("aaa");die;

$imgs = [
		'http://v3.dwstatic.com/zbshenqi/201810/08/3ad7a9347244bb5b396f782579250000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201810/08/3ad7a9347d44bb5b416fa225a3250000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201810/08/3ad7a9348944bb5b3f6fd225d3250000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201810/08/3ad7a9349444bb5b366fee25ef250000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201810/08/3ad7a9209e44bb5b8806b108b2080000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201810/08/3ad7a934aa44bb5b376f522653260000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201810/08/3ad7a934aa44bb5b376f522653260000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201810/08/3ad7a920c244bb5b95063b093c090000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201810/08/3ad7a934ce44bb5b3e6fb626b7260000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201810/08/3ad7a920da44bb5b8c06550956090000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201810/08/3ad7a920e744bb5b8e06670968090000.jpg',
		'http://v3.dwstatic.com/zbshenqi/201810/08/3ad7a9202e45bb5b8a06570a580a0000.jpg'

	];

$url = $imgs[mt_rand(0,11)];
$fontfile = '../font/HeiTi.ttf';
$fontsize = 40*0.75;

// 合成图片
$im = imagecreatefromjpeg($url);
list($width,$height) = getimagesize($url);

$bg = imagecreatefrompng('http://v3.dwstatic.com/zbshenqi/201811/12/3ad7a9204b2be95b1a9adfd9e0d90000.png');
// 添加文字
$color = imagecolorallocate($im, 59, 57, 57);
imagecopy($im, $bg, 0, 0, 0, 0, $width, $height);
imagettftext($im, $fontsize, 0, 380, 285, $color, $fontfile, $name);
// 保存图片
$img = uploadImg($id,$im,'jpg');
// 返回结果
exit(json_encode(array('code'=>1,'name'=>$name.'前世死因分析','url'=>$img)));