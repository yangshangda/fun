<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
    function getBoxWidth($fontsize, $font_family, $content) {
        $box = imagettfbbox($fontsize, 0, $font_family, $content);
        $width1 = $box[2] - $box[0];
        return $width1;
    }

    $name1 = '中国境内没醉过';

    $url = 'http://v3.dwstatic.com/zbshenqi/201811/14/3ad7a92049e4eb5b209a39c63ac60000.jpg';

    $im = imagecreatefromjpeg($url);
    $color = imagecolorallocate($im, 255, 255, 255);
    $font = '../font/msyhbd.ttf';
    $font_size = 54*0.75;
    $font_size1 = 50*0.75;
    $x = 500 - getBoxWidth($font_size, $font, $name)/2;
    $x1 = 500 - getBoxWidth($font_size, $font, $name1)/2;

    imagettftext($im, $font_size, 0, $x, 259, $color, $font, $name);
    imagettftext($im, $font_size1, 0, $x1, 336, $color, $font, $name1);

$img = uploadImg($id,$im,'jpg');
    //saveRemoteLog('makeImgFinish', $saveInfo);
    exit(json_encode(array('code'=>1,'name'=>$name.'中国境内','url'=>$img)));