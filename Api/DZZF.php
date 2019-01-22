<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];

$im = imagecreatefromjpeg('http://v3.dwstatic.com/zbshenqi/201901/22/3ad7a92039e7465c79bf33c934c90000.jpg');
$name_arr = preg_split('//u', $name);
$color = imagecolorallocate($im, 250, 250, 250);
$font = '../font/fzstk.ttf';
foreach ($name_arr as $k => $v) {
	if (!empty($v)) {
		imagettftext($im, 16, 0, 180, 473+($k-1)*24, $color, $font, $v);
	}
}

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'冬至祝福','url'=>$img)));