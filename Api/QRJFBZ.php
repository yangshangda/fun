<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
preg_match_all('/./u', $name, $namearr);
// if(count($namearr[0])>6){
//     exit(json_encode(array('code'=>-1,'key'=>'不能大于6个字符哦','msg'=>'不能大于6个字符哦')));
// }

$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201702/038/59/8dfa16fb41a55be94f05815a52ff4242.jpg');
$color = imagecolorallocate($im, 224, 224, 223);
$fontfile = '../font/fzxjl.ttf';
imagettftext($im, 120*0.75, 0, 323-getBoxLeft(120*0.75,$fontfile,$name)/2, 200, $color, $fontfile, $name);

$cover = imagecreatefrompng('http://m2.dwstatic.com/huodong/shouji3/201702/042/70/eae1771d046ab66add605b71d834d641.png');
imagecopy($im, $cover, 0, 0, 0, 0, 700, 507);

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>'情人节粉笔字','url'=>$img)));


