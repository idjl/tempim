<?php

/**
 * @Author: Ding Jianlong
 * @Date:   2018-08-08 09:57:34
 * @Last Modified by:   Ding Jianlong
 * @Last Modified time: 2018-08-08 12:35:25
 */

//php动态生成指定大小，指定前景色和背景色的图片

//接收参数
$image_width = isset($_GET['w']) ? intval($_GET['w']) : 100;
$image_height = isset($_GET['h']) ? intval($_GET['h']) : 100;
$image_str = $image_width.'x'.$image_height;
$bc = isset($_GET['bc']) ? hex2rgb($_GET['bc']) : array('r'=>221,'g'=>221,'b'=>221);
$fc = isset($_GET['fc']) ? hex2rgb($_GET['fc']) : array('r'=>0,'g'=>0,'b'=>0);

//生成图片
$img = imagecreate($image_width, $image_height);
$backColor = imagecolorallocate($img, $bc['r'], $bc['g'], $bc['b']);
imagefilledrectangle($img, 0, $image_height, $image_width, 0, $backColor);

//插入居中的水印
$fontColor = imagecolorallocate($img, $fc['r'], $fc['g'], $fc['b']);
imagestring($img, 5, $image_width/2-30, $image_height/2-7, $image_str, $fontColor);

//浏览器展示图片
header('Content-type:image/png');
imagepng($img);
imagedestroy($img);


//十六进制颜色转RGB颜色
function hex2rgb($hexColor) {
    $color = str_replace('#', '', $hexColor);
    if (strlen($color) > 3) {
        $rgb = array(
            'r' => hexdec(substr($color, 0, 2)),
            'g' => hexdec(substr($color, 2, 2)),
            'b' => hexdec(substr($color, 4, 2))
        );
    } else {
        $color = $hexColor;
        $r = substr($color, 0, 1) . substr($color, 0, 1);
        $g = substr($color, 1, 1) . substr($color, 1, 1);
        $b = substr($color, 2, 1) . substr($color, 2, 1);
        $rgb = array(
            'r' => hexdec($r),
            'g' => hexdec($g),
            'b' => hexdec($b)
        );
    }
    return $rgb;
}
