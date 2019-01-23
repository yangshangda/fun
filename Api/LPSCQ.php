<?php
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
$Hair_data = [
    "狼奔",
    "顺毛",
    "短寸",
	"短寸",
	"短寸",
    "卷毛",
    "二八分",
    "脏辫",
	"蓬松卷毛",
	"碎发",
	"碎发",
	"自然卷",
	"标准洗剪吹",
	"反光光头",
	"已秃",
	"子弹头",
	"锅盖头",
	"杀马特",
	"地中海",
	"蘑菇头",
	"爆炸头",	
	"泽柔头",
];

$Attribute_data = [
    "青梅竹马",
    "天降系",
	"哥哥",
	"数学课代表",
	"物理课代表",
	"老师",
	"不良",
	"科学家",
	"侦探",
	"小说家",
	"模特",
	"钢琴家",
	"化学家",
	"女装大佬",
	"死宅",
	"穷得只剩钱",
	"霸道总裁",
	"程序员",
	"机器人",
	"体育委员",
	"演员",
	"网红",
	"医生",
	"皇帝",
	"设计师",
	"画家",
	"富二代",
	"CEO",
	"一介匹夫",
	"屌丝",
	"当兵的",
	"键盘侠",
	"领导",
	"逮虾户"
	
];

$Character_data = [
    "运动达人",
    "小狼狗",
	"小奶狗",
	"天才",
	"高傲",
	"腹黑",
	"阳光",
	"乐观",
	"斯文败类",
	"温柔",
	"可爱",
	"呆",
	"慢热",
	"高冷",
	"毒舌",
	"爱撒娇",
	"懒鬼",
	"魔鬼"
	
];

$Superpower_data = [
	"变拖拉机",
	"瞬间移动",
	"读心术",
	"变成小动物",
	"时间静止",
	"预知未来",
	"感知过去",
	"隐身",
	"隔空取物",
	"念力",
	"忍术",
	"变玫瑰",
	"飞天遁地",
	"变触手",
	"QWERDF",
	"爱你",
	"持久",
	"劈叉",
	"厨艺特好",
	"无"
	
];
$Skin_data = [
    "洁白",
    "正常",
    "正常",
    "正常",
    "正常",
    "正常",
    "正常",
    "正常",
    "正常",
    "黝黑"
];

$fujinum_data =[
	"1块",
	"1块",
	"1块",
	"1块",
	"1块",
	"1块",
	"1块",
	"1块",
	"2块",
	"4块",
	"4块",
	"6块",
	"8块",
	"一圈",
	"一圈",
	"两圈",
	"三圈",
	"不存在的"
];

$staytime_data =[
	"3秒",
	"3秒",
	"10秒",
	"10秒",
	"12秒",
	"23秒",
	"5分钟",
	"5分钟",
	"10分钟",
	"10分钟",
	"10分钟",
	"10分钟",
	"10分钟",
	"10分钟",
	"10分钟",
	"10分钟",
	"30分钟",
	"30分钟",
	"1小时",
	"2小时",
	"隔日"
];
$girl_lucky_size =[
    'chili',
	'ruby woo',
	'cockney',
	'diva',
	'mocha',
	'seesheer',
	'ladybug',
	'YSL珊瑚色',
	'阿玛尼红管200',
	'阿玛尼黑管500',
	'纪梵希小羊皮315',
	'dior#999',
	'纪梵希禁忌之吻11号',
	'TF黑管16'
];
$girl_Hair_data = [
    "单马尾",
    "双马尾",
    "麻花辫",
    "包子头",
    "公主辫",
    "长直",
    "姬发式",
    "短发",
    "中长发",
    "长发",
    "卷发",
    "波波头",   
    "低马尾",
    "长双马尾"
];

$girl_Attribute_data = [
    "青梅竹马",
    "天降系",
    "妹妹",
    "姐姐",
    "人妻",
    "学生",
    "学生会长",
    "老师",
    "不良",
    "碧池",
    "破鞋",
    "优等生",
    "大小姐",
    "眼镜娘",
    "贵族",
    "不幸少女",
    "吸血鬼",
    "公主",
    "圣女",
    "修女",
    "偶像",
    "猫娘",
    "宅女",
    "文学少女",
    "巫女",
    "魔法少女",
    "人造人",
    "杀手",
    "杀人狂",
    "科学家",
    "伪娘",
    "警察"
];

$girl_Character_data = [
    "运动达人",
    "天才",
    "高傲",
    "傲娇",
    "元气",
    "强气",
    "弱气",
    "乐观",
    "悲观",
    "腹黑",
    "病娇",
    "冒失",
    "认真",
    "天然呆",
    "三无",
    "抖S",
    "抖M",
    "中二",
    "电波",
    "大和抚子",
    "病弱",
    "高岭之花",
    "笨蛋",
    "工口",
    "毒舌",
    "女王",
    "拜金",
    "温柔",
    "百合妹"
];

//数据来源:随便百度的 毫无科学依据
$girl_Cupsize_data = [
    "AA",
    "A","A","A","A","A",
    "B","B","B","B","B","B","B","B","B","B","B",
    "C","C","C","C",
    "D","D","D",
    "E","E",
    "F",
    "G"
];

$girl_Skin_data = [
    "洁白",
    "正常",
    "正常",
    "正常",
    "正常",
    "正常",
    "正常",
    "正常",
    "正常",
    "黑妹"
];



function randomRGB() {
	$rgb = array();
    $rgb['rValue'] = rand(0,255);
    $rgb['gValue'] = rand(0,255);
    $rgb['bValue'] = rand(0,255);
    return $rgb;   
}

$select_name = 'nv';
$num = count($name);
$data =array();
if($select_name == 'nv'){ 
    $data['girl_height']= rand(160,180);
	$data['girl_weight']= rand(44,70);
	$data['girl_lucky_size']= $girl_lucky_size[array_rand($girl_lucky_size)];
	$data['CUP']= $girl_Cupsize_data[array_rand($girl_Cupsize_data)];
	$data['girl_Skin_data']= $girl_Skin_data[array_rand($girl_Skin_data)];
	$data['girl_Hair_data']= $girl_Hair_data[array_rand($girl_Hair_data)];
	$data['girl_hairColor']= randomRGB();
	$data['girl_eyeColor']  = randomRGB();
	$data['attribute']  = $girl_Attribute_data[array_rand($girl_Attribute_data)];
	$data['girl_Character_data']= $girl_Character_data[array_rand($girl_Character_data)];
	$im = imagecreatefrompng("http://v3.dwstatic.com/zbshenqi/201811/28/3ad7a9209600fe5b975628fb29fb0000.png");
	$color = ImageColorAllocate($im,255,255,255);

	$font_size = 105*0.7;
	$span = 600;
	
	if($num == 4){
        ImageTTFText($im, $font_size, 0, 170, 421, $color, "../font/HYXiaRiTiJ.ttf", $name."未来的老婆");
	}elseif($num == 2){
		ImageTTFText($im, $font_size, 0, 300, 421, $color, "../font/HYXiaRiTiJ.ttf", $name."未来的老婆");
	}elseif($num == 1){
		ImageTTFText($im, $font_size, 0, 350, 421, $color, "../font/HYXiaRiTiJ.ttf", $name."未来的老婆");
	}else{
		ImageTTFText($im, $font_size, 0, 250, 421, $color, "../font/HYXiaRiTiJ.ttf", $name."未来的老婆");
	}

    ImageTTFText($im, $font_size, 0, 524, 539+61, $color, "../font/HYXiaRiTiJ.ttf", $data['girl_height']);
    ImageTTFText($im, $font_size, 0, 524, 678+61, $color, "../font/HYXiaRiTiJ.ttf", $data['girl_weight']);
    ImageTTFText($im, $font_size*0.7, 0, 524, 794+75, $color, "../font/HYXiaRiTiJ.ttf", ' '.$data['girl_lucky_size']);
    ImageTTFText($im, $font_size, 0, 524, 941+61, $color, "../font/HYXiaRiTiJ.ttf", $data['CUP']);
    ImageTTFText($im, $font_size, 0, 524, 1058+85, $color, "../font/HYXiaRiTiJ.ttf", $data['girl_Skin_data']);
    ImageTTFText($im, $font_size, 0, 524, 1198+90, $color, "../font/HYXiaRiTiJ.ttf", $data['girl_Hair_data']);
    $haircolor = imagecreate(270, 102);    
    $color1 = imagecolorallocate($haircolor, $data['girl_hairColor']['rValue'],$data['girl_hairColor']['gValue'],$data['girl_hairColor']['bValue']);
    // imagecopyresampled($im, $haircolor, 524, 1341, 0, 0, 270, 102, $hair_width, $hair_height);
    imagecopyresampled($im, $haircolor, 524, 1341, 0, 0, 270, 102, 270, 102);

    $haircolor2 = imagecreate(270, 102);
    $color2 = imagecolorallocate($haircolor2, $data['girl_eyeColor']['rValue'],$data['girl_eyeColor']['gValue'],$data['girl_eyeColor']['bValue']);
    imagecopyresampled($im, $haircolor2, 524, 1341+140, 0, 0, 270, 102, 270, 102);

    
    ImageTTFText($im, $font_size, 0, 524, 1603+95, $color, "../font/HYXiaRiTiJ.ttf", $data['attribute']);
    ImageTTFText($im, $font_size, 0, 524, 1738+80, $color, "../font/HYXiaRiTiJ.ttf", $data['girl_Character_data']);

}else{
         $data['height'] = rand(170,190);
		 $data['weight'] = rand(60,80);
		 $data['fujinum']= $fujinum_data[array_rand($fujinum_data)];
		 $data['SIZE'] = rand(5,26);
		 $data['Skin_data'] = $Skin_data[array_rand($Skin_data)];
		 $data['hairstyle'] = $Hair_data[array_rand($Hair_data)];
		 $data['hairColor']   = randomRGB();
		 $data['eyeColor']  = randomRGB();
		 $data['attribute']   = $Attribute_data[array_rand($Attribute_data)];
		 $data['character']   = $Character_data[array_rand($Character_data)];
		 $data['superpowerdata']= $Superpower_data[array_rand($Superpower_data)];


        $im = imagecreatefrompng("http://v3.dwstatic.com/zbshenqi/201811/28/3ad7a9203cfcfd5b9556e2f6e3f60000.png");
		$color = ImageColorAllocate($im,255,255,255);

		$font_size = 105*0.7;
		$span = 600;
        
		if($num == 4){
            ImageTTFText($im, $font_size, 0, 170, 421, $color, "../font/HYXiaRiTiJ.ttf", $name."未来的老公");
		}elseif($num == 2){
			ImageTTFText($im, $font_size, 0, 300, 421, $color, "../font/HYXiaRiTiJ.ttf", $name."未来的老公");
		}elseif($num == 1){
			ImageTTFText($im, $font_size, 0, 350, 421, $color, "../font/HYXiaRiTiJ.ttf", $name."未来的老公");
		}else{
			ImageTTFText($im, $font_size, 0, 250, 421, $color, "../font/HYXiaRiTiJ.ttf", $name."未来的老公");
		}
		
	    ImageTTFText($im, $font_size, 0, 524, 539+61, $color, "../font/HYXiaRiTiJ.ttf", $data['height']);
	    ImageTTFText($im, $font_size, 0, 524, 678+61, $color, "../font/HYXiaRiTiJ.ttf", $data['weight']);
	    ImageTTFText($im, $font_size, 0, 524, 794+75, $color, "../font/HYXiaRiTiJ.ttf", $data['fujinum']);
	    ImageTTFText($im, $font_size, 0, 524, 941+61, $color, "../font/HYXiaRiTiJ.ttf", $data['SIZE']);
	    ImageTTFText($im, $font_size, 0, 524, 1058+85, $color, "../font/HYXiaRiTiJ.ttf", $data['Skin_data']);	    
	    ImageTTFText($im, $font_size, 0, 524, 1198+85, $color, "../font/HYXiaRiTiJ.ttf", $data['hairstyle']);
	    
	    
	    $haircolor = imagecreate(270, 102);
	    if($data['hairstyle']=="反光光头" || $data['hairstyle'] == "已秃"){
    	     $color1 = imagecolorallocate($haircolor, 255,255,255);
        }else{
             $color1 = imagecolorallocate($haircolor, $data['hairColor']['rValue'],$data['hairColor']['gValue'],$data['hairColor']['bValue']);
        }
	  
	    // imagecopyresampled($im, $haircolor, 524, 1341, 0, 0, 270, 102, $hair_width, $hair_height);
	    imagecopyresampled($im, $haircolor, 524, 1341, 0, 0, 270, 102, 270, 102);

	    $haircolor2 = imagecreate(270, 102);
	    $color2 = imagecolorallocate($haircolor2, $data['eyeColor']['rValue'],$data['eyeColor']['gValue'],$data['eyeColor']['bValue']);
	    imagecopyresampled($im, $haircolor2, 524, 1341+140, 0, 0, 270, 102, 270, 102);

	    
	    ImageTTFText($im, $font_size, 0, 524, 1603+90, $color, "../font/HYXiaRiTiJ.ttf", $data['attribute']);
	    ImageTTFText($im, $font_size, 0, 524, 1738+90, $color, "../font/HYXiaRiTiJ.ttf", $data['character']);
	    ImageTTFText($im, $font_size, 0, 524, 1860+100, $color, "../font/HYXiaRiTiJ.ttf", $data['superpowerdata']);

}

$img = uploadImg($id,$im,'jpg');

exit(json_encode(array('code'=>1,'name'=>$name.'老婆一键生成器','url'=>$img)));



 









