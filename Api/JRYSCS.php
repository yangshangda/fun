<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];

//接受处理参数
//$name = trim(mb_convert_encoding($data->name, "UTF-8", "auto"));
preg_match_all('/./u', trim($name), $nameArr);
// if(count($nameArr[0])>4){
//     exit(json_encode(array('code'=>-1,'key'=>'不能大于4个字符哦','msg'=>'不能大于4个字符哦')));
// }


//参数设置
$urls = array(
    'http://m1.dwstatic.com/huodong/shouji3/201805/745/36/70f19769e7d00b516275d2718b1b0453.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201805/746/19/fae1609720f71d09b73cf5df7d764485.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201805/746/53/84d31a661d6629b1783886bb76f958e7.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201805/746/84/6e36c7446332f36af46c499381fa44a3.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201805/747/41/a1b6785a1f0d30c1ca002ca42a0a4d55.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201805/747/60/c7746166176bbf80a6b5aa43299d2430.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201805/747/90/f880b8d5e37699752f21e66285f2c6c2.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201805/748/28/83c4fffc3469b9dadca344cf4b96e9eb.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201805/748/53/1700e93596f7e9117647f6fceeb5048d.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201805/748/72/1ebf5fc57cadea3a9ce8d68bc42c593e.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201805/748/99/76b76cf2ee541f4cf5ca501bbe9f3374.jpg',
    'http://m1.dwstatic.com/huodong/shouji3/201805/749/26/b1515f9ea9c833c7c583a466951f66f8.jpg',
);

//$memcache = getMemcacheConnection();
//$abc = 'jinriyunshiceshi';
//$key = md5($type.$abc.$name);
//$mc_url = $memcache->get($key);
//if (empty($mc_url)) {
    $url = $urls[array_rand($urls)];
   // $memcache->set($key,$url,10*60*60);
// }else{
//     $url = $mc_url;
//     $memcache->set($key,$url,10*60*60);
// }
$fontFile = '../font/msyh.ttf';
$size = 54*0.75;
list($width,$height) = getimagesize($url);
$im = imagecreatefromjpeg($url);
$color = imagecolorallocate($im, 32, 100, 149);
imagettftext($im, $size, 0, ($width-getBoxWidth($size, $fontFile, $name))/2, 120, $color, $fontFile, $name);

//   $memcache = getMemcacheConnection();
//   $abc = 'thenationalmemorial';
// $key = md5($type.$abc);
// $num = $memcache->get($key1);
// if (!empty($num)) {
//     $num += 1;
//     $memcache->set($key1,$num,0);
// }else{
//     $num = '1654674';
//     $memcache->set($key1,$num,0);
// }

// $text = '已经有'. $num .'人点亮蜡烛';
// imagettftext($im, $size2, 0, ($width-getBoxWidth($size2, $fontFile, $text))/2, 630, $color, $fontFile, $text);

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>'今日运势测试','url'=>$img)));
