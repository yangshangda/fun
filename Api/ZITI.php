<?php
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
    function getBoxWidth($font_size, $font_family, $content) {
        $box = imagettfbbox($font_size, 0, $font_family, $content);
        $width = $box[2] - $box[0];
        return $width;
    }

	 preg_match_all('/./u', trim($name), $namearr);
	// if (count($namearr[0]) > 4) {
	//     exit(json_encode(array('code'=>-1,'key'=>'不能大于4个字符哦','msg'=>'不能大于4个字符哦')));
	// }

	$im = imagecreatefromjpeg("http://m1.dwstatic.com/huodong/shouji3/201805/821/32/f1135cee57e3f2627b8713803c69a7d4.jpg");
    $color1 = ImageColorAllocate($im, 255, 255, 255);
    $color2 = ImageColorAllocate($im, 67, 235, 245);
    $color3 = ImageColorAllocate($im, 248, 48, 48);
	$font = "../font/fzsejw.ttf";

	if (count($namearr[0]) == 1) {
	    $size1 = 300*0.75;
	    $left1 = getBoxWidth($size1, $font, $name)/2+140;
	    ImageTTFText($im, $size1, 0, 379-$left1, 378-25, $color3, $font, $name);
	    ImageTTFText($im, $size1, 0, 368-$left1, 362-25, $color2, $font, $name);
	    ImageTTFText($im, $size1, 0, 382-$left1, 372-25, $color1, $font, $name);
	}

	if (count($namearr[0]) == 2) {
	    $size2 = 200*0.75;
	    $left2 = getBoxWidth($size2, $font, $name)/2-50;
	    ImageTTFText($im, $size2, 0, 211-$left2, 334-25, $color3, $font, $name);
	    ImageTTFText($im, $size2, 0, 202-$left2, 323-25, $color2, $font, $name);
	    ImageTTFText($im, $size2, 0, 209-$left2, 330-25, $color1, $font, $name);
	}

	if (count($namearr[0]) == 3) {
	    $size3 = 150*0.75;
	    $left3 = getBoxWidth($size3, $font, $name)/2-90;
	    ImageTTFText($im, $size3, 0, 149-$left3, 334-25, $color3, $font, $name);
	    ImageTTFText($im, $size3, 0, 143-$left3, 323-25, $color2, $font, $name);
	    ImageTTFText($im, $size3, 0, 148-$left3, 330-25, $color1, $font, $name);
	}
    
    if (count($namearr[0]) == 4) {
	    $size4 = 100*0.75;
	    $left4 = getBoxWidth($size4, $font, $name)/2-130;
	    ImageTTFText($im, $size4, 0, 109-$left4, 334-40, $color3, $font, $name);
	    ImageTTFText($im, $size4, 0, 104-$left4, 326-40, $color2, $font, $name);
	    ImageTTFText($im, $size4, 0, 107-$left4, 330-40, $color1, $font, $name);
	}

$img = uploadImg($id,$im,'png');
    exit(json_encode(array('code'=>1,'name'=>'字抖音名字头像','url'=>$img)));