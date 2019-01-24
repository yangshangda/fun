<?php
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
function getBoxLeft($font_size, $font_family, $content) {
	$box = imagettfbbox($font_size, 0, $font_family, $content);
	$width = $box[2] - $box[0];
	return $width;
}
$url_array = array(
	'http://m1.dwstatic.com/huodong/shouji3/201808/541/06/a40ed1b7c90b0b67e1ff1760ca8eea6f.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201808/541/48/3c7d4d9c7db3c08906dbab3f98d51a48.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201808/541/66/b8b66056827761b027320354b8beacbe.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201808/541/80/6bae315107f296c939b25520e723cf74.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201808/543/82/8f40b679d50f2f3bc5960f0b1a709506.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201808/543/97/2e8397a57cca2794547d813c70b1c61c.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201808/544/16/83ec7b92988e2eb95c1295b79868ded2.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201808/544/31/70e5337c1c24aed94c455695b709a5b4.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201808/544/48/56f92c1e05a93bea07039e8bea59e77e.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201808/544/63/d1210c2f6058f3feff5c3f6f4d47744f.jpg',
);
// $memcache = getMemcacheConnection();
// $key = md5($type.$name);
// $currentRate = $memcache->get($key);
// if (!empty($currentRate) || $currentRate === 0) 
// {
// 	$url = $currentRate;
// }else{
// 	// $url = $imgs[mt_rand(0,8)];	
// 	//系统图地址
//  $suiji = rand(0,9);
// $url = $url_array[$suiji];
// 	$memcache->set($key, $url, 30*24*60*60);
// }
$suiji = rand(0,9);
$url = $url_array[$suiji];

//读取图片到缓存
$cover =imagecreatefromjpeg($url);
//获取系统图大大小
list($width,$height)= getimagesize ($url);

//建立背景图
$im=imagecreatetruecolor($width,$height);
//覆盖系统图
imagecopy($im,$cover,0,0,0,0,$width,$height);

//添加名字
//字体颜色设置
$black = imagecolorallocate($im,21,19,19);
// $whlie = imagecolorallocate($im,255,255,255);
$font = '../font/HeiTi.ttf';//字体
$text = $name.'外在人格';
$text1 = $name.'内在人格';

// $font = 'font/fzst	'
// if (mb_strlen($text,'utf-8') > 22) {//判断长度
//         exit(json_encode(array('code'=>-1,'key'=>'名字超出限制，最多输入22个字','msg'=>'名字超出限制，最多输入22个字')));
//     } ;
imagettftext($im,28,0,235-getBoxLeft(28,$font,$text)/2,93,$black,$font,$text);
imagettftext($im,28,0,235-getBoxLeft(28,$font,$text)/2,578,$black,$font,$text1);

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'内在人格','url'=>$img)));
