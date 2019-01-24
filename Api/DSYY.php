<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
preg_match_all('/./u', trim($name), $namearr);
// if(count($namearr[0])>4){
//     exit(json_encode(array('code'=>-1,'key'=>'不能大于4个字符哦','msg'=>'不能大于4个字符哦')));
// }

$text = '在单身汪中气质接近：';

$im_arr = [
	'http://m2.dwstatic.com/bi_material/201708/25/955086248d93d859bca154f4ea0b027a1503664696807388631.jpg',
	'http://m2.dwstatic.com/bi_material/201708/25/955086248d93d859bca154f4ea0b027a1503664696376159175.jpg',
	'http://m2.dwstatic.com/bi_material/201708/25/955086248d93d859bca154f4ea0b027a1503664696634908572.jpg',
	'http://m2.dwstatic.com/bi_material/201708/25/955086248d93d859bca154f4ea0b027a1503664697187793809.jpg',
	'http://m2.dwstatic.com/bi_material/201708/25/955086248d93d859bca154f4ea0b027a1503664697374951360.jpg',
	'http://m2.dwstatic.com/bi_material/201708/25/955086248d93d859bca154f4ea0b027a1503664697295843653.jpg',
	'http://m2.dwstatic.com/bi_material/201708/25/955086248d93d859bca154f4ea0b027a1503664698985801599.jpg',
	'http://m2.dwstatic.com/bi_material/201708/25/955086248d93d859bca154f4ea0b027a1503664698111485509.jpg',
	'http://m2.dwstatic.com/bi_material/201708/25/955086248d93d859bca154f4ea0b027a1503664698754242863.jpg',
];

$im = imagecreatefromjpeg($im_arr[array_rand($im_arr)]);
// $gai = 'http://m1.dwstatic.com/huodong/shouji3/201808/214/66/a2009ebd74964bca84ff235a9fca5308.png';
// $top = imagecreatefrompng($gai);
// list($k,$g)=getimagesize($gai);
// imagecopyresampled($im, $top, 0, 0, 0, 0, $k, $g, $k, $g);

$color = imagecolorallocate($im, 255, 6, 6);
$color2 = imagecolorallocate($im, 0, 0, 0);
$fontfile = '../font/hyyytj.ttf';
imagettftext($im, 48*0.75, 0, 45, 138, $color, $fontfile, $name);
imagettftext($im, 42*0.75, 0, 55 + getBoxLeft(48*0.75, $fontfile, $name), 138, $color2, $fontfile, $text);

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>'单身类型','url'=>$img)));

