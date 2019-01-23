<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];

$url = 'http://v3.dwstatic.com/zbshenqi/201811/09/3ad7a9204393e55b239a0b870c870000.jpg';


    $time = date("m")."月".date("d")."日".date("H:i");
    $im = imagecreatefromjpeg($url);
    $color = imagecolorallocate($im, 0, 0, 0);
    $font = '../font/HeiTi.ttf';
    $font_size = 24*0.75;

    imagettftext($im, $font_size, 0, 102, 133, $color, $font, $name);
    
    imagettftext($im, $font_size, 0, 341, 133, $color, $font, $time);

$img = uploadImg($id,$im,'jpg');
    //saveRemoteLog('makeImgFinish', $saveInfo);
    exit(json_encode(array('code'=>1,'name'=>$name.'充气娃娃','url'=>$img)));