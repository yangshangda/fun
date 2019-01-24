<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
preg_match_all('/./u', $name, $namearr);
// if(count($namearr[0])>4){
//     exit(json_encode(array('code'=>-1,'key'=>'不能大于4个字符哦','msg'=>'不能大于4个字符哦')));
// }

$word = ['变态','智慧','鬼畜','很宅','幽默','贪吃','甜美','神经','善良','魄力','勇猛','黑心','腹黑','天使','可爱','迟疑','中二','颜控','爱美','伤感','开朗'];
$cover = [
'http://m2.dwstatic.com/huodong/shouji3/201709/860/99/5718882092b116f2d14af9e8683aae1e.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201709/861/51/abedee6eebffaa82fdac130d2b9f0b4c.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201709/861/84/7325128e33742460d99c05b374ef2eb9.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201709/862/09/65f8705ddb639f08f76ea31ea18c938b.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201709/862/34/0b74fac4f6dc9d7a27bcb2c5adc20399.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201709/862/68/88aaba1f60930cae842f951739b68eeb.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201709/862/89/f2e2b56b4e687206ddfbb634405fcdda.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201709/863/09/c61077f8d4ea7b485e7dd1cd3b69125d.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201709/863/30/2812d969863f2579ccafe3f27d986f96.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201709/863/65/7e4dffbf7b78bfbef11e1fb2f2b43c35.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201709/863/86/1412c928abf587a8ef4849997d41ebd3.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201709/864/08/15233e22e2ec82de6376b4f1b3ba35c3.jpg',
];


//$memcache = getMemcacheConnection();
//$key = md5($type.$name);
//$currentNameWord = $memcache->get($key);
//if (!empty($currentNameWord)) {
	//$nameWord = unserialize($currentNameWord);
//}else{
	$namekey = array_rand($cover);
	switch ($namekey) {
		case '0':
			$wordkey = array_rand($word);
			break;
		case '1':
			$wordkey = array_rand($word,4);
			break;
		case '2':
			$wordkey = array_rand($word,3);
			break;
		case '3':
			$wordkey = array_rand($word,4);
			break;
		case '4':
			$wordkey = array_rand($word,3);
			break;
		case '5':
			$wordkey = array_rand($word,2);
			break;
		case '6':
			$wordkey = array_rand($word,4);
			break;
		case '7':
			$wordkey = array_rand($word,3);
			break;
		case '8':
			$wordkey = array_rand($word,3);
			break;
		case '9':
			$wordkey = array_rand($word,4);
			break;
		case '10':
			$wordkey = array_rand($word,2);
			break;
		case '11':
			$wordkey = array_rand($word,3);
			break;
	}	
	$nameWord['namekey'] = $namekey; 
	$nameWord['wordkey'] = $wordkey; 
	//$memcache->set($key, serialize($nameWord), 10*24*60*60);
//}

$title = $name.'的性格成分分析表';
$im = imagecreatefromjpeg($cover[$nameWord['namekey']]);
$color1 = imagecolorallocate($im, 231, 71, 86);
$color2 = imagecolorallocate($im, 0, 0, 0);
$fontfile = '../font/msyhbd.ttf'; 
imagettftext($im, 44*0.75, 0, 138, 106, $color1, $fontfile, $title);
switch ($nameWord['namekey']) {
	case '0':
		imagettftext($im, 50*0.75, 0, 605, 325, $color2, $fontfile, $word[$nameWord['wordkey']]);
		break;
	case '1':
		imagettftext($im, 50*0.75, 0, 92, 230, $color2, $fontfile, $word[$nameWord['wordkey'][0]]);
		imagettftext($im, 50*0.75, 0, 71, 477, $color2, $fontfile, $word[$nameWord['wordkey'][1]]);
		imagettftext($im, 50*0.75, 0, 130, 550, $color2, $fontfile, $word[$nameWord['wordkey'][2]]);
		imagettftext($im, 50*0.75, 0, 646, 316, $color2, $fontfile, $word[$nameWord['wordkey'][3]]);
		break;
	case '2':
		imagettftext($im, 50*0.75, 0, 165, 245, $color2, $fontfile, $word[$nameWord['wordkey'][0]]);
		imagettftext($im, 50*0.75, 0, 90, 507, $color2, $fontfile, $word[$nameWord['wordkey'][1]]);
		imagettftext($im, 50*0.75, 0, 581, 222, $color2, $fontfile, $word[$nameWord['wordkey'][2]]);
		break;
	case '3':
		imagettftext($im, 50*0.75, 0, 127, 217, $color2, $fontfile, $word[$nameWord['wordkey'][0]]);
		imagettftext($im, 50*0.75, 0, 100, 306, $color2, $fontfile, $word[$nameWord['wordkey'][1]]);
		imagettftext($im, 50*0.75, 0, 149, 537, $color2, $fontfile, $word[$nameWord['wordkey'][2]]);
		imagettftext($im, 50*0.75, 0, 654, 257, $color2, $fontfile, $word[$nameWord['wordkey'][3]]);
		break;
	case '4':
		imagettftext($im, 50*0.75, 0, 24, 241, $color2, $fontfile, $word[$nameWord['wordkey'][0]]);
		imagettftext($im, 50*0.75, 0, 61, 490, $color2, $fontfile, $word[$nameWord['wordkey'][1]]);
		imagettftext($im, 50*0.75, 0, 634, 258, $color2, $fontfile, $word[$nameWord['wordkey'][2]]);
		break;
	case '5':
		imagettftext($im, 50*0.75, 0, 33, 237, $color2, $fontfile, $word[$nameWord['wordkey'][0]]);
		imagettftext($im, 50*0.75, 0, 639, 467, $color2, $fontfile, $word[$nameWord['wordkey'][1]]);
		break;
	case '6':
		imagettftext($im, 50*0.75, 0, 113, 213, $color2, $fontfile, $word[$nameWord['wordkey'][0]]);
		imagettftext($im, 50*0.75, 0, 83, 304, $color2, $fontfile, $word[$nameWord['wordkey'][1]]);
		imagettftext($im, 50*0.75, 0, 145, 542, $color2, $fontfile, $word[$nameWord['wordkey'][2]]);
		imagettftext($im, 50*0.75, 0, 658, 254, $color2, $fontfile, $word[$nameWord['wordkey'][3]]);
		break;
	case '7':
		imagettftext($im, 50*0.75, 0, 151, 243, $color2, $fontfile, $word[$nameWord['wordkey'][0]]);
		imagettftext($im, 50*0.75, 0, 108, 510, $color2, $fontfile, $word[$nameWord['wordkey'][1]]);
		imagettftext($im, 50*0.75, 0, 583, 229, $color2, $fontfile, $word[$nameWord['wordkey'][2]]);
		break;
	case '8':
		imagettftext($im, 50*0.75, 0, 65, 234, $color2, $fontfile, $word[$nameWord['wordkey'][0]]);
		imagettftext($im, 50*0.75, 0, 62, 487, $color2, $fontfile, $word[$nameWord['wordkey'][1]]);
		imagettftext($im, 50*0.75, 0, 634, 251, $color2, $fontfile, $word[$nameWord['wordkey'][2]]);
		break;
	case '9':
		imagettftext($im, 50*0.75, 0, 109, 223, $color2, $fontfile, $word[$nameWord['wordkey'][0]]);
		imagettftext($im, 50*0.75, 0, 62, 487, $color2, $fontfile, $word[$nameWord['wordkey'][1]]);
		imagettftext($im, 50*0.75, 0, 131, 557, $color2, $fontfile, $word[$nameWord['wordkey'][2]]);
		imagettftext($im, 50*0.75, 0, 650, 321, $color2, $fontfile, $word[$nameWord['wordkey'][3]]);
		break;
	case '10':
		imagettftext($im, 50*0.75, 0, 25, 288, $color2, $fontfile, $word[$nameWord['wordkey'][0]]);
		imagettftext($im, 50*0.75, 0, 617, 322, $color2, $fontfile, $word[$nameWord['wordkey'][1]]);
		break;
	case '11':
		imagettftext($im, 50*0.75, 0, 25, 289, $color2, $fontfile, $word[$nameWord['wordkey'][0]]);
		imagettftext($im, 50*0.75, 0, 83, 548, $color2, $fontfile, $word[$nameWord['wordkey'][1]]);
		imagettftext($im, 50*0.75, 0, 617, 322, $color2, $fontfile, $word[$nameWord['wordkey'][2]]);
		break;
}

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'性格成分分析','url'=>$img)));

