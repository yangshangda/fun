<?php          
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];

	$trans = imagecreatetruecolor(720, 432);
	imagealphablending($trans, false);
	$transparent = imagecolorallocatealpha($trans, 255, 255, 255,127);
	imagefill($trans, 0, 0, $transparent);
	imagesavealpha($trans, true);
	$white = imagecolorallocatealpha($trans, 255, 255, 255,80);
	$font = '../font/msyhbd.ttf';

	imagettftext($trans, 40, 0, 720/2-getBoxWidth(40,$font,$name)/2, 212, $white, $font, $name);

	function getBoxWidth($font_size,$font,$text){
		$box = imagettfbbox($font_size, 0, $font, $text);
		return $box[2] - $box[0];
	}

	$textPath = $save_path.$type.$md5_name.$log_date.'.png';
	imagepng($trans,$textPath);
	exec("convert -define registry:temporary-path=/tmp {$textPath} -matte -virtual-pixel transparent -distort Perspective '0,0,100,0 0,432,-40,432 720,0,620,0 720,432,760,432' {$textPath}_distort.png");

	$text = new imagick();
	$text->readImage($textPath.'_distort.png');
	                                                     
	$imBg = new imagick('http://m2.dwstatic.com/huodong/shouji3/201610/812/96/38cfc60cb7b438cdd37cace6895acdef.jpg');
	$imBg->compositeImage($text,Imagick::COMPOSITE_ATOP,0,35);
	                                                     
	$cover = new imagick('http://m2.dwstatic.com/huodong/shouji3/201610/813/14/e168e121a5ca4c218f90986108ed7e55.png');
	$imBg->compositeImage($cover,Imagick::COMPOSITE_ATOP,0,0); 
	
	$im = imagecreatefromstring($imBg->getImageBlob());

$img = uploadImg($id,$im,'jpg');
	exit(json_encode(array('code'=>1,'name'=>$name.'马路表白','url'=>$img)));