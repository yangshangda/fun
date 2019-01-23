<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
    $fontfile = '../font/fzstk.ttf';
    $text1=date("Y年m月d日");
    $im = imagecreatefromjpeg('http://m1.dwstatic.com/huodong/shouji3/201808/037/09/5339325d0bd2c7ab5bf0404c43a7a446.jpg');
    $color = imagecolorallocate($im, 37, 36, 36);
    //$color1 = imagecolorallocate($im, 0, 0, 0);
    $font_size=26*0.7;
    $font_size1=19*0.7;

    //$x = 440 - getBoxWidth($font_size, $fontfile, $name)/2;
    $font=imagettftext($im, $font_size, 0, 132, 605, $color, $fontfile, $name);
    $font1=imagettftext($im, $font_size1, 0, 112, 625, $color, $fontfile,$text1);
    $font2=imagettftext($im, $font_size1, 0, 310, 625, $color, $fontfile,$text1);
   
$img = uploadImg($id,$im,'png');
    exit(json_encode(array('code'=>1,'name'=>$name.'辞职信','url'=>$img)));