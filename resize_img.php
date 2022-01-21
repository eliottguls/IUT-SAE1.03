#!/usr/bin
<?php
header('Content-type :: image/jpeg');

$image = new Imagick('img/p1.jpg');
$image->adaptativeResizeImage(300,300);

echo $image;
?> 