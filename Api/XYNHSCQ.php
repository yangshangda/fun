<?php
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
//字体居中使用
function getBoxLeft($font_size, $font_family, $content) {
    $box = imagettfbbox($font_size, 0, $font_family, $content);
    $width = $box[2] - $box[0];
    return $width;
}
//裁剪圆形头像
function roundedCorners($imgpath, $angle = 2, $diff = 0) {
    $ext     = pathinfo($imgpath);
    $src_img = null;
    list($width,$height,$type) = getimagesize($imgpath);
    switch ($type) {
    case '2':
        $src_img = imagecreatefromjpeg($imgpath);
        break;
    case '3':
        $src_img = imagecreatefrompng($imgpath);
        break;
    }
    $wh = getimagesize($imgpath);
    $w  = $width-$diff;
    $h  = $width-$diff;
    $radius = min($w, $h) / $angle;
    $img = imagecreatetruecolor($w, $h);
    //这一句一定要有
    imagesavealpha($img, true);
    //拾取一个完全透明的颜色,最后一个参数127为全透明
    $bg = imagecolorallocatealpha($img, 255, 255, 255, 127);
    imagefill($img, 0, 0, $bg);
    $r = $radius; //圆 角半径
    for ($x = 0; $x < $w; $x++) {
        for ($y = 0; $y < $h; $y++) {
            $rgbColor = imagecolorat($src_img, $x, $y);
            if (($x >= $radius && $x <= ($w - $radius)) || ($y >= $radius && $y <= ($h - $radius))) {
                //不在四角的范围内,直接画
                imagesetpixel($img, $x, $y, $rgbColor);
            } else {
                //在四角的范围内选择画
                //上左
                $y_x = $r; //圆心X坐标
                $y_y = $r; //圆心Y坐标
                if (((($x - $y_x) * ($x - $y_x) + ($y - $y_y) * ($y - $y_y)) <= ($r * $r))) {
                    imagesetpixel($img, $x, $y, $rgbColor);
                }
                //上右
                $y_x = $w - $r; //圆心X坐标
                $y_y = $r; //圆心Y坐标
                if (((($x - $y_x) * ($x - $y_x) + ($y - $y_y) * ($y - $y_y)) <= ($r * $r))) {
                    imagesetpixel($img, $x, $y, $rgbColor);
                }
                //下左
                $y_x = $r; //圆心X坐标
                $y_y = $h - $r; //圆心Y坐标
                if (((($x - $y_x) * ($x - $y_x) + ($y - $y_y) * ($y - $y_y)) <= ($r * $r))) {
                    imagesetpixel($img, $x, $y, $rgbColor);
                }
                //下右
                $y_x = $w - $r; //圆心X坐标
                $y_y = $h - $r; //圆心Y坐标
                if (((($x - $y_x) * ($x - $y_x) + ($y - $y_y) * ($y - $y_y)) <= ($r * $r))) {
                    imagesetpixel($img, $x, $y, $rgbColor);
                }
            }
        }
    }
    return $img;
}

class image_blur{
public function gaussian_blur($im,$blurFactor=3){
    $srcImgObj=$this->blur($im,$blurFactor);
    return $srcImgObj;
    imagedestroy($srcImgObj);
}
private function blur($gdImageResource, $blurFactor = 3)  {  
        // blurFactor has to be an integer  
    $blurFactor = round($blurFactor);  

    $originalWidth = imagesx($gdImageResource);  
    $originalHeight = imagesy($gdImageResource);  

    $smallestWidth = ceil($originalWidth * pow(0.5, $blurFactor));  
    $smallestHeight = ceil($originalHeight * pow(0.5, $blurFactor));  

        // for the first run, the previous image is the original input  
    $prevImage = $gdImageResource;  
    $prevWidth = $originalWidth;  
    $prevHeight = $originalHeight;  

        // scale way down and gradually scale back up, blurring all the way  
    for($i = 0; $i < $blurFactor; $i += 1)  
    {      
            // determine dimensions of next image  
        $nextWidth = $smallestWidth * pow(2, $i);  
        $nextHeight = $smallestHeight * pow(2, $i);  

            // resize previous image to next size  
        $nextImage = imagecreatetruecolor($nextWidth, $nextHeight);  
        imagecopyresized($nextImage, $prevImage, 0, 0, 0, 0,   
          $nextWidth, $nextHeight, $prevWidth, $prevHeight);  

            // apply blur filter  
        imagefilter($nextImage, IMG_FILTER_GAUSSIAN_BLUR);  

            // now the new image becomes the previous image for the next step  
        $prevImage = $nextImage;  
        $prevWidth = $nextWidth;  
        $prevHeight = $nextHeight;  
    }  

        // scale back to original size and blur one more time  
    imagecopyresized($gdImageResource, $nextImage,   
        0, 0, 0, 0, $originalWidth, $originalHeight, $nextWidth, $nextHeight);  
    imagefilter($gdImageResource, IMG_FILTER_GAUSSIAN_BLUR);  

        // clean up  
    imagedestroy($prevImage);  

        // return result  
    return $gdImageResource;  
}   
}

$pos_img = [ //正能量配图
'http://m2.dwstatic.com/bi_material/201705/03/955086248d93d859bca154f4ea0b027a1493803238206309206.jpg',
'http://m2.dwstatic.com/bi_material/201705/03/955086248d93d859bca154f4ea0b027a1493803239123798968.jpg',
'http://m2.dwstatic.com/bi_material/201705/03/955086248d93d859bca154f4ea0b027a149380323937099337.jpg',
'http://m2.dwstatic.com/bi_material/201705/03/955086248d93d859bca154f4ea0b027a1493803239707520107.jpg',
'http://m2.dwstatic.com/bi_material/201705/03/955086248d93d859bca154f4ea0b027a1493803239446529251.jpg',
'http://m2.dwstatic.com/bi_material/201705/03/955086248d93d859bca154f4ea0b027a1493803240203113122.jpg',
'http://m2.dwstatic.com/bi_material/201705/03/955086248d93d859bca154f4ea0b027a1493803240107846487.jpg',
'http://m2.dwstatic.com/bi_material/201705/03/955086248d93d859bca154f4ea0b027a1493803240661699341.jpg',
'http://m2.dwstatic.com/bi_material/201705/03/955086248d93d859bca154f4ea0b027a1493803342484857384.jpg',
'http://m2.dwstatic.com/bi_material/201705/03/955086248d93d859bca154f4ea0b027a1493803343140541975.jpg',
'http://m2.dwstatic.com/bi_material/201705/03/955086248d93d859bca154f4ea0b027a1493803343871917068.jpg',
'http://m2.dwstatic.com/bi_material/201705/03/955086248d93d859bca154f4ea0b027a1493803343498186906.jpg',
'http://m2.dwstatic.com/bi_material/201705/03/955086248d93d859bca154f4ea0b027a1493803343103733108.jpg',
];
$type4_img = [
'http://m2.dwstatic.com/bi_material/201709/07/955086248d93d859bca154f4ea0b027a1504779025576554870.jpg',// 230,68,89
'http://m2.dwstatic.com/bi_material/201709/07/955086248d93d859bca154f4ea0b027a1504779025518824922.jpg',// 6,20,93
'http://m2.dwstatic.com/bi_material/201709/07/955086248d93d859bca154f4ea0b027a1504779025461244327.jpg',// 233,243,252
'http://m2.dwstatic.com/bi_material/201709/07/955086248d93d859bca154f4ea0b027a1504779025400025104.jpg',// 195,254,255
'http://m2.dwstatic.com/bi_material/201709/07/955086248d93d859bca154f4ea0b027a1504779025217348086.jpg',// 236,211,251
'http://m2.dwstatic.com/bi_material/201709/07/955086248d93d859bca154f4ea0b027a1504779026190053174.jpg',// 255,223,212
'http://m2.dwstatic.com/bi_material/201709/07/955086248d93d859bca154f4ea0b027a1504779026735242801.jpg',// 254,225,240
'http://m2.dwstatic.com/bi_material/201709/07/955086248d93d859bca154f4ea0b027a1504779026119482424.jpg',// 255,232,192
'http://m2.dwstatic.com/bi_material/201709/07/955086248d93d859bca154f4ea0b027a1504779026441251271.jpg',// 193,73,109
'http://m2.dwstatic.com/bi_material/201709/07/955086248d93d859bca154f4ea0b027a1504779034119897881.jpg',// 193,73,109
];
//文案内容不能大于18个字符（包括空格）
$pos_text = [
'满血复活 努力 珍惜 爱自己',
'暴风雨之后 不仅没看到彩虹 还感冒了',
'沉迷赚钱 日渐消瘦 既能脱单 还会暴富',
'春风十里 不如你',
'愿在枯燥的时光里 享受孤独',
'命运自有安排',
'长不过执念短不过善变 静守岁月便好',
'尽今天的努力 活在当下',
'请对我爱的人和爱我的人好一点',
'任凭世间纷扰 静守岁月安好',
'以梦为马 诗酒趁年华',
'你若安好 便是晴天',
'带着你的红颜 滚出我的世界',
'去风里跑跑 风会抱你',
'愿风里有诗句还有你',
'你的夕阳 我的容颜 谁的三分之一年',
'你是我的青春如梦 你是我的岁月如歌 ',
'鲜衣怒马 此间少年',
'世界太奇怪 请温柔看待 ',
'你听风在吹 我在等你归 ',
'小太阳很忙 小云朵想吃糖',
'万物皆有裂痕 那是光进来的地方 ',
'人生太苦 你吃一颗糖 ',
'躲了一辈子的雨 雨会不会很难过 ',
'未佩妥剑 出门便已是江湖 ',
'年轻时我想变成任何人 除了我自己 ',
'我是半怀着痛苦 半怀着希望 ',
'所有失去的 会以另一种方式归来',
'你的未来拿不出手 谁会听你凄惨的过去',
'要学会给自己穿上铠甲 做自己的大英雄',
'你一事无成 还在那里傻乐  ',
'要努力啊 不然怎么远离不喜欢的人',
'知道自己有能力  就别一生堕落成垃圾',
'你若不伤 岁月无恙',
'生命可以不轰轰烈烈 但应掷地有声',
'人生无需多想 此时还好就是好',
'如今最好 没有来日方长',
'痛出来的鲜美 才足够颠倒众生  ',
'但行是好 莫问前程',
'世界不是用来看的 是用来行走的',
'最好是留下一些眼泪 好减轻寂寞的重量',
'你现在不要伤心的太早 以后会更难 ',
'梦不是空穴来风 是一种愿望的达成',
'现在不努力 以后拿什么吹牛',
'不能承受 何以拥有',
'没人去仰慕 那我就继续忙碌',
'一个人 一支笔 一个晚上 一种传说',
'幸福其实特别简单 又特别不容易',
'多少日子盖的罗马 你别一夜拆了城墙',
'何以解忧 唯有暴富',
'以梦为马 越骑越傻',
'没有梦想 过的特爽',
'世上无难事 只要肯放弃',
'执子之手 如同猪肘',
'嘘寒问暖 不如巨款',
'你若安好 一起洗澡',
'朝九晚五 不如跳舞',
'随遇而安 只因我懒',
'春风十里 吹不死你',
'人生自古谁无死 早死晚死都得死',
'只要是石头 到哪里都不会发光的',
'心中有光的人 终会冲破一切荆棘',
'如果尚有余力 就去保护美好的东西',
'越是憧憬 越要风雨兼程',
'交浅别言深 情深别刻薄',
'圈子不同 不必强融',
'别把秘密告诉风  风会吹过整片森林',
'抓不住的沙 何不潇洒放了它',
'就算终须一别 也别辜负相遇',
'说不出的话是心事 留不住的人是故事',
'还是把自己经营好 让别人患得患失吧',
'你不学会长大 一个人怎么抵千军万马',
'说太多不如沉默 想太多你会难过',
'古藤老树昏鸦 手机WIFI西瓜',
'生活不仅能击败你 还会直接把你打倒',
'只要坚持下去 总会有失败的一天 ',
'拼了命的努力 就是为了证明自己不行',
'梦想还是要有的 万一别人实现了呢',
'给你多大的舞台 你就能丢多大的脸',
'你并不是一无所有 还有贫穷与脂肪',
'爱笑的女孩 鱼尾纹都比较多',
'转角一般不会遇到爱 只会遇到乞丐 ',
'吃得苦中苦 心里会更堵',
'多照照镜子 很多事情你就明白原因了',
'等忙完这一阵 就可以接着忙下一阵了',
'你什么样子 你自己心里没点逼数吗',
'没有人天生脾气好 要不是你很重要',
'假如生活出卖了我 我希望是论斤卖',
'好好活下去 每天都有新打击',
'怎么骄傲怎么活 我喜欢那样的自己',
];

//随机样式
// $select_name = trim(mb_convert_encoding($data->select_name, 'utf-8', 'auto'));
// switch ($select_name) {
//     case '样式1经典圆形':
//         $type = 1;
//         break;
//     case '样式2炫酷方形':
//         $type = 3;
//         break;
//     case '样式3唯美相片':
//         $type = 2;
//         break;
//     case '样式4纯色文字壁纸':
//         $type = 4;
//         break;
//     case '样式5经典方形':
//         $type = 5;
//         break;
// }
$type = 3;
//图片处理
if ($type == 4 ) {
    $type4_key = array_rand($type4_img);
    $current_img = $type4_img[$type4_key];
} else {
    $current_img = $pos_img[array_rand($pos_img)];
}

$im = imagecreatefromjpeg($current_img);
if ($type == 1) {
    $cover = imagecreatefrompng('http://m2.dwstatic.com/huodong/shouji3/201705/023/23/792ce36ff17374133282daa39aad6bc9.png');
    $im2 = roundedCorners($current_img);
    imagecopy($im, $cover, 0, 0, 0, 0, 750, 800);
    imagecopyresampled($im, $im2, 274, 195, 0, 0, 200, 200, 750, 750);
} else if ($type == 2) {
    $cover = imagecreatefrompng('http://m2.dwstatic.com/huodong/shouji3/201709/717/21/48e5e72a44f4dd228187acd76e596534.png'); 
    $im2 = imagecreatefromjpeg($current_img);
    $img_blur = new image_blur();
    $im = $img_blur->gaussian_blur($im, $blurFactor = 3);
    imagecopyresampled($im, $im2, 73, 114, 73, 114, 616, 390, 616, 390);
    imagecopy($im, $cover, 0, 0, 0, 0, 750, 800);
} else if ($type == 3) {
    $cover = imagecreatefrompng('http://m2.dwstatic.com/huodong/shouji3/201709/749/65/a87aa40b8259021ed31b155fec5d8f02.png');
    $img_blur = new image_blur();
    $im = $img_blur->gaussian_blur($im, $blurFactor = 1);
    imagecopy($im, $cover, 0, 0, 0, 0, 750, 800);
} else if ($type == 4) {

} else if ($type == 5) {
    $cover = imagecreatefrompng('http://m2.dwstatic.com/huodong/shouji3/201709/978/85/6423a32f8f3a12634e8e43496abf279b.png');
    $im2 = roundedCorners($current_img, 20, 0);
    imagecopy($im, $cover, 0, 0, 0, 0, 750, 800);
    imagecopyresampled($im, $im2, 284, 204, 0, 0, 182, 183, 750, 750);
}


//文字处理
//确定文案
$cnums = array("零","一","二","三","四","五","六","七","八","九","十","十一","十二");
$month = date('n',time());
for ($i=0; $i < 1; $i--) { 
    $text = trim($pos_text[array_rand($pos_text)]);
    $text_arr = explode(' ', $text);
    $num = count($text_arr); //几句文案
    //根据文案句数和每句字数确定行数及每行文案
    if ($num == 2) {
        if(mb_strlen(trim($text_arr[0]), 'utf-8') <=5 && mb_strlen(trim($text_arr[1]), 'utf-8') <= 5) {
            $line = 1;
            $text1 = trim($text_arr[0]).' '.trim($text_arr[1]);
        } else {
            $line = 2;
            $text1 = trim($text_arr[0]);
            $text2 = trim($text_arr[1]);
        }
    } else if ($num == 3) {
        if (mb_strlen(trim($text_arr[0]), 'utf-8') <=5 && mb_strlen(trim($text_arr[1]), 'utf-8') <= 5) {
            $line = 2;
            $text1 = trim($text_arr[0]).' '.trim($text_arr[1]);
            $text2 = trim($text_arr[2]);
        }
    } else if ($num ==4) {
        if (mb_strlen(trim($text_arr[0]), 'utf-8') <=5 && mb_strlen(trim($text_arr[1]), 'utf-8') <= 5 && mb_strlen(trim($text_arr[2]), 'utf-8') <=5 && mb_strlen(trim($text_arr[3]), 'utf-8') <= 5) {
            $line = 2;
            $text1 = trim($text_arr[0]).' '.trim($text_arr[1]);
            $text2 = trim($text_arr[2]).' '.trim($text_arr[3]);
        }
    }
    if ($type == 4) {
        if (isset($text1) && isset($text2) && mb_strlen($text1, 'utf-8') <= 7 && mb_strlen($text2, 'utf-8') <= 7) {
            $i = 10;
        } 
    } else {
        $i = 10;
    }
}
if ($type == 1) {
    //y轴坐标（标题、一行、两行第一行、两行第二行、落款）
    $y = [493, 616, 584, 654, 731];
    $x = 375;
    $size = [60*0.75, 60*0.75, 50*0.75, 50*0.75, 46*0.75];
    $fontfile = '../font/fzqtjw.ttf';
    $color = imagecolorallocate($im, 255, 255, 255);
    $month_text = $cnums[$month].'月你好';
    $name_text = '@'.$name;
} else if ($type == 2) {
    $fontfile = 'font/jianti.ttf';
    $color = imagecolorallocate($im, 0, 0, 0);
    $month_text = '[  '.$cnums[$month].'月你好  ]';
    $x = 375;
    $y = [567, 635, 625, 675, 762];
    $size = [44*0.75, 40*0.75, 40*0.75, 40*0.75, 42*0.75];
    $name_text = '@'.$name;
    $color2 = imagecolorallocate($im, 105, 105, 105);
    imagettftext($im, $size[4], 0, 375-getBoxLeft($size[4],$fontfile,$name_text)/2+1.5, $y[4]+1.5, $color2, $fontfile, $name_text);
} else if ($type == 3) {
    $fontfile = '../font/fzqtjw.ttf';
    $fontfile2 = '../font/jianti.ttf';
    $color = imagecolorallocate($im, 255, 255, 255);
    $month_text = $cnums[$month].'月你好';
    $name_text = '@'.$name;
} else if ($type == 4)  {
    $rgb_arr = [
        imagecolorallocate($im, 230, 68, 89),
        imagecolorallocate($im, 6, 20, 93),
        imagecolorallocate($im, 233, 243, 252),
        imagecolorallocate($im, 195, 254, 255),
        imagecolorallocate($im, 236, 211, 251),
        imagecolorallocate($im, 255, 223, 212),
        imagecolorallocate($im, 254, 225, 240),
        imagecolorallocate($im, 255, 232, 192),
        imagecolorallocate($im, 193, 73, 109),
        imagecolorallocate($im, 193, 73, 109),
    ];
    $fontfile = '../font/fzxjl.ttf';
    $color = $rgb_arr[$type4_key];
    $y = [326, 410, 387, 450, 505];
    $x = 220;
    $size = [50*0.75, 50*0.75, 50*0.75, 50*0.75, 50*0.75];
    $month_text = $cnums[$month].'月你好';
    $name_text = 'By '.$name;
} else if ($type == 5) {
    $y = [493, 616, 584, 654, 731];
    $x = 375;
    $size = [60*0.75, 60*0.75, 50*0.75, 50*0.75, 46*0.75];
    $fontfile = '../font/fzqtjw.ttf';
    $color = imagecolorallocate($im, 255, 255, 255);
    $month_text = $cnums[$month].'月你好';
    $name_text = '@'.$name;
}
if ($type == 3) {
    imagettftext($im, 72*0.75, 0, 375-getBoxLeft(72*0.75,$fontfile,$month_text)/2, 633, $color, $fontfile, $month_text);
    $text_len = mb_strlen($text,'utf-8');
    if ($text_len > 9) {
       $text1 = trim(mb_substr($text, 0, 9, 'utf-8'));
       $text2 = trim(mb_substr($text, 9, null, 'utf-8'));
       if (mb_strlen($text2,'utf-8') > 9) {
           exit(json_encode(array('code'=>-1,'key'=>'不能大于18个字符','msg'=>'不能大于18个字符')));
       }
    } else {
        $text1 = $text;
    }
    if (!empty($text2)) {
        imagettftext($im, 78*0.75, 0, 102, 340, $color, $fontfile2, mb_substr($text1, 0, 1, 'utf-8'));
        imagettftext($im, 60*0.75, 0, 102+getBoxLeft(60*0.75, $fontfile2, mb_substr($text1, 0, 1, 'utf-8'))+30, 340, $color, $fontfile2, mb_substr($text1, 1, null, 'utf-8'));
        imagettftext($im, 60*0.75, 0, 102, 470, $color, $fontfile2, mb_substr($text2, 0, mb_strlen($text2,'utf-8')-2, 'utf-8'));
        imagettftext($im, 78*0.75, 0, 102+getBoxLeft(60*0.75, $fontfile2, mb_substr($text2, 0, mb_strlen($text2,'utf-8')-2, 'utf-8'))+10, 470, $color, $fontfile2, mb_substr($text2, -2, null, 'utf-8'));
    } else {
        imagettftext($im, 78*0.75, 0, 102, 380, $color, $fontfile2, mb_substr($text1, 0, 1, 'utf-8'));
        imagettftext($im, 60*0.75, 0, 102+getBoxLeft(60*0.75, $fontfile2, mb_substr($text1, 0, 1, 'utf-8'))+30, 380, $color, $fontfile2, mb_substr($text1, 1, null, 'utf-8'));
    }
    imagettftext($im, 46*0.75, 0, 375-getBoxLeft(46*0.75,$fontfile,$name_text)/2, 721, $color, $fontfile, $name_text);
} else {
    imagettftext($im, $size[0], 0, $x-getBoxLeft($size[0],$fontfile,$month_text)/2, $y[0], $color, $fontfile, $month_text);
    //根据行数打字，不存在行数则按通用的规则（满九个字符换行）
    if (!empty($line)) {
        if ($line == 1) {
            imagettftext($im, $size[1], 0, $x-getBoxLeft($size[1],$fontfile,$text1)/2, $y[1], $color, $fontfile, $text1);
        } else {
            imagettftext($im, $size[2], 0, $x-getBoxLeft($size[2],$fontfile,$text1)/2, $y[2], $color, $fontfile, $text1);
            imagettftext($im, $size[3], 0, $x-getBoxLeft($size[3],$fontfile,$text2)/2, $y[3], $color, $fontfile, $text2); 
        }
    } else {
        $text_len = mb_strlen($text,'utf-8');
        if ($text_len > 9) {
           $text1 = trim(mb_substr($text, 0, 9, 'utf-8'));
           $text2 = trim(mb_substr($text, 9, null, 'utf-8'));
           if (mb_strlen($text2,'utf-8') > 9) {
               exit(json_encode(array('code'=>-1,'key'=>'不能大于18个字符','msg'=>'不能大于18个字符')));
           }
        } else {
            $text1 = $text;
        }
        if (!empty($text2)) {
            imagettftext($im, $size[2], 0, $x-getBoxLeft($size[2],$fontfile,$text1)/2, $y[2], $color, $fontfile, $text1);
            imagettftext($im, $size[3], 0, $x-getBoxLeft($size[3],$fontfile,$text2)/2, $y[3], $color, $fontfile, $text2);
        } else {
            imagettftext($im, $size[1], 0, $x-getBoxLeft($size[1],$fontfile,$text1)/2, $y[1], $color, $fontfile, $text1);
        }
    }
    imagettftext($im, $size[4], 0, $x-getBoxLeft($size[4],$fontfile,$name_text)/2, $y[4], $color, $fontfile, $name_text);
}


$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'X月你好生成器','url'=>$img)));


