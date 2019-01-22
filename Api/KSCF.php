<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
// preg_match_all('/./u', trim($name), $namearr);
// if(count($namearr[0])>4){
//     exit(json_encode(array('code'=>-1,'key'=>'不能大于4个字符哦','msg'=>'不能大于4个字符哦')));
// }
function getBoxLeft($font_size, $font_family, $content) {
	$box = imagettfbbox($font_size, 0, $font_family, $content);
	$width = $box[2] - $box[0];
	return $width;
}
//公众号二维码
// 12月7日更新
$cover = [
'http://m2.dwstatic.com/huodong/shouji3/201712/112/67/372191a426b3feb797aad4c95f20126b.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/112/97/c876b74dd74f07cc1434417bf673a10c.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/113/12/11c3d8037e8931ea40b212390cd0326d.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/113/31/39c472af8a7a0077546a4fdfdd3fe9b0.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/113/50/28da88435518019f6e306e95de091d69.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/113/73/ddaec51c2be739e298d0767d6dbd7048.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/113/91/9b2cda6d1a45d40251e33046428a2dfe.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/114/12/6cd5a7cb35e20aa7029bcfda90cb591d.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/114/29/c91cdb03dd847dfe82173c0736e1af55.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/114/50/d710ff10352d08633173ecb0cfb99516.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/114/68/459dfc240e26d460f6f74574cbcb5163.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/114/87/f1b08b64ff23bbc59650de49a61bde6b.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/115/06/f933e28723b9fb62512d681e0f60c56c.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/115/24/6df94296bed440f3f2bd18fd640f3f37.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/115/51/2ae5ad673957417e35dcaf2fbf069576.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/116/21/1c76a168b45fc220f18c539114e4e447.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/116/41/5353ad3c9ab344d2cfbc6577c0d3edf7.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/116/62/26e53f4d79841f0cbcc45df879f58be4.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/116/84/487504bf3cc2268cd585f401532c68f1.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/117/02/29414a832975890963080933ae9072d3.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/117/24/cb628e21677f3f104d7e0b6fb118c85b.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/117/41/7794926eb1126f1fad65b0ad91117fdd.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/117/58/dfeb772123c07c581f2e7b29c003d957.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/117/77/31c58942ad7a67c768cc78ef42c10669.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/118/05/b8acaba9db5128646561c3b32784afb8.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/118/21/6fca320a32d0e4452b5e327c9c888408.jpg',
];
//官网二维码
$cover2 = [
'http://m2.dwstatic.com/huodong/shouji3/201712/251/35/7ddc6e382c1ede18b24962c79e1d4d26.jpg',
'http://m1.dwstatic.com/huodong/shouji3/201712/484/94/1eea20417f0fa8415fc7f7f4ec069d8c.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/251/70/c6451c36861e659314ab33e13411eb6e.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/251/88/702c341f58dfed9abddcd182a60964ee.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/252/02/a0a43179f442ab5403e02d39a7c9f7a9.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/252/24/4fef4a2c3cb671fe466d2db32f020e53.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/252/43/5729365c37449ec50337b281e592a774.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/252/80/b2a8d02e11676241eed0f6f8a24afa5c.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/252/99/2f843b22d616e1c92cc65e3c0049c610.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/253/17/8f968e793d62a86294de099fd92db795.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/253/34/680bed7b59186f5070ce13bc64acd87d.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/253/50/925b3072e7294de3f08342072ea060e1.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/253/70/56cc81f0bf356fbb08eb59d9c88a8862.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/253/88/1366531d2d406de12f968953e404253c.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/254/04/1eda80baa0bb834ea501b1d294a20267.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/254/21/6314c2b5b75e7bf2cbbb1e61e76a5a2e.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/254/38/6199208f6663bdf4abf79f3938fa15d6.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/254/64/681c7f9ed32b2e9707a687abab6c32e3.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/254/81/22722b3a7fd703dda2fb379fcb79bafb.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/254/96/2747ba94d45bc11c20385577e38dc956.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/255/14/95e841fd728d642880d7e773ac0de670.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/255/30/2004e59cba24b4e2d211b09c17225ff0.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/255/46/9cddc18a8bf08648f8b47c934a8171d8.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/255/61/daf64a475052aa1c35df1006ad4d220f.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/255/83/7b631d91843c4ce2dfe1cd5bce8c8762.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201712/256/00/7ade0ff260564eb5397fb88dc574c7c9.jpg',
];

//官网二维码
$cover3 = [
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a9341cf31a5cd6cbc6b7c7b70000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a9342ff31a5cdacbd6b7d7b70000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a93435f31a5cd4cbdcb7ddb70000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a9343bf31a5cd3cbe6b7e7b70000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a93443f31a5cd8cbf0b7f1b70000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a9344cf31a5cd4cbf4b7f5b70000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a92055f31a5c99569a089b080000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a9345bf31a5cd6cbfcb7fdb70000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a93466f31a5cd4cb08b809b80000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a9346ef31a5cd6cb16b817b80000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a93474f31a5cd4cb1cb81db80000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a9347bf31a5cedcb2cb82db80000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a93483f31a5c00cc32b833b80000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a9348cf31a5cd6cb3cb83db80000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a93495f31a5cffcb42b843b80000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a9349bf31a5cd7cb48b849b80000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a934a3f31a5cdacb52b853b80000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a934a9f31a5c00cc5ab85bb80000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a934aff31a5cd3cb5cb85db80000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a934b5f31a5cd9cb64b865b80000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a920c0f31a5c9d560c090d090000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a920c7f31a5c9e56120913090000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a920cdf31a5c9e56140915090000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a920d5f31a5c93561c091d090000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a934def31a5cd6cb7eb87fb80000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a920e5f31a5c9f56220923090000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a934ecf31a5cd8cb86b887b80000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a920f3f31a5c99562a092b090000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a920fcf31a5c9956300931090000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a93403f41a5cd6cb9cb89db80000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a9340bf41a5cd6cba2b8a3b80000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a92011f41a5c98564c094d090000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a92017f41a5c9256500951090000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a9201ff41a5c9956540955090000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a93424f41a5cdbcbb4b8b5b80000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a9202cf41a5c9a565c095d090000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a92033f41a5c94566a096b090000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a9203ef41a5c9d56720973090000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a9344bf41a5cd2cbdcb8ddb80000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a93450f41a5cdccbf0b8f1b80000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a9205bf41a5c9c56980999090000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a93463f41a5cd1cbfeb8ffb80000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a9346bf41a5c00cc06b907b90000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a92073f41a5c9a56ae09af090000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a9347ef41a5cdacb18b919b90000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a93485f41a5cffcb22b923b90000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a9348ef41a5cd3cb28b929b90000.jpg',
	'http://v3.dwstatic.com/zbshenqi/201812/20/3ad7a93494f41a5cdacb2eb92fb90000.jpg',
];

$im_key = array_rand($cover3);
$im = imagecreatefromjpeg($cover3[$im_key]); //新二维码
$color = imagecolorallocate($im, 0, 0, 0);
$fontfile = '../font/HeiTi.ttf';
// imagettftext($im, 36*0.75, 0, 10, 136, $color, $fontfile, $name);
imagettftext($im, 36*0.75, 0, 200-getBoxLeft(36*0.75,$fontfile,$name)/2, 136, $color, $fontfile, $name);


$img = uploadImg($id,$im,'jpg');

exit(json_encode(array('code'=>1,'name'=>$name.'靠啥吃饭','url'=>$img)));








