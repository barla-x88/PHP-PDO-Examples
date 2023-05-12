<?php

use App\Models\User;
use Symfony\Component\VarDumper\VarDumper;

require_once __DIR__ . '/../vendor/autoload.php';

$john = new User();

$john->setId(1);
$john->setName("John smith");

VarDumper::dump($john);