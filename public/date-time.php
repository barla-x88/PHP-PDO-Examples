<?php

// date function -> returns human redable date information
echo date('Y') . PHP_EOL;
echo date('H:i') . PHP_EOL;
echo date("F j, Y, g:i a") . PHP_EOL;

//time function -> returns unix timestamp
echo time() . PHP_EOL;

//strtotime() returns timestamp from human redable string
//https://www.php.net/manual/en/datetime.formats.relative.php
$timestamp = strtotime('last day of this month');

echo date("F j, Y, g:i a", $timestamp) . PHP_EOL;


$current = mktime(15, 20, 0, 5, 2, 2023);
echo date("F j, Y, g:i a", $current) . PHP_EOL;
