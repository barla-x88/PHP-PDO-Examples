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

//Inserting data into database
$stmt = $pdo->prepare('INSERT INTO users (name, email) VALUES (:name, :email)');

$person_array = [
    ["John Doe", "johndoe@example.com"],
    ["Jane Smith", "janesmith@example.com"],
    ["Michael Johnson", "michaeljohnson@example.com"],
    ["Emily Davis", "emilydavis@example.com"],
    ["Robert Wilson", "robertwilson@example.com"],
    ["Sarah Thompson", "sarahthompson@example.com"],
    ["David Brown", "davidbrown@example.com"],
    ["Jennifer Lee", "jenniferlee@example.com"],
    ["Christopher Taylor", "christophertaylor@example.com"],
    ["Amanda Clark", "amandaclark@example.com"]
];

//using loop to insert all
//destructuring at the same time
foreach($person_array as [$person, $email]) {
    // echo $person . ' ' . $email . "\n";
    $stmt->execute(['name' => $person, 'email' => $email]);
}

//Get no of rows inserted
/**
 * $num_rows_inserted = 0;
*
*foreach($person_array as [$person, $email]) {
*    $stmt->execute(['name' => $person, 'email' => $email]);
*    $num_rows_inserted += $stmt->rowCount();
*}
*
*echo "The number of rows inserted is $num_rows_inserted";
 */