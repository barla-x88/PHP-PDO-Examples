<?php

namespace App\Models;

use DateInterval;
use DateTimeZone;
use DateTime;

class User
{
    private int $id;
    private string $name;
    private string $email;
    private string $user_timezone;

    //can be DateTime object or string
    private DateTime|string $created_at;
    private DateTime|string $updated_at;
    private DateInterval $accountAge;


    //using magic getter to get properties out of object
    public function __get($property)
    {
        //check if property exists
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    //used in find-user.php
    public function setId($id): void
    {
        $this->id = $id;
    }
    
    public function setName($name): void
    {
        $this->name = $name;
    }
    public function setEmail($email): void
    {
        $this->email = $email;
    }
    public function setCreatedAt($time): void
    {
        $this->created_at = date_create($time);
    }
    // above methods are used in find-user.php


    public function getAccountAge(): string
    {
        //call setCreatedAt to convert string to DateTime object
        $this->setCreatedAt($this->created_at);

        $this->accountAge = $this->created_at->diff(new DateTime('now'));

        return $this->accountAge->format("%d days, %m months");
    }

    public function getLocalTime(): string
    {
        
        $time = new DateTime('now', new DateTimeZone($this->user_timezone));
       return $time->format("g:i a");
    }

    public function isActive(): bool
    {
        $currentAge = $this->accountAge->days;
        $updateInterval = date_create($this->updated_at)->diff(date_create()); 
        if ($currentAge < 90 || ($this->currentAge >= 90 && $updateInterval->days < 90)) {
            return true;
        } else {
            return false;
        }
    }


}