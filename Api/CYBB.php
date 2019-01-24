<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
preg_match_all('/./u', $name, $namearr);
// if(count($namearr[0])>3){
//     exit(json_encode(array('code'=>-1,'key'=>'不能大于3个字符哦','msg'=>'不能大于3个字符哦')));
// }

$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201702/901/61/54ce0e1cfb5cdb7e3046beb66188f9e7.jpg');
$color = imagecolorallocate($im, 46, 29, 19);
$fontfile = '../font/fzqtjw.ttf';
imagettftext($im, 30*0.75, 0, 222-getBoxLeft(30*0.75,$fontfile,$name)/2, 212, $color, $fontfile, $name);

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'创意表白','url'=>$img)));

