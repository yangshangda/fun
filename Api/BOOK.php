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
	'http://m1.dwstatic.com/huodong/shouji3/201803/541/04/4d0f9afffb6356e4961c07ea1f7d0138.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201803/545/18/73ae7b1de32fbdb5e42af6cc343b22b1.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201803/545/34/d2431cf560ce35a448cb2bd70fb2dac1.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201803/545/48/774cdbcbbe4691e0a54697bdc392b466.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201803/545/63/68f713981d91e8f1876ac49804b4af39.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201803/545/79/391c0987f125c53bf40308dfeccfb85c.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201803/545/93/e752585342d805a4e167a847e1c05443.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201803/546/07/032eb80db93d2fc6cad96e403531f0b2.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201803/546/23/da61f265616a8e050756e357829b3418.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201803/546/39/7d4e6b9ea1dd12d1258810b82c2a6ab4.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201803/546/55/85fb2dfcfe39564a3a7ea5566a968abd.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201803/546/72/41a60d8a6373faf6676b26f3ce3de925.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201803/546/88/e2db8e6dc372871beb0b9d5c755ae3d1.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201803/547/03/43452ecd8e88d4b87169ad7a950e78aa.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201803/547/19/1c4972bb6e37b065fdde93d0d1b42dcd.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201803/547/34/576743b992102ae3787026e7fc6e2033.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201803/547/52/762d54ca02433d777570b054d9fe4b7a.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201803/547/69/996ad6024a9e6a58a535b0b3f42bfaea.jpg',
	'http://m1.dwstatic.com/huodong/shouji3/201803/547/82/082efe55c70903193438cf1cea649168.jpg',
);
$url = $urls[array_rand($urls)];

$fontfile = '../font/msyhbd.ttf';
$fontsize = 38*0.75;

$im = imagecreatefromjpeg($url);
list($width,$height) = getimagesize($url);
$color = imagecolorallocate($im, 58, 58, 58);
imagettftext($im, $fontsize, 0, 360, 497, $color, $fontfile, $name);

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'著','url'=>$img)));
