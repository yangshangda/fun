<?php 
function getBoxWidth($fontsize, $font_family, $content) {
        $box = imagettfbbox($fontsize, 0, $font_family, $content);
        $width1 = $box[2] - $box[0];
        return $width1;
    }

$font = 'font/HeiTi.ttf';
$font_size = 32*0.75;

	for ($i=1; $i <= 4; $i++) { 
		$file = 'source_img/xmttx/'.$i.'.jpg';
		$cover = imagecreatefromjpeg($file);
		list($w, $h) = getimagesize($file);
		$im = imagecreatetruecolor($w, $h);
		$color = imagecolorallocate($im, 0, 0, 0);
		$text1_x = 120 - getBoxWidth($font_size, $font, $name)/2;
		$text2_x = 120 - getBoxWidth($font_size, $font, $name1)/2;
		imagecopyresampled($im, $cover, 0, 0, 0, 0, $w, $h, $w, $h);
		imagettftext($im, $font_size, 0, $text1_x, 46, $color, $font, $name);
		imagettftext($im, $font_size, 0, $text2_x, 91, $color, $font, $name1);
		$rsts[] = getImgBinary($im);
	}

	foreach ($rsts as $k => $v) {
	    $savename = $type.$md5_name.$log_date.str_pad($k, 2, '0', STR_PAD_LEFT).'.jpg';
	    $savefile = $save_path.$savename;
	    $per = imagecreatefromstring($v);
	    imagejpeg($per, $savefile);
	    unset($per);
	}

	$prePath = $save_path.$type.$md5_name.$log_date;
	exec("ffmpeg -f image2 -framerate 5 -i {$prePath}%02d.jpg {$prePath}.gif");
	
	function getImgBinary($im_handle){
    	ob_start();
    	imagejpeg($im_handle);
    	$rst = ob_get_contents();
    	ob_end_clean();
    	return $rst;
    }

    $savename = $type.$md5_name.$log_date.'.gif';
    exit(json_encode(array('code'=>1,'name'=>$name.'熊猫头挑衅','key'=>$save_path.$savename,'url'=>$serverHost.$save_path.$savename)));