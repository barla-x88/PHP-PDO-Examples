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

//updating data
$stmt = $pdo->prepare("UPDATE users SET email = :email WHERE id = :id");


$stmt->execute(['email' => 'johnsmith09@microsoft.com', 'id' => 1]);

echo "row affected : " . $stmt->rowCount() . "\n";

//deleting data
$deleteStmt = $pdo->prepare("DELETE FROM users WHERE id = :id");

//delete amanda, id = 12

$deleteStmt->execute(['id' => 12]);
echo "row affected : " . $deleteStmt->rowCount() . "\n";