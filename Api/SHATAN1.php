<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
    function getBoxWidth($font_size, $font_family, $content) {
        $box = imagettfbbox($font_size, 0, $font_family, $content);
        $width = $box[2] - $box[0];
        return $width;
    }

    preg_match_all('/./u', trim($name), $nameArr);
    // if(count($nameArr[0])>12){
    //     exit(json_encode(array('code'=>-1,'key'=>'不能大于12个字符哦','msg'=>'不能大于12个字符哦')));
    // }
    // $name1 = trim(mb_convert_encoding($data->name1, 'utf-8', 'auto'));
    // preg_match_all('/./u', trim($name1), $nameArr);
    // if(count($nameArr[0])>12){
    //     exit(json_encode(array('code'=>-1,'key'=>'不能大于12个字符哦','msg'=>'不能大于12个字符哦')));
    // }

    $im = imagecreatefromjpeg('http://m1.dwstatic.com/huodong/shouji3/201807/538/00/0763688f486e206123154aeb00477757.jpg');
    $color1 = imagecolorallocate($im, 212, 189, 147);
    $color = imagecolorallocate($im, 85, 85, 85);
    $font = '../font/STXINGKA.TTF';
    $font_size = 40*0.7;
    $x = 340 - getBoxWidth($font_size, $font, $name)/2;
    //$x1 = 340 - getBoxWidth($font_size, $font, $name1)/2;
    imagettftext($im, $font_size, 0, $x+2, 258+3, $color, $font, $name);
    imagettftext($im, $font_size, 0, $x, 258, $color1, $font, $name); 
    //imagettftext($im, $font_size, 0, $x1+2, 328+3, $color, $font, $name1);
    //imagettftext($im, $font_size, 0, $x1, 328, $color1, $font, $name1);   
    imagecolortransparent($im, $color1);

    $bg_img = imagecreatefrompng('http://m1.dwstatic.com/huodong/shouji3/201807/538/24/fed23634bdb85a681b279557285a0571.png');
    imagecopymerge($bg_img, $im, 0, 0, 0, 0, 960, 678, 100);
    $im = $bg_img;

$img = uploadImg($id,$im,'jpg');
    exit(json_encode(array('code'=>1,'name'=>$name.'心形镂空文字','url'=>$img)));