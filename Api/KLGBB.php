<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
	$im=imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201605/763/82/xb1cb176d3ae3272f002bdde408241653.jpg');
	ImageTTFText($im,48,0,200,477,ImageColorAllocate($im,192,174,174),'../font/rzh.ttf',$name);
	$wo = '我喜欢你很久了';
	ImageTTFText($im,20,0,200,513,ImageColorAllocate($im,192,174,174),'../font/rzh.ttf',$wo);
$img = uploadImg($id,$im,'jpg');
	exit(json_encode(array('code'=>1,'name'=>$name.'可乐罐表白','url'=>$img)));