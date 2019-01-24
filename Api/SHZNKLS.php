<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
function getBoxWidth($font_size,$font,$text){
    $box = imagettfbbox($font_size, 0, $font, $text);
    return $box[2] - $box[0];
}
// 获取
// $redis = getRedisConnection();
// $redis_hash = md5('SHZNKLS'.$type);
// $redis_key = md5('SHZNKLS_KEY'.$name);
// $url = $redis->hget($redis_hash,$redis_key);
//if (empty($url)) {
	//参数设置
	$urls = array(
		'../source_img/shznkls/1.jpg',
		'../source_img/shznkls/2.jpg',
		'../source_img/shznkls/3.jpg',
		'../source_img/shznkls/4.jpg',
		'../source_img/shznkls/5.jpg',
		'../source_img/shznkls/6.jpg',
		'../source_img/shznkls/7.jpg',
		'../source_img/shznkls/8.jpg',
		'../source_img/shznkls/9.jpg',
		'../source_img/shznkls/10.jpg',
		'../source_img/shznkls/11.jpg',
		'../source_img/shznkls/12.jpg',
	);
	$url = $urls[array_rand($urls)];
	//$redis->hset($redis_hash,$redis_key,$url);
//}

$fontfile = '../font/fzsejw.ttf';
$fontsize = 60*0.75;

$im = imagecreatefromjpeg($url);
list($width,$height) = getimagesize($url);
$color = imagecolorallocate($im, 242, 242, 242);
imagettftext($im, $fontsize, 0, ($width - getBoxWidth($fontsize,$fontfile,$name))/2, 235, $color, $fontfile, $name);

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'适合做哪科老师','url'=>$img)));
