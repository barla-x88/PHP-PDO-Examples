<?php

namespace App\Models;

use PDO;

class UserRepository
{

    private $pdo;

    public function __construct()
    {
        $this->getPdo();
    }

    public function save(array $userdata)
    {
        $name = $userdata['name'];
        $email = $userdata['email'];
        $user_timezone = $userdata['user_timezone'];

        $stmt = $this->pdo->prepare('INSERT INTO users (name, email, user_timezone) VALUES (:name, :email, :user_timezone)');
        $stmt->execute(['name' => $name, 'email' => $email, 'user_timezone' => $user_timezone]);
    
        $rowCount = $stmt->rowCount();

        return "ROW affected: $rowCount";

    }

    private function getPdo(): \PDO
    {
       //making sure we have only one database connection
       if ($this->pdo === null) {

            //used to tell PDO how to handle records and fetch records
            $options = [
                // on errot throw exeception
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,

                // fetch record as associative array
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
            ];

            $dsn = "mysql:host=127.0.0.1;dbname=pdo-demo;charset=utf8mb4";

            try {
                $this->pdo = new \PDO($dsn, $username = 'root', $password = '', $options); 
            } catch (\PDOException $PDOException) {
                throw new \PDOException($PDOException->getMessage(), (int) $PDOException->getCode());
            }

            return $this->pdo;
       }

    }

    //return User Object or null
    public function findById($id) : ?User
    {
        $stmt = $this->pdo->prepare('SELECT * from users WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $userArray = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$userArray) {
            return null;
        }

        $user = new User();
        $user->setId($userArray['id']);
        $user->setName($userArray['name']);
        $user->setEmail($userArray['email']);
        $user->setCreatedAt($userArray['created_at']);
        
        return $user;
    }
}