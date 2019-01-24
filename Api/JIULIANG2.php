<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
//接受处理参数
preg_match_all('/./u', $name, $nameArr);
// if(count($nameArr[0]) == 0 || count($nameArr[0])>3){
//     exit(json_encode(array('code'=>-1,'key'=>'不能大于3个字符哦','msg'=>'不能大于3个字符哦')));
// }

//参数设置
$urls = array(
	'../source_img/jiuliang/1.jpg',
	'../source_img/jiuliang/2.jpg',
	'../source_img/jiuliang/3.jpg',
	'../source_img/jiuliang/4.jpg',
	'../source_img/jiuliang/5.jpg',
	'../source_img/jiuliang/6.jpg',
);
$url = $urls[array_rand($urls)];

$fontfile = '../font/fzqtjw.ttf';
$fontsize = 48*0.75;
$name1 = mb_substr($name, 0,1,'utf8');
$name2 = mb_substr($name, 1,1,'utf8');
$name3 = mb_substr($name, 2,1,'utf8');

$im = imagecreatefromjpeg($url);
list($width,$height) = getimagesize($url);
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, $fontsize, 0, 275, 129, $color, $fontfile, $name1);
imagettftext($im, $fontsize, 0, 275, 191, $color, $fontfile, $name2);
imagettftext($im, $fontsize, 0, 275, 255, $color, $fontfile, $name3);

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'酒量','url'=>$img)));
