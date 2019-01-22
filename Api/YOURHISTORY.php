<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
	$index = rand(0,83);
	// $index = 13;
	// if (!file_exists('test.txt')) {
	// 	file_put_contents('test.txt', '');
	// }
	// $index = file_get_contents('test.txt');
	// if (!isset($index)) {
	// 	$index = 0;
	// }
	// $index_plus = $index + 1;
	// file_put_contents('test.txt', $index_plus);

	switch ($index) {
		case 0:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/651090eb43d92b599131ae4d122943e11475127604742357366.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 50, 0, 748/2-getBoxWidth(50,$font,$name)/2, 214, $color, $font, $name);
			break;
		case 1:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/b3729825cd53fd26cd7d30306ca85ca11475128603823567382.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 50, 0, 748/2-getBoxWidth(50,$font,$name)/2, 214, $color, $font, $name);
			break;
		case 2:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/98f681996d1be77c857141ee2d0efb301475131740258441724.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 50, 0, 748/2-getBoxWidth(50,$font,$name)/2, 214, $color, $font, $name);
			break;
		case 3:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/cac9a4adc7674c20023281663d9db6751475131790311067916.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 50, 0, 748/2-getBoxWidth(50,$font,$name)/2, 154, $color, $font, $name);
			break;
		case 4:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/097c9fdc7750725403afb2b53991cf8f1475131853265701294.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			break;
		case 5:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/f0d709c775908875f53aa7f9ddb39d371475132033144563387.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 35, 0, 748/2-getBoxWidth(35,$font,$name.'把女朋友种到了地里')/2, 360, $color, $font, $name.'把女朋友种到了地里');
			break;
		case 6:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/124ac49cfe55778bec495c929dddcd2c1475132128356700022.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 50, 0, 748/2-getBoxWidth(50,$font,$name.'被吵醒了')/2, 463, $color, $font, $name.'被吵醒了');
			break;
		case 7:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160930/6c497e702356ced6a0e40210434f57251475219627173763501.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 60, 0, 748/2-getBoxWidth(60,$font,'望着'.$name.'说')/2, 276, $color, $font, '望着'.$name.'说');
			imagettftext($im, 60, 0, 748/2-getBoxWidth(60,$font,$name.'不怒自威')/2, 386, $color, $font, $name.'不怒自威');
			break;
		case 8:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/73e0b1f22a11cc915d13fae383f3ca9d1475132406932308655.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 20, 0, 748/2-getBoxWidth(20,$font,$name.'不是单身，但每周撸一次')/2, 130, $color, $font, $name.'不是单身，但每周撸一次');
			break;
		case 9:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160930/746889f6fd8e64d55ab7660c68e2a8651475219933253992140.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'心想')/2, 300, $color, $font, $name.'心想');
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'的车因为路上没油')/2, 490, $color, $font, $name.'的车因为路上没油');
			break;
		case 10:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/ee8d776091c5a511a932a2afbb85b0bc1475132555583107938.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'的进步让')/2, 150, $color, $font, $name.'的进步让');
			break;
		case 11:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/10e28641803299a92baeb7665e0e2b2d147513260750565907.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'刚刚')/2, 130, $color, $font, $name.'刚刚');
			break;
		case 12:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/123bd2b8620747a5e27d434aa14469281475132650341478051.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'给女友发一短信')/2, 130, $color, $font, $name.'给女友发一短信');
			break;
		case 13:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/9595c4f12e6d8e98db7a4240ce8530fa1475132719664886180.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'过去问道：')/2, 170, $color, $font, $name.'过去问道：');
			break;
		case 14:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/0a44973a4198d209ef86ecd816da5a5f1475132766373999830.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'和基友打dota')/2, 145, $color, $font, $name.'和基友打dota');
			break;
		case 15:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/c7dfec1b0bc39a2b35608b4a6ca214941475132874973987368.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'回来了：')/2, 360, $color, $font, $name.'回来了：');
			break;
		case 16:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/6cf95cdcd0a629fb1c1bb2410ff376911475132937879593651.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'哭着说')/2, 105, $color, $font, $name.'哭着说');
			break;
		case 17:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/ff2321d3d59591efe34bca334f2a420c1475132955731426871.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'吗？你的信用卡')/2, 177, $color, $font, $name.'吗？你的信用卡');
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'：是的')/2, 408, $color, $font, $name.'：是的');
			break;
		case 18:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/02a9d1f4bc88a24ae00fa44c6d7f17bb1475133121277736353.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'去买完东西')/2, 177, $color, $font, $name.'去买完东西');
			break;
		case 19:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/2573128b5831b81847d7be63663867a91475133174524790410.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'说：')/2, 136, $color, $font, $name.'说：');
			break;
		case 20:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/4624676ccd295f6c453c5389b41b70a31475144831347201314.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'送爸爸回家')/2, 155, $color, $font, $name.'送爸爸回家');
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'一把把烟掐掉说了句')/2, 297, $color, $font, $name.'一把把烟掐掉说了句');
			break;
		case 21:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/5a980dd230b50767342e311630f31b561475133285380913347.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'为了保护')/2, 155, $color, $font, $name.'为了保护');
			break;
		case 22:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/af74e2ec5d20d84392f92685563e854a1475133365696069152.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'问：')/2, 155, $color, $font, $name.'问：');
			break;
		case 23:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/cf8a711e77ab510e8e3b4b1cc5994eaf1475133419362264862.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'问辅导员')/2, 100, $color, $font, $name.'问辅导员');
			break;
		case 24:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/5aa2e579e6b0baf3271006eca5c252dd147513355097318769.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 30, 0, 748/2-getBoxWidth(30,$font,$name.'也没用')/2, 244, $color, $font, $name.'也没用');
			imagettftext($im, 30, 0, 748/2-getBoxWidth(30,$font,'因为'.$name)/2, 310, $color, $font, '因为'.$name);
			break;
		case 25:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/e7ddb2389885ba3435067d12a4c43b1a1475133625610035728.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'因为比较害羞')/2, 192, $color, $font, $name.'因为比较害羞');
			break;
		case 26:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/6c8ce7d5fcc38003f6b1c52373b5ecef1475133693738947836.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'长得像砖头')/2, 108, $color, $font, $name.'长得像砖头');
			break;
		case 27:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/ef4d1001ab417feb40451cb83d941e2614751337697256945.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'长这么大')/2, 156, $color, $font, $name.'长这么大');
			break;
		case 28:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160930/8960cd71706ed3299a2dfeed6c28daa61475219800821234813.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'走在路上')/2, 115, $color, $font, $name.'走在路上');
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'伸脚正要踢它的时候')/2, 312, $color, $font, $name.'伸脚正要踢它的时候');
			break;
		case 29:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160930/4c23dc01440a8f60339ac53205551b061475219246946545794.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 30, 0, 748/2-getBoxWidth(30,$font,$name.'因为玩LOL上瘾')/2, 105, $color, $font, $name.'因为玩LOL上瘾');
			imagettftext($im, 30, 0, 748/2-getBoxWidth(30,$font,$name.'一听就生气了')/2, 355, $color, $font, $name.'一听就生气了');
			break;
		case 30:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/b7b79c12db8f4c69069f9ca3e38f82a61475133896495652611.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,'当'.$name.'走在人生路上')/2, 125, $color, $font, '当'.$name.'走在人生路上');
			break;
		case 31:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/10a164b178e1fcd58a03f576c6c942e51475134038686351380.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,'对于'.$name.'来说')/2, 380, $color, $font, '对于'.$name.'来说');
			break;
		case 32:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/e65ce45d789d51848eb073a831757f8b1475134066343600199.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,'对于'.$name.'来说')/2, 174, $color, $font, '对于'.$name.'来说');
			break;
		case 33:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/41f22fbc535b5ea4d5a853b09caab2201475134107689051133.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'和患者')/2, 150, $color, $font, $name.'和患者');
			break;
		case 34:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/1e863e2149b62f8bdc99d2c1d4f582181475134174386076688.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'开始相信')/2, 150, $color, $font, $name.'开始相信');
			break;
		case 35:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/c8ba0c2f4672f2c5e8f1258b9c27d6fa1475134546886081120.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'说：')/2, 135, $color, $font, $name.'说：');
			break;
		case 36:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/3b6e3a600fae60320ce790c2e77d57e91475134648157589845.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'回家的路上一直在想')/2, 413, $color, $font, $name.'回家的路上一直在想');
			break;
		case 37:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/405265d86bcb79f9f270932caed361811475134729804364675.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 30, 0, 748/2-getBoxWidth(30,$font,'前几天'.$name.'家里进小偷了')/2, 140, $color, $font, '前几天'.$name.'家里进小偷了');
			imagettftext($im, 30, 0, 748/2-getBoxWidth(30,$font,'后来'.$name.'跟小偷一起找了起来')/2, 533, $color, $font, '后来'.$name.'跟小偷一起找了起来');
			break;
		case 38:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/4bf13474e754a708131e5f03984d27161475134911819110860.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 30, 0, 748/2-getBoxWidth(30,$font,'说完就往'.$name.'嘴里倒')/2, 500, $color, $font, '说完就往'.$name.'嘴里倒');
			break;
		case 39:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/d3798a41b80fec8672b85dd413a8a0911475135000121459678.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,'突然听到'.$name.'说')/2, 210, $color, $font, '突然听到'.$name.'说');
			break;
		case 40:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/48154ff253e7e74219910c1b5215ac2d1475135091989363165.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,'心狠手辣的'.$name)/2, 160, $color, $font, '心狠手辣的'.$name);
			break;
		case 41:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/406b379150e2d0abbf1168110bfc3fde1475135152319925672.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,'于是'.$name.'默默看了裆部')/2, 445, $color, $font, '于是'.$name.'默默看了裆部');
			break;
		case 42:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/f7c4698bfb6f72501e1d651f014baf221475135219338117795.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 20, 0, 748/2-getBoxWidth(20,$font,'在超市，一个小孩拉住'.$name.'的手')/2, 115, $color, $font, '在超市，一个小孩拉住'.$name.'的手');
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'问他')/2, 320, $color, $font, $name.'问他');
			break;
		case 43:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/e38ac2ab6e024ee595282728b8bedd8b1475135333821808549.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,'正准备给'.$name)/2, 357, $color, $font, '正准备给'.$name);
			break;
		case 44:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20160929/8b569624705b9dfb25e9adfbc7132bf71475135412968150914.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,'至今还没有'.$name.'的微信')/2, 315, $color, $font, '至今还没有'.$name.'的微信');
			break;
		case 45:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/160/90/ea24a95428fc06a2b9fa800122225a39.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,'都以为'.$name.'混的风生水起')/2, 235, $color, $font, '都以为'.$name.'混的风生水起');
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'只是')/2, 315, $color, $font, $name.'只是');
			break;		
		case 46:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/167/44/b0ac62e0822d3ff7e007528e4055d9a7.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.':')/2, 135, $color, $font, $name.':');
			break;
	    case 47:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/169/01/fb59ca95b64856b0e32df6306d916c66.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'最近玩LOL上瘾')/2, 95, $color, $font, $name.'最近玩LOL上瘾');
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'一听就来气')/2, 355, $color, $font, $name.'一听就来气');
			break;		
		case 48:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/171/62/954c019f122d3ee98e0c6c694cfffcd8.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'临危不惧，沉着冷静')/2, 285, $color, $font, $name.'临危不惧，沉着冷静');
			break;		
		case 49:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/173/23/c7197d786aa8d684c70c2196be0a0fb0.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'和女票的对话：')/2, 185, $color, $font, $name.'和女票的对话：');
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'，卒')/2, 515, $color, $font, $name.'，卒');
			break;		
		case 50:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/175/26/3e08167d92701d1fb7662557efc26bf6.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'看到爸妈想要二胎，')/2, 135, $color, $font, $name.'看到爸妈想要二胎，');
			imagettftext($im, 30, 0, 748/2-getBoxWidth(30,$font,'晚上'.$name.'听到父母在屋里偷偷商量：')/2, 265, $color, $font, '晚上'.$name.'听到父母在屋里偷偷商量：');
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,'要不然生完老二，咱把'.$name)/2, 405, $color, $font, '要不然生完老二，咱把'.$name);
			break;		
		case 51:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/178/67/a27cb13864832758eb10a23540d60f5d.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name)/2, 115, $color, $font, $name);
			break;		
		case 52:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/179/63/b1aa586edca53850b4ea793e95b5a86f.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'一直觉得自己是穷二代，')/2, 75, $color, $font, $name.'一直觉得自己是穷二代，');
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,'某天老爸对'.$name.'说')/2, 165, $color, $font,'某天老爸对'.$name.'说');
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'狂喜')/2, 325, $color, $font, $name.'狂喜');
			break;
		case 53:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/182/47/c27ccf8c2bda9a2a90b44b3951eef56c.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'上课抱怨题目太难，')/2, 105, $color, $font, $name.'上课抱怨题目太难，');
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'照做了，')/2, 335, $color, $font, $name.'照做了，');
			break;
		case 54:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/184/11/4200dca22cd7d8c38182a74f2fb5d85c.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 36, 0, 748/2-getBoxWidth(36,$font,$name.'赶紧买了两盒中华送领导')/2, 210, $color, $font, $name.'赶紧买了两盒中华送领导');
			break;	
		case 55:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/186/09/3d7da0cbcb6ad476da041db830b5179e.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'哭着说')/2, 355, $color, $font, $name.'哭着说');
			break;	
		case 56:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/187/19/57f3aa851e384beeb45c195a024b7d07.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'是个热心人')/2, 135, $color, $font, $name.'是个热心人');
			break;	
		case 57:
			$im = imagecreatefromjpeg('http://m1.dwstatic.com/huodong/shouji3/201610/188/36/b0483ee5fc2faa88108bb2c43d9d172d.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'也曾经青春逼人')/2, 185, $color, $font, $name.'也曾经青春逼人');
			break;	
		case 58:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/189/69/76d809d984b391da7afb252697b2e5be.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'长得黑')/2, 255, $color, $font, $name.'长得黑');
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'一巴掌打了过去。')/2, 325, $color, $font, $name.'一巴掌打了过去。');
			break;	
		case 59:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/191/12/9a851daa6ee998e6f9f5d374246e6b06.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,'小时候'.$name.'和女同桌吵架')/2, 105, $color, $font, '小时候'.$name.'和女同桌吵架');
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'灵机一动')/2, 440, $color, $font, $name.'灵机一动');
			break;	
		case 60:
			$im = imagecreatefromjpeg('http://m1.dwstatic.com/huodong/shouji3/201610/193/61/4097a1eb6f13d72d6db4e9b54cda1580.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,'所有人都觉得'.$name)/2, 105, $color, $font, '所有人都觉得'.$name);
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,'其实....'.$name)/2, 325, $color, $font, '其实....'.$name);
			break;		
		case 61:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/195/05/b80118a04620c6f19f04016c78aaa3ce.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,'望着'.$name)/2, 275, $color, $font, '望着'.$name);
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'不怒自威')/2, 365, $color, $font, $name.'不怒自威');
			break;			
		case 62:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/196/75/5a8d212ac10e2a43dce3a9d6d49227f3.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,'和'.$name.'体型差不多')/2, 325, $color, $font, '和'.$name.'体型差不多');
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,'跟'.$name.'运气差不多')/2, 585, $color, $font, '跟'.$name.'运气差不多');
			break;		
		case 63:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/198/64/de91f0593ed19b36d22c6a4531671db0.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'曾获得')/2, 205, $color, $font, $name.'曾获得');
			break;		
		case 64:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/199/80/29fd580ce56b5ce7c64ee5b0621a3769.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'心想')/2, 285, $color, $font, $name.'心想');
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'的车因为没油')/2, 485, $color, $font, $name.'的车因为没油');
			break;			
		case 65:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/201/34/65719395463a9af380896d60a9f0a455.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'因为比较害羞，')/2, 195, $color, $font, $name.'因为比较害羞，');
			break;				
		case 66:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/202/41/f5bbb8191e0c4218620994da07dcb6ab.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'，上帝很公平')/2, 125, $color, $font, $name.'，上帝很公平');
			break;							
		case 67:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/203/66/b469bb892bb3393d34efc7f13c6801bd.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,'学妹问'.$name.'学长')/2, 165, $color, $font, '学妹问'.$name.'学长');
			imagettftext($im, 36, 0, 748/2-getBoxWidth(36,$font,$name.'：你没有男朋友么？')/2, 315, $color, $font, $name.'：你没有男朋友么？');
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'：')/2, 455, $color, $font, $name.'：');
			break;					
		case 68:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/206/57/a290f0203e03bac828fe486fa084ca0f.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'开始相信')/2, 135, $color, $font, $name.'开始相信');
			break;						
		case 69:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/207/43/d1f6d7ba4ca8f6b2bb40d8337388cc05.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,'警察叔叔摸着'.$name.'的头说，')/2, 385, $color, $font, '警察叔叔摸着'.$name.'的头说，');
			break;				
		case 70:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/208/72/4a038a591cb63168dd016dbf199323de.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'中暑昏迷')/2, 105, $color, $font, $name.'中暑昏迷');
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'躺在病床上')/2, 315, $color, $font, $name.'躺在病床上');
			break;					
		case 71:
			$im = imagecreatefromjpeg('http://m1.dwstatic.com/huodong/shouji3/201610/210/25/fd373f1814f4079f2cac0c571c1e9222.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,'正准备给'.$name)/2, 345, $color, $font, '正准备给'.$name);
			break;						
		case 72:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/211/45/71e8a041e75efea4cca74b55c7816c10.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'暗恋女神')/2, 105, $color, $font, $name.'暗恋女神');
			imagettftext($im, 50, 0, 748/2-getBoxWidth(50,$font,'累死'.$name.'了')/2, 505, $color, $font, '累死'.$name.'了');
			break;					
		case 73:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/213/09/a224f0aa02ebd35fe883c02439cd1dde.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'：')/2, 385, $color, $font, $name.'：');
			break;						
		case 74:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/214/19/8eda4a685c7393e152d7b7f6dd3110b4.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'： 妈！')/2, 265, $color, $font, $name.'： 妈！');
			break;							
		case 75:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/215/56/68fad9fd12b4416b7839baf1dd52805e.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 50, 155, $color, $font, $name.'：');
			break;							
		case 76:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/216/69/75a7bf4d1d286a38b1fcefb41a0375c8.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,'说完就往'.$name.'嘴里灌...')/2, 515, $color, $font, '说完就往'.$name.'嘴里灌...');
			break;						
		case 77:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/218/36/11568bb86f8dda44563013784f632025.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'很可爱')/2, 145, $color, $font, $name.'很可爱');
			break;							
		case 78:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/219/26/38d1d32a10ffc949422a6aaf91aeb6cf.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'问辅导员：')/2, 95, $color, $font, $name.'问辅导员：');
			break;								
		case 79:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/220/02/8b7020ef3322ec7d25e4e2034510d574.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'想结婚了')/2, 155, $color, $font, $name.'想结婚了');
			break;									
		case 80:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/220/83/2b862cb6dff5390341b6fd301af70918.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.'上课和同桌窃窃私语')/2, 105, $color, $font, $name.'上课和同桌窃窃私语');
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,'老师对'.$name.'怒道：')/2, 195, $color, $font, '老师对'.$name.'怒道：');
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name.':')/2, 365, $color, $font, $name.':');
			break;								
		case 81:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/222/64/6a015e98d55814a728c624c75022d020.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 40, 0, 748/2-getBoxWidth(40,$font,$name)/2, 105, $color, $font, $name);
			imagettftext($im, 30, 0, 748/2-getBoxWidth(30,$font,'有人问'.$name.'，7岁你干嘛去了？')/2, 425, $color, $font, '有人问'.$name.'，7岁你干嘛去了？');
			break;									
		case 82:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/224/79/d4c8a8c673a8de7c74959b496568f9ee.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 30, 0, 60, 170, $color, $font, $name.'么，请问您的信用卡');
			imagettftext($im, 30, 0, 60, 400, $color, $font, $name.'：是的！');
			break;								
		case 83:
			$im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201610/227/96/0fd260cf2bb6bc2ec9cf29de142ddf1b.jpg');
			$color = imagecolorallocate($im, 46, 46, 46);
			$font = '../font/msyhbd.ttf';
			imagettftext($im, 50, 0, 748/2-getBoxWidth(50,$font,'昨晚'.$name)/2, 175, $color, $font, '昨晚'.$name);
			break;	

	}
	
	$nowyear = date('Y');
	$nextyear = $nowyear;
	$text = '——'. "$nextyear" ."$name".' 的有毒小故事';
	imagettftext($im, 20, 0, 748/2-getBoxWidth(20,$font,$text)/2, 700, $color, $font, $text);
	$cover = imagecreatefrompng('http://v3.dwstatic.com/zbshenqi/201811/12/3ad7a920a734e95b1b9a59e55ae50000.png');
	imagecopy($im, $cover, 0, 0, 0, 0, 748, 748);	
	// $gai = 'http://m1.dwstatic.com/huodong/shouji3/201808/228/79/b6a36d082312e3cf4e0f91e56b9d9520.png';
	// $top = imagecreatefrompng($gai);
	// list($k,$g)=getimagesize($gai);
	// imagecopyresampled($im, $top, 0, 0, 0, 0, $k, $g, $k, $g);
	function getBoxWidth($font_size,$font,$text){
		$box = imagettfbbox($font_size, 0, $font, $text);
		return $box[2] - $box[0];
	}

	$img = uploadImg($id,$im,'jpg');
	exit(json_encode(array('code'=>1,'name'=>$name.'有毒小故事','url'=>$img)));