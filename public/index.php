<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
<?php

use App\Models\User;
use App\Models\UserRepository;
use Symfony\Component\VarDumper\VarDumper;


require_once __DIR__ . '/../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userRepo = new UserRepository();
    $result = $userRepo->save($_POST);
    echo "success";
}
?>

<form method="POST">
    <input type="text" name="name" id="" placeholder="NAME">
    <input type="email" name="email" id="" placeholder="NAME">
    <input type="submit" value="Create Account">
</form>
<form action="find-user.php" method="GET">
    <input type="text" name='id'>
    <input type="submit" value="FInd">
</form>
</body>
</html>
