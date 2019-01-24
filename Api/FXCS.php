<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
//接受处理参数
preg_match_all('/./u', trim($name), $nameArr);
// if(count($nameArr[0])>4){
//     exit(json_encode(array('code'=>-1,'key'=>'不能大于4个字符哦','msg'=>'不能大于4个字符哦')));
// }

$gexings = [
    '轻度佛系',
    '中度佛系',
    '重度佛系',
];

//$memcache = getMemcacheConnection();
//$key1 = md5($type.$name);
//$gexing_key = $memcache->get($key1);
//if (!empty($gexing_key)) {
    //$gexing = $gexings[$gexing_key];
// }else{
    $gexing_key = array_rand($gexings);
    $gexing = $gexings[$gexing_key];
//     $memcache->set($key1,$gexing_key);
// }

//参数设置
$url = 'http://m1.dwstatic.com/huodong/shouji3/201712/309/66/8b7a3dc055563e20ce1aec2925d4ca2c.jpg'; 
$foimgUrl = 'http://m2.dwstatic.com/huodong/shouji3/201712/699/42/7ee795bced7585fff5767464283aa50d.png';

$fontFile = '../font/HeiTi.ttf';
list($width,$height) = getimagesize($url);
list($x,$y) = getimagesize($foimgUrl);
$im = imagecreatefromjpeg($url);
$foimg = imagecreatefrompng($foimgUrl);
$black = imagecolorallocate($im, 0, 0, 0);
$color1 = imagecolorallocate($im, 85, 105, 253);
$color2 = imagecolorallocate($im, 140, 67, 3);

$size = 36*0.75;
$namesize = 72*0.75;

$texts = [
"恋爱时能自己解决的绝不撒娇，能让一步的绝不吵架，不粘人，讲道理，没有夺命追魂call，没有漫天飞醋。相聚是缘，相处不易，珍惜这段情。",
"打车，有时司机问，走哪条路啊？他都让司机选。不必开导航对比路线长短，“生活里每件小事都得争个输赢”的感觉，太紧张了，没必要。",
"如果自己做饭，一般会煮面，至于是什么面？那得看冰箱里有什么，有鸡蛋就是鸡蛋面，有火腿就是火腿面，一切随缘。",
"在即将考试的时候，随意翻开课本看一看，记住了就是缘分，记住的刚好考到也是缘分的一种复习方法。",
"朋友圈随缘点赞，开心就点，不爽就不点，没有套路，也没有为什么，一切随缘！",
"朋友圈转发文章，不愿意过多分析，爱看的就看，不爱看的也不强求，一切随缘！",
"坐公车挤不上去，不会懊恼，也不会焦虑，静静等待下一班，有些事注定不能强求。",
"不混圈、不撕逼、不掐架，不信谣、不传谣，更新了有缘就看，无缘略过。",
"恋爱中经常说：“你看吧，我都行”，没必要事事计较，随缘不是更好么！",
"应该是最受欢迎的买家。能不跟卖家交流尽量不交流，自己看看商品介绍，合适就买.",
"网购不会去点“确认收货”，到期自动确认。也不会写评价，系统默认好评。一切随缘。",
"不再随大流追逐爆款，只要是自己喜欢的，即使被全世界diss也不会动摇。",
"不再追求各种花式搭配，出门前一刻才决定今天穿什么。",
"在吃鸡游戏时，随缘组队，自在单排，捡到好装备会开心，没捡到也无所谓，一笑而过！",
];

//$key2 = md5($type.$name);
//$text_key = $memcache->get($key2);
//if (!empty($text_key)) {
    //$text = $name.$texts[$text_key];
// }else{
    $text_key = array_rand($texts);
    $text = $name.$texts[$text_key];
//     $memcache->set($key1,$text_key);
// }

imagettftext($im, $namesize, 0, ($width-getBoxWidth($namesize, $fontFile, $name))/2, 124, $black, $fontFile, $name);

imagettftext($im, $size, 0, 105, 223, $black, $fontFile, '经测试，你的个性属于');
imagettftext($im, $size, 0, 466, 223, $color1, $fontFile, $gexing);

imagettftext($im, $size, 0, 105, 309, $black, $fontFile, '佛系指数 :');
imagecopyresampled($im, $foimg, 280, 270, 0, 0, $x, $y, $x, $y);
if ($gexing_key > 0 && $gexing_key == 1) {
    imagecopyresampled($im, $foimg, 340, 270, 0, 0, $x, $y, $x, $y);
    imagecopyresampled($im, $foimg, 400, 270, 0, 0, $x, $y, $x, $y);
}
if ($gexing_key > 1 && $gexing_key == 2) {
    imagecopyresampled($im, $foimg, 340, 270, 0, 0, $x, $y, $x, $y);
    imagecopyresampled($im, $foimg, 400, 270, 0, 0, $x, $y, $x, $y);
    imagecopyresampled($im, $foimg, 460, 270, 0, 0, $x, $y, $x, $y);
    imagecopyresampled($im, $foimg, 520, 270, 0, 0, $x, $y, $x, $y);
}

imagettftext($im, $size, 0, 105, 389, $color2, $fontFile, $name.'的佛系时刻 :');
if ( mb_strlen($text)>23 ) {
    $text1 = mb_substr($text, 0, 23, 'utf8');
    imagettftext($im, $size, 0, 105, 465, $black, $fontFile, $text1);
    if ( mb_strlen($text)>46 ) {
        $text2 = mb_substr($text, 23, 23, 'utf8');
        imagettftext($im, $size, 0, 105, 540, $black, $fontFile, $text2);
        if ( mb_strlen($text)>69 ) {
            $text3 = mb_substr($text, 46, 23, 'utf8');
            imagettftext($im, $size, 0, 105, 610, $black, $fontFile, $text3);
        } else {
            $text3 = mb_substr($text, 46, 23, 'utf8');
            imagettftext($im, $size, 0, 105, 610, $black, $fontFile, $text3);
        }
    } else {
        $text2 = mb_substr($text, 23, 23, 'utf8');
        imagettftext($im, $size, 0, 105, 540, $black, $fontFile, $text2);
    }
} else {
    imagettftext($im, $size, 0, 105, 465, $black, $fontFile, $text);
}

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'佛系测试','url'=>$img)));
