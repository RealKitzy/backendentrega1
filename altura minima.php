<?php

$N = 1;  
$H = 100;  
$heights = [100];  
$count = 0;
foreach ($heights as $height) {
    if ($height <= $H) {
        $count++;
    }
}
echo $count . PHP_EOL;

?>