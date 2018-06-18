<?php

header('Content-Type: image/png');
$im = imagecreatefrompng("certificate.png");
$text_color = imagecolorallocate($im, 42, 68, 105);
imagestring($im, 100, 200, 100,  $_GET["name"], $text_color);
imagestring($im, 100, 200, 200,  $_GET["result"] . ' points out of 100', $text_color);
imagepng($im);
imagedestroy($im);

?>