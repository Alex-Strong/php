<?php
$output = '';
//  var_dump($content);exit;
foreach ($content['fruits'] as $fruit) {
    $output .= "$fruit<br>";
}

return $output;