<?php

namespace App\Models;

use DateTimeZone;
use DateTime;

class User
{
    private int $id;
    private string $name;
    private string $email;
    private string $userTimezone;
    private DateTime|string $created_at;
    private DateTime|string $updated_at;
    private \DateTime $localTime;
    Private \DateInterval $accountAge;
    private Bool $accountActive = true;


    public function getId(): int
    {
        return $this->id;
    }
    public function setId($id): void
    {
        $this->id = $id;
    }
    

    //
    public function getName(): string
    {
        return $this->name;
    }
    public function setName($name): void
    {
        $this->name = $name;
    }

    //
    public function setEmail($email): void
    {
        $this->email = $email;
    }
    public function getEmail(): string
    {
        return $this->email;
    }


    //
    public function setUserTimezone($user_timezone): void
    {
        $this->userTimezone = $user_timezone;
    }

    //
    public function getCreatedAt(): string
    {
        return $this->created_at->format("F j, Y, g:i a");
    }
    public function setCreatedAt($time): void
    {
        $this->created_at = date_create($time);
    }
    
    //depends on created_at
    //depends on userTimezone
    public function getAccountAge(): string
    {

        return $this->accountAge->format("%d days, %m months");
    }
    public function setAccountAge(): void
    {
        $age = $this->created_at->diff(new DateTime('now'));
        $this->accountAge = $age;
    }


    //
    public function setLocalTime(): void
    {
        $time = new DateTime('now', new DateTimeZone($this->userTimezone));
        $this->localTime = $time;
    }

    public function getLocalTime(): string
    {
       return $this->localTime->format("F j, Y, g:i a");
    }

    public function setUpdatedAt($time): void
    {
        $this->updated_at = date_create($time);
    }
    public function getUpdatedAt(): string
    {
       return $this->updated_at->format("F j, Y, g:i a");
    }
}