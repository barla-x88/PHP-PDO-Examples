<?php

namespace App\Models;

class User
{
    private int $id;
    private string $name;


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
    public function setName($name): void
    {
        $this->name = $name;
    }
}