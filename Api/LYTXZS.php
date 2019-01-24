<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
//preg_match_all('/./u', trim($name), $namearr);
// if(count($namearr[0])>4){
//     exit(json_encode(array('code'=>-1,'key'=>'不能大于4个字符哦','msg'=>'不能大于4个字符哦')));
// }
$im_url = [
'http://m2.dwstatic.com/huodong/shouji3/201705/221/56/5b8149f37c1364844973f2b1c4c5acb0.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201705/221/73/dca360600cf749931e223b1f23d7cb90.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201705/221/85/3b4331512a17e9b9d9c2848ba2f3212e.jpg',
];

$prob = array_rand($im_url);
if ($prob == 0) {
	$im = imagecreatefromjpeg($im_url[0]);
	$num = mt_rand(70,100).'%';
}else if ($prob == 1) {
	$im = imagecreatefromjpeg($im_url[1]);
	$num = mt_rand(30,69).'%';
} else {
	$im = imagecreatefromjpeg($im_url[2]);
	$num = mt_rand(0,29).'%';
}
$fontfile = '../font/fzsejw.ttf';
$color = imagecolorallocate($im, 194, 64, 34);
$text = $name.'的童心指数';
imagettftext($im, 30*0.75, 0, 18, 80, $color, $fontfile, $text);

$fontfile2 = '../font/msyhbd.ttf';
imagettftext($im, 54*0.75, 0, 135-getBoxWidth(54*0.75,$fontfile2,$num)/2, 153, $color, $fontfile2, $num);

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>'六一童心指数','url'=>$img)));
