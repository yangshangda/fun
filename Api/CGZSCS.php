<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
	if ($name == '林丹') {
		$rate = 80;
	}elseif($name == '陈思诚'){
		$rate = 95;
	}elseif($name == '李小璐'){
		$rate = 100;
	}elseif($name == '薛之谦'){
		$rate = 100;
	}elseif($name == '陈赫'){
		$rate = 85;
	}elseif($name == '文章'){
		$rate = 100;
	}elseif($name == '曾凯彬'){
		$rate = 1;
	}elseif($name == '王宝强'){
		$rate = 8;
	}else{
		$rate = rand(-10,100);			
	}

	if ($rate <=0) {
		$one = '绝世仅有的';
		$two = '不花心的人';
	}elseif ($rate > 0 && $rate <= 5) {
		$one = '为数不多的';
		$two = '很专一的人';
	}elseif ($rate > 5 && $rate <= 10) {
		$one = '很值得信赖';
		$two = '靠谱的好人';
	}elseif ($rate > 10 && $rate <= 15) {
		$one = '非常靠谱';
		$two = '一心一意的人';
	}elseif ($rate > 15 && $rate <= 20) {
		$one = '坐怀不乱';
		$two = '定力十足的人';
	}elseif ($rate > 20 && $rate <= 25) {
		$one = '目不斜视';
		$two = '远离了低级趣味';
	}elseif ($rate > 25 && $rate <= 30) {
		$one = '非常专一';
		$two = '你的另一半很信服';
	}elseif ($rate > 30 && $rate <= 35) {
		$one = '有点魅力';
		$two = '会先后爱上多个人';
	}elseif ($rate > 35 && $rate <= 40) {
		$one = '属于正常人';
		$two = '但一般是不会出轨';
	}elseif ($rate > 40 && $rate <= 50) {
		$one = '有贼心没贼胆';
		$two = '依然是个专一的人';
	}elseif ($rate > 50 && $rate <= 55) {
		$one = '偶尔会有点小幻想';
		$two = '但绝对不会付之行动';
	}elseif ($rate > 55 && $rate <= 60) {
		$one = '身边异性朋友多';
		$two = '诱惑比较大';
	}elseif ($rate > 60 && $rate <= 70) {
		$one = '异性缘特别好';
		$two = '经常处于出轨边缘';
	}elseif ($rate > 70 && $rate <= 80) {
		$one = '魅力很大';
		$two = '容易受到异性挑逗';
	}elseif ($rate > 80 && $rate <= 90) {
		$one = '非常花心';
		$two = '但同时拥有花心的资本';
	}elseif ($rate > 90 && $rate <= 100) {
		$one = '绝世污神';
		$two = '出轨已经是家常便饭';
	}else{
		$one = '外星来的吗？';
		$two = '违规指数神秘莫测';
	}
	
	$bg = 'http://v3.dwstatic.com/zbshenqi/201811/12/3ad7a920df32e95b1a9ad1e2d2e20000.jpg';
	$im = imagecreatefromjpeg($bg);

	$name = $name.'的出轨指数';
	$rateStr = $rate.'%';
	$font = '../font/msyh.ttf';
	$color = imagecolorallocate($im, 255, 255, 255);
	$name_left = 600/2- getWidth(37.5, $font, $name)/2;
	$rateStr_left = 600/2- getWidth(60, $font, $rateStr)/2;
	$one_left = 600/2- getWidth(30, $font, $one)/2;
	$two_left = 600/2- getWidth(30, $font, $two)/2;


	imagettftext($im, 37.5, 0, $name_left, 79, $color, $font, $name);
	imagettftext($im, 60, 0, $rateStr_left, 273, $color, $font, $rateStr);
	imagettftext($im, 30, 0, $one_left, 517, $color, $font, $one);
	imagettftext($im, 30, 0, $two_left, 574, $color, $font, $two);

	

	function getWidth($size, $font, $text){
		$box = imagettfbbox($size, 0, $font, $text);
		return $box[2] - $box[0];
	}
	
$img = uploadImg($id,$im,'jpg');
    exit(json_encode(array('code'=>1,'name'=>$name.'出轨指数测试','url'=>$img)));
