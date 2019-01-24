<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
	$im=imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201703/980/98/afc68817d3f231b5b41aaabb54d92c66.jpg');
	ImageTTFText($im,26,0,50,900,ImageColorAllocate($im,15,23,26),'../font/HeiTi.ttf','等会儿请叫我'.$name.'总');
$img = uploadImg($id,$im,'jpg');
	exit(json_encode(array('code'=>1,'name'=>'豪赌装逼','url'=>$img)));