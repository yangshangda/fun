<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
function getBoxWidth($font_size,$font,$text){
    $box = imagettfbbox($font_size, 0, $font, $text);
    return $box[2] - $box[0];
}

//接受处理参数
//$name = trim(mb_convert_encoding($data->name, "UTF-8", "auto"));
preg_match_all('/./u', trim($name), $nameArr);
// if(count($nameArr[0])>20){
//     exit(json_encode(array('code'=>-1,'key'=>'不能大于20个字符哦','msg'=>'不能大于20个字符哦')));
// }

$texts =array(

	'一笑而过',
'不好意思，记不清了',
'出发',
'请把重心放在工作上',
'当局者迷',
'信则有不信则无',
'不要给别人添麻烦',
'不要指望它',
'轮回',
'可怕',
'当然',
'让它过去吧',
'温柔的坚持就会过去',
'从来没有',
'你会忘记的',
'你会受伤的',
'等待吧',
'只想不努力是没用的!!加油。',
'非常冒险...机会不大。',
'接受别人的意见会有助力。',
'办何自己不肯妥协，先问一下自已的能力。',
'毫无疑问。',
'仍然难以估计。',
'绝对不可。',
'耐心等待。',
'为何你还相信自己的幻想。',
'不要表态。',
'可能会造成震惊事件。',
'答案不是你所想但又会成功。',
'你需要尝试接受。',
'太疑神疑鬼了、加强自信吧。',
'是你心思误放在其它地方，影响运程。',
'别心急。',
'很大机会出现另一局面。',
'静观其变。',
'现在不是最佳时机。',
'保持警愓、并非如你所想。',
'听一下别人劝告吧。',
'现在没法要求太多。',
'用轻松的态度面对。',
'事与愿违，须多留意自己情绪。',
'要节制了，记得见好就收。',
'不在你控制范围以内。',
'小心!!',
'继续走你的路，问题当没有事情发生过吧。',
'用感觉去行动吧。',
'别被自己情绪影响。',
'好好把握啦 !',
'可按自己的目标进行计划。',
'转移目标吧。',
'多留意身边事物、另有出路。',
'凡事都有两面，一时不爽未必是坏事。',
'不妨改变一下想法。',
'重新想一下是否真正对你最重要吧。',
'记得不要太急进。',
'别再浪费时间。',
'辛苦的付出与收获不成正比，但切忌意气用事。',
'结果如何你都不会忘记这件事。',
'问题将会解决。',
'将会受到一些挫折，要积极面对。',
'有意外困扰，停滞不前，情绪会受到动摇。',
'不要心存侥幸，不付出又那会有收获呢?',
'出现了最佳时机，记着要踏实去干。',
'危机四伏，较为冲击动荡，需要过关斩将。',
'尝试去想一下其它更多的可能性。',
'迟一点才去解决。',
'不要自钻牛角尖，包容较挑剔来得开心。',
'小心外来的引诱，不要意气用事啊!',
'接受改变，面对现实啦。',
'困扰你的问题可望得到解决。',
'机会不会短期内再出现。',
'再想清楚你要的是什么。',
'等待一个更好机会。',
'你需要付出代价。',
'无论如何你都会继续去做!',
'你需要放弃其它东西才成事。',
'可能会好难，但值得的。',
'开心的肯定',
'机不可失，时不再来',
'无论你做过什么，结果都是持久的',
'醒醒吧，别做梦了',
'也许会有更好的解决方案',
'为什么不',
'是的',
);

$url = 'http://m1.dwstatic.com/huodong/shouji3/201805/594/23/9818bec9507131ea7caa7789271ffa8b.jpg';

$img = imagecreatefromjpeg($url);

$text = $texts[array_rand($texts)];
// $text = '静观其变静观其变静观其变静观其变静观其变静观';

list($width,$height) = getimagesize($url);
$size = 36*0.8;
$size1 = 28*0.8;
$fontFile = '../font/HYXIAOMAITIJ.TTF';
$fontFile1 = '../font/hysgt.TTF';
$color = imagecolorallocate($img, 28, 25, 26);
$color1 = imagecolorallocate($img, 82, 70, 74);

imagettftext($img, $size, 0, ($width-getBoxWidth($size, $fontFile, $name))/2, 37, $color, $fontFile, $name);

// $num = count($text);
preg_match_all('/./u',trim($text),$textArr);

if(($textArr[0])<7){
	imagettftext($img, $size1, 3, 390,245, $color1, $fontFile1, $text);
}else{
	    $text1 = mb_substr($text,0,6,'utf8');
        $text2 = mb_substr($text,6,6,'utf8');
        $text3 = mb_substr($text,12,6,'utf8'); 
        $text4 = mb_substr($text,18,6,'utf8');
		imagefttext($img, $size1, 3, 390, 245 , $color1, $fontFile1, $text1);
		imagefttext($img, $size1, 3, 390, 285 , $color1, $fontFile1, $text2);
		imagefttext($img, $size1, 3, 390, 325 , $color1, $fontFile1, $text3);
		imagefttext($img, $size1, 3, 390, 365 , $color1, $fontFile1, $text4);
}

$img = uploadImg($id,$img,'jpg');
exit(json_encode(array('code'=>1,'name'=>'答案之书','url'=>$img)));