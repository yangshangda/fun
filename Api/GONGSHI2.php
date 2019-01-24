<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
//接受处理参数
// preg_match_all('/./u', $name, $nameArr);
// if(count($nameArr[0]) == 0 || count($nameArr[0])>4){
//     exit(json_encode(array('code'=>-1,'key'=>'不能大于4个字符哦','msg'=>'不能大于4个字符哦')));
// }

$name1 = 'nv';

//参数设置
if ($name1 == '男') {
	$urls = array(
		'../source_img/gongshi2/1.jpg',
		'../source_img/gongshi2/2.jpg',
		'../source_img/gongshi2/3.jpg',
		'../source_img/gongshi2/4.jpg',
		'../source_img/gongshi2/5.jpg',
		'../source_img/gongshi2/6.jpg',
		'../source_img/gongshi2/7.jpg',
		'../source_img/gongshi2/8.jpg',
		'../source_img/gongshi2/9.jpg',
		'../source_img/gongshi2/10.jpg',
	);
} else {
	$urls = array(
		'../source_img/gongshi/1.jpg',
		'../source_img/gongshi/2.jpg',
		'../source_img/gongshi/3.jpg',
		'../source_img/gongshi/4.jpg',
		'../source_img/gongshi/5.jpg',
		'../source_img/gongshi/6.jpg',
		'../source_img/gongshi/7.jpg',
		'../source_img/gongshi/8.jpg',
	);
}

$url = $urls[array_rand($urls)];

$fontfile = '../font/rzh.ttf';
$fontsize = 60*0.75;

$im = imagecreatefromjpeg($url);
list($width,$height) = getimagesize($url);
$color = imagecolorallocate($im, 247, 251, 247);
imagettftext($im, $fontsize, 0, 62, 275, $color, $fontfile, $name);


$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'公式girl','url'=>$img)));
