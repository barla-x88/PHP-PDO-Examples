<?php

namespace App\Models;

use DateTime;

class User
{
    private int $id;
    private string $name;
    private string $email;
    private \DateTime $created_at;


    public function getId(): int
    {
        return $this->id;
    }
    public function setId($id): void
    {
        $this->id = $id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function setEmail($email): void
    {
        $this->email = $email;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function setName($name): void
    {
        $this->name = $name;
    }
    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }
    public function setCreatedAt($time): void
    {
        $this->created_at = date_create($time);
    }

}