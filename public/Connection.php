<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\VarDumper\VarDumper;

$host = '127.0.0.1';
$dbname = 'pdo-demo';

//originally utf8mb4_general_ci but doesn't work with pdo
$charset = 'utf8mb4';

//used to tell PDO how to handle records and fetch records
$options = [
    // on errot throw exeception
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

    // fetch record as associative array
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

try {
    $pdo = new PDO($dsn, $username = 'root', $password = '', $options); 
} catch (PDOException $PDOException) {
    throw new PDOException($PDOException->getMessage(), (int) $PDOException->getCode());
}

//creating objects from the fetched records
//using fetchAll() method to fetch multiple records at once

class User
{
    private int $id;
    private string $name;
    private string $email;
    private string $created_at;
}

$stmt = $pdo->query('SELECT * from users');

//PDO::FETCH_CLASS -> Specifies that the fetch method shall return a
//  new instance of the requested class, mapping the columns to named
//  properties in the class.
$allUser = $stmt->fetchAll(PDO::FETCH_CLASS, User::class);

dd($allUser);