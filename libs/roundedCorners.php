<?php
/**
 * 处理圆角图片
 * @param  string  $imgpath 源图片路径
 * @param  integer $radius  圆角半径长度默认为15,处理成圆型
 * @return [type]           [description]
 */
function roundedCorners($imgpath) {
    $ext     = pathinfo($imgpath);
    $src_img = null;
    list($width,$height,$type) = getimagesize($imgpath);
    switch ($type) {
    case '2':
        $src_img = imagecreatefromjpeg($imgpath);
        break;
    case '3':
        $src_img = imagecreatefrompng($imgpath);
        break;
    }
    $wh = getimagesize($imgpath);
    $w  = $width;
    $h  = $width;
    $radius = min($w, $h) / 2;
    $img = imagecreatetruecolor($w, $h);
    //这一句一定要有
    imagesavealpha($img, true);
    //拾取一个完全透明的颜色,最后一个参数127为全透明
    $bg = imagecolorallocatealpha($img, 255, 255, 255, 127);
    imagefill($img, 0, 0, $bg);
    $r = $radius; //圆 角半径
    for ($x = 0; $x < $w; $x++) {
        for ($y = 0; $y < $h; $y++) {
            $rgbColor = imagecolorat($src_img, $x, $y);
            if (($x >= $radius && $x <= ($w - $radius)) || ($y >= $radius && $y <= ($h - $radius))) {
                //不在四角的范围内,直接画
                imagesetpixel($img, $x, $y, $rgbColor);
            } else {
                //在四角的范围内选择画
                //上左
                $y_x = $r; //圆心X坐标
                $y_y = $r; //圆心Y坐标
                if (((($x - $y_x) * ($x - $y_x) + ($y - $y_y) * ($y - $y_y)) <= ($r * $r))) {
                    imagesetpixel($img, $x, $y, $rgbColor);
                }
                //上右
                $y_x = $w - $r; //圆心X坐标
                $y_y = $r; //圆心Y坐标
                if (((($x - $y_x) * ($x - $y_x) + ($y - $y_y) * ($y - $y_y)) <= ($r * $r))) {
                    imagesetpixel($img, $x, $y, $rgbColor);
                }
                //下左
                $y_x = $r; //圆心X坐标
                $y_y = $h - $r; //圆心Y坐标
                if (((($x - $y_x) * ($x - $y_x) + ($y - $y_y) * ($y - $y_y)) <= ($r * $r))) {
                    imagesetpixel($img, $x, $y, $rgbColor);
                }
                //下右
                $y_x = $w - $r; //圆心X坐标
                $y_y = $h - $r; //圆心Y坐标
                if (((($x - $y_x) * ($x - $y_x) + ($y - $y_y) * ($y - $y_y)) <= ($r * $r))) {
                    imagesetpixel($img, $x, $y, $rgbColor);
                }
            }
        }
    }
    return $img;
}
/**
 * 处理圆角图片
 * @param  srting $imgpath 源图片的路径
 * @return [type]          [description]
 */
// function roundedCorners($imgpath){
//     list($width,$height,$type) = getimagesize($imgpath);//获取上传图片大小
//     if ($width != $height) {//如果上传图片不是正方形，取最小宽度作为最终生成图的大小
//         if ($width > $height) {
//             $imsize = $height;
//         } else {
//             $imsize = $width;
//         }
//     }
//     $im = imagecreatetruecolor($imsize, $imsize);//这里创建第一个图像
//     $white = imagecolorallocate($im, 255, 255, 255);// 随便取两个颜色，这里取黑色和白色
//     $black = imagecolorallocate($im, 0, 0, 0);
//     imagefill($im, 0, 0, $white);//将图片填充为白色
//     imagefilledellipse($im, $imsize/2, $imsize/2, $imsize, $imsize, $black);//然后再图片中间画一个黑色的圆
//     imagecolortransparent($im, $black);//将黑色设为透明的，则现在四个角是白色的，然后中间是透明的
//     switch ($type) {
//         case '2':
//             $img = imagecreatefromjpeg($imgpath);//这里创建的是第二个图像
//             break;
//         default:
//             $img = imagecreatefrompng($imgpath);//这里创建的是第二个图像
//             break;
//     }
//     $final = imagecreatetruecolor($imsize, $imsize);//再创建一个图像，第三个图像
//     imagecopyresampled($final, $img, 0, 0, ($width-$imsize)/2, ($height-$imsize)/2, $imsize, $imsize, $imsize, $imsize);//先将第二个图像（图片）压在空白的图像上，根据最小宽度，居中裁剪，成为第四个图像
//     imagecopymerge($final, $im, 0, 0, 0, 0, $imsize, $imsize, 100);//再将第一个图像压在第四个图像上，由于中间是透明的，所以现在图像上中间是图片，四个角都是白色的，第五个图
//     imagecolortransparent($im, $white);//然后将白色设置为透明的，现在这个图四个角是透明的，然后中间是黑色的
//     imagecopymerge($im, $final, 0, 0, 0, 0, $imsize, $imsize, 100);//将第五个图压在最后的图像上，就可以得到最后的圆形的图了
//     return $im;//返回图片
// }