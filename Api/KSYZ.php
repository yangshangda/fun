<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
// 过滤掉表情
function filterEmoji($str)
{
    $str = preg_replace_callback(
            '/./u',
            function (array $match) {
                return strlen($match[0]) >= 4 ? '' : $match[0];
            },
            $str);

    return $str;
}
$name = filterEmoji($name);
// exit(json_encode(['name' => $name]));
preg_match_all('/./u', trim($name), $nameArr);
// if(count($nameArr[0])>6){
//     exit(json_encode(array('code'=>-1,'key'=>'昵称6字以内哦','msg'=>'昵称6字以内哦')));
// } elseif (empty($nameArr[0])) {
//     exit(json_encode(array('code'=>-1,'key'=>'昵称不能为空','msg'=>'昵称不能为空')));
// }
$url = 'http://m2.dwstatic.com/huodong/shouji3/201801/885/80/b2ef7e883a128dfd2733738c1782d45b.jpg';
list($width,$height) = getimagesize($url);
$size = 55*0.75;
$fontFile = '../font/HeiTi.ttf';
$im = imagecreatefromjpeg($url);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, $size, 0, ($width-getBoxWidth($size, $fontFile, $name))/2, 410, $color, $fontFile, $name);

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'KSYZ','url'=>$img)));
