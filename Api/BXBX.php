<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
	function getBoxWidth($font_size,$font,$text){
        $box = imagettfbbox($font_size, 0, $font, $text);
        return $box[2] - $box[0];
    }
	preg_match_all('/./u', trim($name), $namearr);
	// if(count($namearr[0])>6){
	//     	exit(json_encode(array('code'=>-1,'key'=>'不能大于6个字符哦','msg'=>'不能大于6个字符哦')));
	// 	} 
	$url = 'http://m1.dwstatic.com/huodong/shouji3/201807/975/84/27d0bc8e715f366cf937b6a08342e549.png';
	$cover = imagecreatefrompng($url);
	list($x, $y) = getimagesize($url);
	$im = imagecreatefromjpeg('http://m1.dwstatic.com/huodong/shouji3/201807/975/58/daa68cff534714fcce189b141ee7eb16.jpg');
	$color = imagecolorallocate($im, 255, 255, 255);
	$fontfile = '../font/msyh.ttf';
	$size = 48*0.65;
	imagettftext($im, $size, 0, (450-getBoxWidth($size, $fontfile, $name))/2, 400, $color, $fontfile, $name);
	imagecopyresized($im, $cover, 0, 0, 0, 0, $x, $y, $x, $y);

$img = uploadImg($id,$im,'jpg');
	exit(json_encode(array('code'=>1,'name'=>'不想不想','url'=>$img)));