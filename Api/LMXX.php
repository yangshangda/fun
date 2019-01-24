<?php
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];

    $name_len = mb_strlen($name, 'utf-8');
    // if ($name_len>3) exit(json_encode(array('code' => -1, 'key' => '最多输入3个字')));
    $im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201604/151/38/xcd3e867f6620fc3f27928b2a09b4157e.jpg');
    $color = ImageColorAllocate($im,64,254,255);
    if($name_len == 3){
        $arr = array(
        array(40,302,661),array(24,213,612),array(24,316,480),array(24,277,551),array(24,374,581),array(24,118,604),array(24,482,639),array(24,213,753),array(24,425,791),array(24,319,812),array(24,202,830),array(24,371,713),array(18,259,689),array(18,301,513),array(18,380,544),array(18,210,570),array(18,284,570),array(18,284,576),array(18,527,584),array(18,356,607),array(18,159,629),array(18,475,668),array(18,179,672),array(18,442,735),array(18,358,745),array(18,261,783),array(18,349,784),array(18,456,816),array(18,418,843),array(18,206,862),array(18,478,607),array(10,340,423),array(10,356,447),array(10,371,521),array(10,472,563),array(10,304,598),array(10,555,606),array(10,438,611),array(10,233,629),array(10,156,650),array(10,252,655),array(10,429,678),array(10,338,684),array(10,477,693),array(10,210,700),array(10,469,751),array(10,313,759),array(10,402,760),array(10,210,797),array(10,406,819),array(10,295,829),array(10,485,844),array(10,193,878),array(10,388,502),array(6,347,400),array(6,323,446),array(6,133,574),array(6,91,578),array(6,601,581),array(6,493,584),array(6,457,646),array(6,468,711),array(6,226,718),array(6,211,769),array(6,270,800),array(6,463,861),array(6,499,866),array(6,502,883),array(6,167,569));
    }else{
        $arr = array(
    array(60,309,645),array(40,250,703),array(40,355,774),array(34,314,507),array(34,476,609),array(34,216,620),array(34,276,565),array(30,326,460),array(30,151,649),array(30,365,718),array(30,283,752),array(30,204,817),array(30,450,847),array(30,391,681),array(20,379,535),array(20,214,572),array(20,162,606),array(20,496,641),array(20,189,681),array(20,448,717),array(20,458,804),array(20,287,812),array(20,226,845),array(20,213,750),array(16,569,586),array(16,341,422),array(16,433,559),array(16,115,605),array(16,245,650),array(16,234,722),array(16,463,739),array(16,474,771),array(16,210,776),array(16,298,781),array(16,349,797),array(16,412,810),array(16,404,834),array(16,203,860),array(16,483,870),array(16,475,663),array(10,358,676),array(10,177,572),array(10,134,578),array(10,580,601),array(10,556,625),array(10,520,663),array(10,493,689),array(10,207,701),array(10,399,787),array(10,369,816),array(10,289,831),array(10,391,553),array(6,349,395),array(6,291,515),array(6,482,561),array(6,611,580),array(6,201,830),array(6,456,859),array(6,195,882),array(6,505,883));
    }
    
    foreach ($arr as $v) {
        ImageTTFText($im, $v[0], 0, $v[1], $v[2], $color, '../font/msyh.ttf', $name);
        ImageTTFText($im, $v[0], 0, $v[1], $v[2], $color, '../font/msyh.ttf', $name);
    }    //$savename = $type.$md5_name.$log_date.'.jpg';
$img = uploadImg($id,$im,'jpg');
    exit(json_encode(array('code'=>1,'name'=>$name.'心型文字','url'=>$img)));
