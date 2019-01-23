<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
preg_match_all('/./u', trim($name), $nameArr);

    $name1 = mb_substr($name, 0,1,'UTF-8');
    $name2 = mb_substr($name, 1,1,'UTF-8');
    $name3 = mb_substr($name, 2,1,'UTF-8');
    $name4 = mb_substr($name, 3,1,'UTF-8');
$select_name = '03';
if($select_name=='02'){
    $url = 'http://v3.dwstatic.com/zbshenqi/201809/27/3ad7a920834eac5b9006addbaedb0000.jpg';
    $im = imagecreatefromjpeg($url);
    $color = imagecolorallocate($im, 62, 36, 37);
    $font = '../font/XDJZT.otf';
    $font_size = 99*0.78;
    if(count($nameArr[0]) == 1){
       imagettftext($im, $font_size, 15, 250, 195, $color, $font, $name1);
    }elseif(count($nameArr[0]) == 2){
       imagettftext($im, $font_size, 20, 163, 240, $color, $font, $name1);
       imagettftext($im, $font_size, 18, 310, 185, $color, $font, $name2);       
    }elseif(count($nameArr[0]) == 3){
        imagettftext($im, $font_size, 20, 163, 240, $color, $font, $name1);
        imagettftext($im, $font_size, 15, 250, 195, $color, $font, $name2);
        imagettftext($im, $font_size, 10, 340, 170, $color, $font, $name3);
    }elseif(count($nameArr[0]) == 4){
        imagettftext($im, $font_size, 20, 163, 240, $color, $font, $name1);
        imagettftext($im, $font_size, 15, 250, 195, $color, $font, $name2);
        imagettftext($im, $font_size, 10, 340, 170, $color, $font, $name3);
    }
}elseif($select_name=='03'){
    $url = 'http://v3.dwstatic.com/zbshenqi/201809/27/3ad7a920a34eac5b9306cddbcedb0000.jpg';
    $im = imagecreatefromjpeg($url);
    $color = imagecolorallocate($im, 0, 0, 0);
    $font = '../font/HYXJJT.ttf';
    $font_size = 72*0.78;
     if(count($nameArr[0]) == 1){
       imagettftext($im, $font_size, 24, 260, 190, $color, $font, $name1);
    }elseif(count($nameArr[0]) == 2){
        imagettftext($im, $font_size, 24, 200, 220, $color, $font, $name1);
        imagettftext($im, $font_size, 22, 308, 175, $color, $font, $name2);       
    }elseif(count($nameArr[0]) == 3){
        imagettftext($im, $font_size, 24, 160, 240, $color, $font, $name1);
        imagettftext($im, $font_size, 22, 258, 190, $color, $font, $name2);
        imagettftext($im, $font_size, 15, 360, 158, $color, $font, $name3);
    }elseif(count($nameArr[0]) == 4){
        imagettftext($im, $font_size, 24, 150, 240, $color, $font, $name1);
        imagettftext($im, $font_size, 22, 220, 200, $color, $font, $name2);
        imagettftext($im, $font_size, 12, 300, 170, $color, $font, $name3);
        imagettftext($im, $font_size, 8, 380, 150, $color, $font, $name4);
    }
}else{
    $url = 'http://v3.dwstatic.com/zbshenqi/201809/27/3ad7a9344e4eac5b376f34fa35fa0000.jpg';
    $im = imagecreatefromjpeg($url);
    $color = imagecolorallocate($im, 62, 36, 37);
    $font = '../font/HYXJJT.ttf';
    $font_size = 48*0.78;
    if(count($nameArr[0]) == 1){
        imagettftext($im, $font_size, 0, 308, 205, $color, $font, $name1);
    }elseif(count($nameArr[0]) == 2){
        imagettftext($im, $font_size, 0, 280, 205, $color, $font, $name1);
        imagettftext($im, $font_size, 0, 350, 205, $color, $font, $name2);       
    }elseif(count($nameArr[0]) == 3){
        imagettftext($im, $font_size, -12, 240, 190, $color, $font, $name1);
        imagettftext($im, $font_size, 0, 315, 205, $color, $font, $name2);
        imagettftext($im, $font_size, 5, 390, 200, $color, $font, $name3);
    }elseif(count($nameArr[0]) == 4){
        imagettftext($im, $font_size, -12, 245, 193, $color, $font, $name1);
        imagettftext($im, $font_size, 0, 300, 205, $color, $font, $name2);
        imagettftext($im, $font_size, 0, 350, 205, $color, $font, $name3);
        imagettftext($im, $font_size, 10, 400, 200, $color, $font, $name4);
    }
}

$img = uploadImg($id,$im,'png');
    exit(json_encode(array('code'=>1,'name'=>$name.'大吉大利3','url'=>$img)));