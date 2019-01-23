<?php
include 'uploadImg.php';
$name = $_POST['name'];
$id = $_POST['id'];
$name_len = count($name);

    $im = imagecreatefromjpeg('http://m2.dwstatic.com/huodong/shouji3/201604/325/30/x1458ef0001b60c56ade9a505ff54c9d1.jpg');
    $color = ImageColorAllocate($im,215,105,214);
    $arr = array(
    array(34,290,739),array(34,290,739),array(14,107,701),array(14,268,663),array(14,450,513),array(14,169,520),array(14,374,538),array(14,107,546),array(14,164,546),array(14,525,551),array(14,287,554),array(14,380,567),array(14,221,579),array(14,462,590),array(14,153,594),array(14,325,596),array(14,67,597),array(14,410,616),array(14,169,625),array(14,585,628),array(14,104,629),array(14,268,630),array(14,348,640),array(14,533,655),array(14,155,659),array(14,452,659),array(14,374,666),array(14,551,693),array(14,216,700),array(14,462,702),array(14,428,735),array(14,504,751),array(14,134,760),array(14,336,762),array(14,256,769),array(14,440,770),array(14,170,790),array(14,321,796),array(14,410,798),array(14,243,824),array(14,344,824),array(14,347,856),array(14,321,885),array(14,392,694),array(10,389,871),array(10,131,521),array(10,247,523),array(10,475,525),array(10,268,533),array(10,489,543),array(10,453,555),array(10,520,565),array(10,111,568),array(10,173,569),array(10,449,569),array(10,295,581),array(10,556,582),array(10,420,593),array(10,593,601),array(10,242,604),array(10,498,609),array(10,414,644),array(10,226,649),array(10,82,651),array(10,580,670),array(10,90,674),array(10,201,678),array(10,355,690),array(10,539,708),array(10,167,717),array(10,254,729),array(10,547,730),array(10,113,738),array(10,470,749),array(10,484,785),array(10,430,818),array(10,237,836),array(10,298,848),array(10,416,849),array(10,293,864),array(10,343,904),array(6,255,781),array(6,494,558),array(6,563,566),array(6,502,568),array(6,610,583),array(6,504,622),array(6,456,626),array(6,516,631),array(6,489,634),array(6,597,638),array(6,612,648),array(6,608,656),array(6,515,669),array(6,481,673),array(6,492,676),array(6,566,702),array(6,467,710),array(6,438,710),array(6,579,713),array(6,579,713),array(6,505,724),array(6,214,732),array(6,243,742),array(6,425,753),array(6,522,759),array(6,221,759),array(6,519,772),array(6,291,789),array(6,255,792),array(6,188,798),array(6,482,799),array(6,474,813),array(6,325,828),array(6,449,829),array(6,422,831),array(6,331,861),array(6,378,898),array(6,357,913),array(6,603,574),array(6,599,564),array(6,509,486),array(6,463,488),array(6,247,498),array(6,420,498),array(6,525,499),array(6,550,502),array(6,262,508),array(6,390,511),array(6,425,515),array(6,563,515),array(6,519,515),array(6,296,520),array(6,575,528),array(6,540,529),array(6,316,533),array(6,445,534),array(6,433,544),array(6,360,551),array(6,593,552),array(6,360,565),array(6,394,573),array(6,398,582),array(6,586,586),array(6,551,594),array(6,295,597),array(6,569,604),array(6,385,605),array(6,307,606),array(6,540,607),array(6,376,613),array(6,353,649),array(6,341,659),array(6,287,674),array(6,323,678),array(6,292,878),array(6,310,891),array(6,322,899),array(6,344,929),array(6,270,869),array(6,330,913),array(6,182,485),array(6,221,491),array(6,155,492),array(6,186,498),array(6,219,499),array(6,135,503),array(6,116,513),array(6,97,523),array(6,169,529),array(6,81,548),array(6,117,555),array(6,87,558),array(6,67,565),array(6,76,575),array(6,67,565),array(6,76,575),array(6,64,606),array(6,87,607),array(6,62,618),array(6,69,627),array(6,91,628),array(6,64,638),array(6,128,650),array(6,132,659),array(6,70,663),array(6,79,687),array(6,90,705),array(6,129,712),array(6,91,715),array(6,102,724),array(6,165,728),array(6,155,737),array(6,152,770),array(6,221,818),array(6,267,846),array(6,346,922),array(6,219,804));
    foreach ($arr as $v) {
        if ($name_len < 3) {
            $left = $v[1] + $v[0];
        }else{
            $left = $v[1];
        }
        ImageTTFText($im, $v[0], 0, $left, $v[2], $color, '../font/msyh.ttf', $name);
        ImageTTFText($im, $v[0], 0, $left, $v[2], $color, '../font/msyh.ttf', $name);
    }   

$img = uploadImg($id,$im,'jpg');
    exit(json_encode(array('code'=>1,'name'=>$name.'唯美心形图','url'=>$img)));
