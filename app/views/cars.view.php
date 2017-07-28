<?php
$output = '';
//  var_dump($content);exit;
foreach ($content['cars'] as $car) {
    $output .= "$car<br>";
}


return $output;