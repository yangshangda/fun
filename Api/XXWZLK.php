<?php 
    include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
    $im = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20161118/d4512a37e765a0bdb77fcb750a2a12611479461976965062041.jpg');
    $color = imagecolorallocate($im, 80, 80, 80);
    $fontfile = '../font/ktj.ttf';
    $name_arr = preg_split('//u', $name);
    if (count($name_arr) == 5) {
        imagettftext($im, 100*0.75, 0, 300, 357, $color, $fontfile, $name_arr[1]);
        imagettftext($im, 100*0.75, 0, 417, 357, $color, $fontfile, $name_arr[2]);
        imagettftext($im, 100*0.75, 0, 542, 357, $color, $fontfile, $name_arr[3]);   
    }else{
        imagettftext($im, 100*0.75, 0, 350, 357, $color, $fontfile, $name_arr[1]);
        imagettftext($im, 100*0.75, 0, 467, 357, $color, $fontfile, $name_arr[2]);
    }
    imagecolortransparent($im, $color);

    $bg_img = imagecreatefromjpeg('http://m2.dwstatic.com/bi_material/20161118/6a641216625c3dea46b9e401a17870e71479465203787897595.jpg');
    imagecopymerge($bg_img, $im, 0, 0, 0, 0, 960, 678, 100);
    $im = $bg_img;

    $img = uploadImg($id,$im,'png');
    exit(json_encode(array('code'=>1,'name'=>'心形镂空文字','url'=>$img)));