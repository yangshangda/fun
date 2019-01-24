<?php
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
function getBoxLeft($font_size, $font_family, $content) {
  $box = imagettfbbox($font_size, 0, $font_family, $content);
  $width = $box[2] - $box[0];
  return $width;
}
header("Content-type: text/html; charset=utf-8"); 
preg_match_all('/./u', trim($name), $nameArr);
$url = 'http://m1.dwstatic.com/huodong/shouji3/201809/059/29/ec0755a5df903eaafdd572ae54a41aed.jpg';
list($width,$height)= getimagesize ($url);
$im = imagecreatefromjpeg($url);
$color = imagecolorallocate($im, 16, 47, 0);
$font = '../font/msyh.ttf';
// imagettftext($im, 26, 14, 93-getBoxLeft(26,$font,$name)/2, 935, $color, $font, $name);
// echo "$name";die;
    // $name = trim(mb_convert_encoding($data->name, 'utf-8', 'auto'));
    preg_match_all('/./u', trim($name), $nameArr);
    if(count($nameArr[0])>14)
    {
      $name1=mb_substr($name, 0,7,'UTF-8');
      $name2=mb_substr($name, 7,7,'UTF-8');
      $name3=mb_substr($name, 14,'UTF-8');
      imagettftext($im, 22, -14, 94,110, $color, $font, $name1);
    imagettftext($im, 22, -14, 86,140, $color, $font, $name2);
    imagettftext($im, 22, -14, 77,170, $color, $font, $name3);
    }
   else if(count($nameArr[0])>7)
   {
      $name1=mb_substr($name, 0,7,'UTF-8');
      $name2=mb_substr($name, 7,count($nameArr[0])-7,'UTF-8');
      imagettftext($im, 22, -14, 94,110, $color, $font, $name1);
    imagettftext($im, 22, -14, 86,140, $color, $font, $name2);
   }
   else
   {
    imagettftext($im, 22, -14, 94,110, $color, $font, $name);
   }

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'诺基亚','url'=>$img)));
