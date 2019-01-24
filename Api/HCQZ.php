<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
//接受处理参数
preg_match_all('/./u', $name, $nameArr);
// if(count($nameArr[0]) == 0 || count($nameArr[0])>4){
//     exit(json_encode(array('code'=>-1,'key'=>'不能大于4个字符哦','msg'=>'不能大于4个字符哦')));
// }

//獲取緩存圖片
// $redis = getRedisConnection();
// $haoche_key = md5('HAOCHEQIZHI'.$type);
// $name_key = md5('HAOCHEQIZHINAME'.$name);
// $rst = $redis->hget($haoche_key,$name_key);
// if (!empty($rst)) exit(json_encode(array('code'=>1,'name'=>$name.'豪车气质','key'=>$save_path.$savename,'url'=>$rst)));

//参数设置
$urls = array(
	'http://m1.dwstatic.com/huodong/shouji3/201801/537/41/7666c380f375d4e0fe9198ddeb601f25.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201801/537/62/be33fda4e74ea2b2314016cdda47d399.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201801/537/80/20c4a0bd63059a2270a130384b969512.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201801/537/98/31fe7ee4c819134b81a65b4b0246c904.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201801/538/21/25c5604ce755eb0a1354a5360b965552.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201801/538/45/cffccada6db45ab0ccfe3c4440e784f8.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201801/538/64/92401b297e268aa9d537261216bfb73b.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201801/538/83/7b525d89736671195d6a0090b5f9e7b4.jpg',
);
$url = $urls[array_rand($urls)];

$fontfile = '../font/msyh.ttf';
$fontsize = 66*0.75;
$im = imagecreatefromjpeg($url);
list($width,$height) = getimagesize($url);
$x = 98;
if (count($nameArr[0]) == 4) $x = 70;
$color = imagecolorallocate($im, 215, 193, 107);
imagettftext($im, $fontsize, 0, $x, 130, $color, $fontfile, $name.'的气质适合开');

$img = uploadImg($id,$im,'jpg');

// 對圖片緩存
// $redis->hset($haoche_key,$name_key,$serverHost.$save_path.$savename);

exit(json_encode(array('code'=>1,'name'=>$name.'豪车气质','url'=>$img)));
