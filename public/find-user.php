<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

use App\Models\UserRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$id = $_GET['id'];

$userRepo = new UserRepository;
$user = $userRepo->findById($id);
var_dump($user);
?>
</body>
</html>