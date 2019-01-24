<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
function getBoxWidth($font_size,$font,$text){
    $box = imagettfbbox($font_size, 0, $font, $text);
    return $box[2] - $box[0];
}
//接受处理参数
preg_match_all('/./u', $name, $nameArr);
// if(count($nameArr[0]) == 0 || count($nameArr[0])>4){
//     exit(json_encode(array('code'=>-1,'key'=>'不能大于4个字符哦','msg'=>'不能大于4个字符哦')));
// }

$name1 = 'nv';

//参数设置
if ($name1 == 'man') {
	$url = 'http://m1.dwstatic.com/huodong/shouji3/201803/019/71/fb041d55c5f3cf573c0d95eb31ade9ee.jpg';
	$y = '263';
} else {
	$url = 'http://m1.dwstatic.com/huodong/shouji3/201803/020/39/55e68c5610b2cc12cff1a656e8e71117.jpg';
	$y = '363';
}

$fontfile = '../font/fzstk.ttf';
$fontsize = 36*0.75;

$im = imagecreatefromjpeg($url);
list($width,$height) = getimagesize($url);
$color = imagecolorallocate($im, 204, 204, 204);
imagettftext($im, $fontsize, 0, ($width - getBoxWidth($fontsize,$fontfile,$name))/2 - 10, $y, $color, $fontfile, $name);

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'情侣唯美2','url'=>$img)));
	