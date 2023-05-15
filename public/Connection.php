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

// //looping through the object
// $stmt = $pdo->query('SELECT name, email FROM users');

// foreach ($stmt as $row) {
//     echo $row['name'] . '  ' . $row['email'] . "\n";
// }

//fetch single column
$stmt2 = $pdo->prepare('SELECT name FROM users WHERE id = :id');
$stmt2->execute(['id' => 8]);

echo "user = " . $stmt2->fetchColumn() . "\n";

//count users 
$countStmt = $pdo->prepare('SELECT count(*) FROM users');
$countStmt->execute();
echo "Total user = " . $countStmt->fetchColumn() . "\n";