<?php


use Symfony\Component\VarDumper\VarDumper;


require_once __DIR__ . '/../vendor/autoload.php';

// date function -> returns human redable date information
echo date('Y') . PHP_EOL;
echo date('H:i') . PHP_EOL;
echo date("F j, Y, g:i a") . PHP_EOL;

//time function -> returns unix timestamp
echo time() . PHP_EOL;

//strtotime() returns timestamp from human redable string
$timestamp = strtotime('last day of this month');

echo date("F j, Y, g:i a", $timestamp) . PHP_EOL;


$current = mktime(15, 20, 0, 5, 2, 2023);
echo date("F j, Y, g:i a", $current) . PHP_EOL;


//symbols used in string for DateTime constructor
//https://www.php.net/manual/en/datetime.formats.relative.php
$datetime = new DateTime('last day');

VarDumper::dump($datetime->format(DateTime::RFC1036));


// compare times
//get list of timezones https://www.php.net/manual/en/timezones.php
$timeInAmerica = new DateTime('now', new DateTimeZone('America/Los_Angeles'));
$timeInIndia = new DateTime('now', new DateTimeZone('Asia/Kolkata'));

VarDumper::dump($timeInAmerica > $timeInIndia);

//create DateTime Object using DateTime::createFromFormat
$time = DateTime::createFromFormat('j-M-Y', '21-Jan-2010');

//"Thu, 21 Jan 10 09:34:24 +0530"
VarDumper::dump($time->format(DateTime::RFC1036));

//Calculate difference between two dates-
//diff returns DateInterval object - https://www.php.net/manual/en/class.dateinterval.php
// $timeInIndia = current time
$days = $time->diff($timeInIndia);

//P1Y0M0D = P = period, 1 year(Y), 0 Month(M) , 0 Days(0)
$interval = new DateInterval('P1Y0M0D');

//Let's find the time 1 year from now
//prints Sun, 19 May 24 10:17:52 +0530"
VarDumper::dump($timeInIndia->add($interval)->format(DateTime::RFC1036));

$before = $timeInIndia->modify('-3 days')->format(DateTime::RFC1036);
VarDumper::dump($before); // "Thu, 16 May 24 10:32:29 +0530"

$immutable_now = new DateTimeImmutable();

//"Fri, 19 May 23 10:38:20 +0530"
var_dump($immutable_now->format(DateTime::RFC1036));

$one_yr_from_now = $immutable_now->add($interval);

//"Sun, 19 May 23 10:38:20 +0530"
var_dump($one_yr_from_now->format(DateTime::RFC1036));

//No change => "Fri, 19 May 23 10:38:20 +0530"
var_dump($immutable_now->format(DateTime::RFC1036));

