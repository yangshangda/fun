<?php
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id']; 
preg_match_all('/./u', trim($name), $namearr);
// if(count($namearr[0])>3){
//     exit(json_encode(array('code'=>-1,'key'=>'不能大于3个字符哦','msg'=>'不能大于3个字符哦')));
// }

$cover = [
'http://m2.dwstatic.com/huodong/shouji3/201703/014/64/a0e3addec5c8b0d38e5c523dd4083ae9.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201703/014/77/86b50861d4177ffbac2de49863fa3d29.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201703/014/86/2612fe249fd3638e1d558fc16db695a1.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201703/015/00/31b5e47c6aa94e18dd93bbc8f717f7e3.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201703/015/12/c20631a95bdd30b6cfdcc1ecbca011ec.jpg',
'http://m2.dwstatic.com/huodong/shouji3/201703/015/27/2501ff80db2f690f25792724bb3eca97.jpg',
];
$surname_female = ['慕容','任','于','厉','柳','钟离','唐','东方','敖','白','南宫','竺','司徒','尉迟','司空','蓝','邵','西门','颜','莫','欧阳','尚','上官','吴','萧','乔','陆','沈','程','凌','何','赵','舒','尹','高'
]; 
$name_female = ['真','踏','凝','竹','若','雨','紫','影','亦','伊','羽','冰','菲','星','锦','悠','馨','香','爱','眠','落','轩','儿','萱','雪','月','芷','凌','珣','痕','荫','茹','忆','汀','舞','琦','汐','熏','郁','心','韵','然','嫣','若冰','依晨','佳妮','晚阳','静容','雪薇','玮雪','微琳','诗媛','嫣芸','筠蓓','以轩','涵月','心洁','诗娴','佑雪','凝蕊','可','灵惜','鸢','晓','羡倪','偌遥','凝溅','霜儿','媚','浅'
];
$surname_male = ['慕容','任','于','厉','钟离','唐','东方','敖','公孙','南宫','邵','司徒','尉迟','司空','尹','明','西门','归海','莫','欧阳','尚','上官','夜','李'
];
$name_male = ['绝','逸','寒','封','萧','云','燚','轩','海','元','天','寂','华','言','洛','痕','清','冽','尘','阳','武','遥','风','空','玉','竹','偌','语','伦','滨','轩','璘','永','恒','辕','明','岚','舜','翰','遐','康','逍遥','雳刃','醪','耀','太历','杰','静石','帅契','辰','郴剑','萧然','伟正','夏','凡一','庭','明','梵听','西凡','枫','锋','卫攫','誉家','敛里','豪浩'
];

$sex = ['男','nv'];
$sex = $sex[mt_rand(0,1)];

//$memcache = getMemcacheConnection();
//$key = md5($type.$name.$sex);
//$currentImKey = $memcache->get($key);
//if (!empty($currentImKey)) {
	//$imName = unserialize($currentImKey);
//} else {
	if ($sex == '男') {
		$imName['imkey'] = mt_rand(0,2);
		$imName['surkey'] = array_rand($surname_male);
		$imName['namekey'] = array_rand($name_male);
	} else {
		$imName['imkey'] = mt_rand(3,5);
		$imName['surkey'] = array_rand($surname_female);
		$imName['namekey'] = array_rand($name_female);
	}
	//$memcache->set($key,serialize($imName),10*24*60*60);
//}
$im = imagecreatefromjpeg($cover[$imName['imkey']]);
$color1 = imagecolorallocate($im, 149, 0, 3);
$fontfile1 = '../font/HeiTi.ttf';
imagefttext($im, 28*0.75, 0, 340-getBoxLeft(28*0.75,$fontfile1,$name)/2, 283, $color1, $fontfile1, $name);
$color2 = imagecolorallocate($im, 0, 0, 0);
$fontfile2 = '../font/fzqtjw.ttf';
if ($sex == '男') {
	$new_name = $surname_male[$imName['surkey']].$name_male[$imName['namekey']];
} else {
	$new_name = $surname_female[$imName['surkey']].$name_female[$imName['namekey']];
}
imagettftext($im, 48*0.75, 0, 405-getBoxLeft(48*0.75,$fontfile2,$new_name)/2, 360, $color2, $fontfile2, $new_name);

$img = uploadImg($id,$im,'jpg');
exit(json_encode(array('code'=>1,'name'=>$name.'古代名字','url'=>$img)));


