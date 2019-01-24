<?php 
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
    $index = rand(1,18);
    switch ($index) {
        case '1':
            $source_img = 'http://m2.dwstatic.com/bi_material/20161028/a217680ad1d03506375d7b769cc403291477648639238049085.jpg';
            $left = 271; $top = 205+25;
            break;
        case '2':
            $source_img = 'http://m2.dwstatic.com/bi_material/20161028/86849088c420665beac8ebc229a4022b1477649021372469442.jpg';
            $left = 265; $top = 208+25;
            break;
        case '3':
            $source_img = 'http://m2.dwstatic.com/bi_material/20161028/7cd84a83281789438ee095946133f66f1477649025552552618.jpg';
            $left = 280; $top = 186+25;
            break;
        case '4':
            $source_img = 'http://m2.dwstatic.com/bi_material/20161028/d91164b9db324378944e9dec4656b7821477649091587066387.jpg';
            $left = 258; $top = 197+25;
            break;
        case '5':
            $source_img = 'http://m2.dwstatic.com/bi_material/20161028/1702ee7115e125d7200088253a8e627d1477649097786047515.jpg';
            $left = 271; $top = 243+25;
            break;
        case '6':
            $source_img = 'http://m2.dwstatic.com/bi_material/20161028/27b8d1900b22567ec1eb5ccf123ec080147764910440006637.jpg';
            $left = 312; $top = 225+25;
            break;
        case '7':
            $source_img = 'http://m2.dwstatic.com/bi_material/20161028/852dd33c9242fb63f9bb3dedb42cb6831477649108946737183.jpg';
            $left = 273; $top = 228+25;
            break;
        case '8':
            $source_img = 'http://m2.dwstatic.com/bi_material/20161028/a6b57b69a4ca86c2b72f92b1bf65ae3e1477649114414983055.jpg';
            $left = 200; $top = 221+25;
            break;
        case '9':
            $source_img = 'http://m2.dwstatic.com/bi_material/20161028/9b060a9b35430591de6624a044049c09147764911934566145.jpg';
            $left = 295; $top = 239+25;
            break;
        case '10':
            $source_img = 'http://m2.dwstatic.com/bi_material/20161028/8075f5ca7551a1bd6a73648c51a6d4a41477649124477941151.jpg';
            $left = 292; $top = 204+25;
            break;
        case '11':
            $source_img = 'http://m2.dwstatic.com/bi_material/20161028/b8ebfd19d8ec2b3f22bb8c39f039a8d81477649129728688562.jpg';
            $left = 245; $top = 190+25;
            break;
        case '12':
            $source_img = 'http://m2.dwstatic.com/bi_material/20161028/08e925693ff815d584d42135142259301477649133891989176.jpg';
            $left = 201; $top = 220+25;
            break;
        case '13':
            $source_img = 'http://m2.dwstatic.com/bi_material/20161028/1d6175e6d198485abe31a4e95c642d081477649140932438890.jpg';
            $left = 199; $top = 186+25;
            break;
        case '14':
            $source_img = 'http://m2.dwstatic.com/bi_material/20161028/7ee2ad582054ef9421fe22daa3261c0f1477649145874158292.jpg';
            $left = 227; $top = 184+25;
            break;
        case '15':
            $source_img = 'http://m2.dwstatic.com/bi_material/20161028/8e7a6e22508a3a3f6330878e820e107a1477649150184977816.jpg';
            $left = 247; $top = 171+25;
            break;
        case '16':
            $source_img = 'http://m2.dwstatic.com/bi_material/20161028/2dd53d3df0a452a54a3b6bdf9093d8d4147764915573406433.jpg';
            $left = 247; $top = 189+25;
            break;
        case '17':
            $source_img = 'http://m2.dwstatic.com/bi_material/20161028/34135d6783870b0d98a66e1040f9c30a147764916025208186.jpg';
            $left = 233; $top = 237+25;
            break;
        case '18':
            $source_img = 'http://m2.dwstatic.com/bi_material/20161028/4ce4275474254fbc5aae2b33fc794fb81477649164770379784.jpg';
            $left = 200; $top = 202+25;
            break;
    }

    $im = imagecreatefromjpeg($source_img);
    $color = imagecolorallocate($im, 255, 255, 255);
    $fontfile = '../font/msyhbd.ttf';
    imagettftext($im, 34*0.75, 0, $left, $top, $color, $fontfile, $name);

    $fontfile1 = '../font/msyh.ttf';
    $b_name = '—'.$name.'单身的原因';
    imagettftext($im, 22*0.75, 0, 247-getBoxWidth(22*0.75,$fontfile1,$b_name)/2, 383, $color, $fontfile1, $b_name);

    function getBoxWidth($font_size,$font,$text){
        $box = imagettfbbox($font_size, 0, $font, $text);
        return $box[2] - $box[0];
    }

$img = uploadImg($id,$im,'jpg');
    exit(json_encode(array('code'=>1,'name'=>$name.'单身测试','url'=>$img)));